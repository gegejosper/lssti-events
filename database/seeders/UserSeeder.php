<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Role_user;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        DB::table('role_user')->truncate();
        $admin_role = Role::where('name', 'admin')->first();
        $student_role = Role::where('name', 'student')->first();

        $admin = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@lssti.com',
            'password' => Hash::make('password'),
            'usertype' => 'admin',
            'status' => 'active'
        ]);
        $insert_role_admin = Role_user::create([
            'role_id' => $admin_role->id,
            'user_id' => $admin->id
        ]);

        $student = User::create([
            'name' => 'student',
            'username' => 'student',
            'email' => 'student@lssti.com',
            'password' => Hash::make('password'),
            'usertype' => 'student',
            'status' => 'active'
        ]);
        $insert_role_student = Role_user::create([
            'role_id' => $student_role->id,
            'user_id' => $student->id
        ]);
        
        $admin->roles()->attach($admin_role);
        $student->roles()->attach($student_role);
    }
}
