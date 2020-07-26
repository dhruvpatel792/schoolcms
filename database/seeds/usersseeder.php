<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class usersseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
        		'name' => 'rc',
                'email' => 'rc@gmail.com',
                'role' => 'Admin',
                'contact' => '8487909395',
                'address' => 'Canada',
        		'password' => Hash::make('password'),
                ]);

        $user2 = User::create([
                'name' => 'Zui',
                'email' => 'zui@gmail.com',
                'role' => 'Teacher',
                'contact' => '8487909395',
                'address' => 'Canada',
                'password' => Hash::make('password'),
                ]);

        /*$user3 = User::create([
                'name' => 'john',
                'email' => 'john@gmail.com',
                'role' => 'Student',
                'contact' => '8487909395',
                'address' => 'Canada',
                'enrollment' => '150670107062',
                'studentsclass' => '1',
                'div' => 'A',
                'password' => Hash::make('password'),
        ]);

        $user4 = User::create([
                'name' => 'rocky',
                'email' => 'rocky@gmail.com',
                'role' => 'Student',
                'contact' => '8487909395',
                'address' => 'miami',
                'enrollment' => '150670107062',
                'studentsclass' => '2',
                'div' => 'A',
                'password' => Hash::make('password'),
        ]);

        $user5 = User::create([
                'name' => 'mili',
                'email' => 'mili@gmail.com',
                'role' => 'Student',
                'contact' => '8487909395',
                'address' => 'china',
                'enrollment' => '150670107062',
                'studentsclass' => '1',
                'div' => 'B',
                'password' => Hash::make('password'),
        ]);*/
            
    }
}