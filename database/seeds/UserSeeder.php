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
        	'password' => 'admin',
        	'gender' => 'L',
        	'age' => '20',
        	'role' => 'admin',
        ]);
        User::create([
        	'name' => 'editor',
        	'email' => 'editor@editor',
        	'password' => 'editor',
        	'gender' => 'L',
        	'age' => '20',
        	'role' => 'editor',
        ]);
        User::create([
        	'name' => 'employee',
        	'email' => 'employee@employee',
        	'password' => 'employee',
        	'gender' => 'P',
        	'age' => '17',
        	'role' => 'employee',
        ]);
    }
}
