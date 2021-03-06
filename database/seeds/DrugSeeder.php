<?php

use Illuminate\Database\Seeder;
use App\Model\Drug;

class DrugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker\Factory::create();
        $type=array("tablet"=>"1","liquid"=>"2","cream"=>"3");
        Drug::truncate();
        for ($i=0; $i < 100; $i++) { 
        	Drug::create([
        		'drug_code' => uniqid(),
        		'name' => $fake->word(),
        		'type' => array_rand($type,1),
        		'stock' => rand(0,100),
        		'exp_date' => $fake->dateTimeBetween($startDate='now', $endDate='+10 years', $timezone = null),
        		'price' => rand(5000, 100000),
        	]);
        }
    }
}
