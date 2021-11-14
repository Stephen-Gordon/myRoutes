<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();


        $admin = new User();
        $admin->name = 'John Doe';
        $admin->email = 'admin@store.com';
        $admin->password = Hash::make('secret'); 
        $admin->save(); 
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Jake Bob';
        $user->email = 'user@store.com';
        $user->password = Hash::make('secret'); 
        $user->save(); 
        $user->roles()->attach($role_user);
    }
}
