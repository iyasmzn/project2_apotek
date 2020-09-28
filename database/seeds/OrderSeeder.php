<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Model\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker\Factory::create('id_ID');
        Order::truncate();
        $users_tot = count(DB::table('users')->get());
        for ($i=0; $i < 10; $i++) { 
        	Order::create([
        		'user_id' => rand(1, $users_tot),
        		'customer_name' => $fake->name(),
        		'created_at' => now(),
        		'updated_at' => now(),
        	]);
        }
    }
}
