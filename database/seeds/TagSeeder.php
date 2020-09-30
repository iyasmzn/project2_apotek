<?php

use Illuminate\Database\Seeder;
use App\Model\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker\Factory::create();
        Tag::truncate();
        for ($i=0; $i < 5; $i++) { 
        	Tag::create([
        		'name' => $fake->word(),
        	]);
        }
    }
}
