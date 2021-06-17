<?php

namespace App\Exports;

use App\Models\Student_subject;
use App\Models\Subject_attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class StudentSubjectExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    protected $schedule_id;
    protected $date_month;
    protected $date_year;

    function __construct($schedule_id, $date_month, $date_year) {
            $this->schedule_id = $schedule_id;
            $this->date_month = $date_month;
            $this->date_year = $date_year;
    }
    public function getWeekdays($m, $y = NULL){
        $arrDtext = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri');
    
        if(is_null($y) || (!is_null($y) && $y == ''))
            $y = date('Y');
        $d = 1;
        $timestamp = mktime(0,0,0,$m,$d,$y);
        $lastDate = date('t', $timestamp);
        $workingDays = 0;
        $schedule_days = array();
        for($i=$d; $i<=$lastDate; $i++){
            if(in_array(date('D', mktime(0,0,0,$m,$i,$y)), $arrDtext)){
                $workingDays++;
                $day_date = date('D', mktime(0,0,0,$m,$i,$y));
                $day_date_num = date('d', mktime(0,0,0,$m,$i,$y));
                $subject_days = array();
                $subject_days['date_day'] = $day_date;
                $subject_days['day_date_num'] = $day_date_num;
                array_push($schedule_days, $subject_days);
            }
        }
        return $schedule_days;
    }
    public function collection(){
        
        $students_male = Student_subject::leftJoin('students', 'students.id', '=', 'student_subjects.student_id')->orderBy('students.last_name')->where('gender', 'MALE')->where('schedule_id', $this->schedule_id)->get();

        $students_female = Student_subject::leftJoin('students', 'students.id', '=', 'student_subjects.student_id')->orderBy('students.last_name')->where('gender', 'FEMALE')->where('schedule_id', $this->schedule_id)->get();
        $students = $students_male->merge($students_female);
        return $students;
    }
    public function headings() : array{
        
        $days_list = $this->getWeekdays($this->date_month, $this->date_year);
        $days = array('Name');
        foreach($days_list as $day){
            $day_info = $day['date_day'].'/'.$day['day_date_num'];
            array_push($days, $day_info);
        }
        array_push($days, 'Present');
        array_push($days, 'Absent');
        array_push($days, 'Late');
        return $days;
    }
    public function map($student) : array {

        $name = $student->last_name.' ,'.$student->first_name;
        
        $days_list = $this->getWeekdays($this->date_month, $this->date_year);

        $student_info['name'] = $name;
        $present_val = 0;
        $late = 0;
        $absent = 0;
        foreach($days_list as $day){
            
            $day_info = $day['date_day'].'_'.$day['day_date_num'];
            $present = Subject_attendance::where('schedule_id', $this->schedule_id)
            ->where('log_year', $this->date_year)
            ->where('log_month', $this->date_month)
            ->where('log_day',  number_format($day['day_date_num'],0))
            ->where('student_id', $student->student_id)
            ->first();
            // if($present > 0 ){
            //     $present_value = '1';
            //     $present_val += 1;
            // }
            // else {
            //     $present_value = '0';
            //     $absent += 1;  
            // }
            // $student_info[$day_info] = $present_value;

            if(!empty($present)){
                $present_value = '1';
                $present_val += 1;
                if($present->status == 'late'){
                    $late += 1;
                    $present_value = 'late';
                }
            }
            else {
                $present_value = '0';
                $absent += 1;  
            }
            
            $student_info[$day_info] = $present_value;
        }
        $student_info['present'] = $present_val;
        $student_info['absent'] = $absent;
        $student_info['late'] = $late;
        return $student_info;
    }
}
