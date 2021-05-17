<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Role_user;
use App\Models\Student;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $id_numbers = ['124868120', '868120328',
        '681203277','120329365','236510466','681302392','248681201','486812032',
        '124868102','246801234','123456789','234567890','345678901','456789012',
        '678901234','789012345','890123456','901234567','123456781','567890123',
        '123456782','123456783','123456784','123456785','123456786','123456787',
        '123456788','246802468','127802468','128702467','128702468',
        '128702469','128702460'];

        $phone_numbers = ['09485537720', '09384301831', '09073178716', '09301333922', '09177222631'];
        $stands = ['STEM', 'ABM', 'HUMMS', 'SMAW'];
        $tracks = ['ACADEMIC', 'TECHNICAL-VOCATIONAL-LIVELIHOOD', 'SPORTS-ARTS'];
        $count =  count($id_numbers);
        $grade_year =['Grade-11', 'Grade-12'];
        $gender =['FEMALE', 'MALE'];

        for($i = 0; $i < $count; $i++){
            $faker = \Faker\Factory::create();
            $first_name = $faker->firstName();
            $last_name = $faker->lastName();
            $parent_name = $faker->name();
            $address = $faker->address();
            $user_name = $faker->unique()->username;
            $student_role = Role::where('name', 'student')->first();
            $student = User::create([
                'name' => strtoupper($first_name).' '.strtoupper($last_name),
                'username' => $id_numbers[$i],
                'email' => $id_numbers[$i].'@ansh-soa.com',
                'password' => Hash::make('password'),
                'status' => 'active',
                'usertype' => 'student'
            ]);
            $insert_role_student = Role_user::create([
                'role_id' => $student_role->id,
                'user_id' => $student->id
            ]);
            // $student->roles()->attach($student_role);

            $student_info = new Student();
            $student_info->id_number = $id_numbers[$i];
            $student_info->first_name = $first_name;
            $student_info->last_name =$last_name;
            $student_info->parent_name = $parent_name;
            $student_info->contact_number = $phone_numbers[rand(0,4)];
            $student_info->address = $address;
            $student_info->strand = $stands[rand(0,3)];
            $student_info->track =$tracks[rand(0,2)];
            $student_info->status ='active';
            $student_info->grade_year =$grade_year[rand(0,1)];
            $student_info->gender =$gender[rand(0,1)];
            $student_info->section ='Section 1';
            $student_info->user_id =$student->id;
            $student_info->save();
        }
    }
}
