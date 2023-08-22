<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Response;
use Validator;


class CourseController extends Controller
{
    //
    public function course_add(Request $req)
    {
        // Validate the input data
        $validator = Validator::make($req->all(), [
            'course_name' => 'required',
            'course_code' => 'required'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ], 400);
        }

        // Create a new instance of the Course model
        $course = new Course();

        // Set the properties of the new course using the input data
        $course->course_name = $req->course_name;
        $course->course_code = $req->course_code;
        $course->status = 'active';

        // Save the new course to the database
        $course->save();

        // Return the new course
        return response()->json($course, 201);
    }

    public function course_modify(Request $req)
    {
        // Find the course in the database based on the provided course ID
        $course = Course::find($req->course_id);

        // Check if the course exists
        if (!$course) {
            return response()->json(['error' => 'Course not found'], 404);
        }

        // Update the status of the course
        $course->status = $req->course_status;

        // Save the modified course to the database
        $course->save();

        // Return a JSON response containing the modified course data
        return response()->json($course);
    }

    public function course_update(Request $req)
    {
        // Validate the input data
        $validator = Validator::make($req->all(), [
            'course_name' => 'required',
            'course_code' => 'required'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        // Find the course in the database
        $course = Course::find($req->course_id);

        // Check if the course exists
        if (!$course) {
            return response()->json([
                'success' => false,
                'errors' => ['Course not found']
            ], 404);
        }

        // Update the course properties
        $course->course_name = $req->course_name;
        $course->course_code = $req->course_code;
        $course->save();

        // Return the updated course data
        return response()->json($course);
    }
}
