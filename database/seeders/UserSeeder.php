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
        $finance_role = Role::where('name', 'finance')->first();
        $staff_role = Role::where('name', 'staff')->first();
        $subscriber_role = Role::where('name', 'subscriber')->first();
        $admin = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@jujiedso.ph',
            'password' => Hash::make('password'),
            'status' => 'active'
        ]);
        $insert_role_admin = Role_user::create([
            'role_id' => $admin_role->id,
            'user_id' => $admin->id
        ]);
        $finance = User::create([
            'name' => 'finance',
            'username' => 'finance',
            'email' => 'finance@jujiedso.ph',
            'password' => Hash::make('password'),
            'status' => 'active'
        ]);
        $insert_role_finance = Role_user::create([
            'role_id' => $finance_role->id,
            'user_id' => $finance->id
        ]);
        $staff = User::create([
            'name' => 'staff',
            'username' => 'staff',
            'email' => 'staff@jujiedso.ph',
            'password' => Hash::make('password'),
            'status' => 'active'
        ]);
        $insert_role_finance = Role_user::create([
            'role_id' => $staff_role->id,
            'user_id' => $staff->id
        ]);
        $subscriber = User::create([
            'name' => 'subscriber',
            'username' => 'subscriber',
            'email' => 'subscriber@jujiedso.ph',
            'password' => Hash::make('password'),
            'status' => 'active'
        ]);
        
        $insert_role_subscriber = Role_user::create([
            'role_id' => $subscriber_role->id,
            'user_id' => $subscriber->id
        ]);

        $admin->roles()->attach($admin_role);
        $finance->roles()->attach($finance_role);
        $staff->roles()->attach($staff_role);
    }
}
