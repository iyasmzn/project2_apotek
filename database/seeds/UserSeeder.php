<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $fake = Faker\Factory::create();
        User::truncate();
        User::create([
        	'name' => 'admin',
        	'email' => 'admin@admin',
        	'password' => bcrypt('admin'),
        	'gender' => 'L',
        	'role' => 'admin',
        ]);
        User::create([
        	'name' => 'editor',
        	'email' => 'editor@editor',
        	'password' => bcrypt('editor'),
        	'gender' => 'L',
        	'role' => 'editor',
        ]);
        User::create([
        	'name' => 'employee',
        	'email' => 'employee@employee',
        	'password' => bcrypt('employee'),
        	'gender' => 'P',
        	'role' => 'employee',
        ]);
    }
}
