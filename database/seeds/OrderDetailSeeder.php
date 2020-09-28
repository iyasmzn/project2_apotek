<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Model\Drug;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $od = DB::table('order_details');

    	$orders = DB::table('orders')->pluck('id');
    	$drugs = DB::table('drugs')->pluck('price', 'id');
        $od->truncate();
        foreach ($orders as $order) {
        	$total = 0;
        	for ($drug_id=1; $drug_id <= rand(1, count($drugs)); $drug_id++) { 
		        $qty = rand(1, 100);
		        $price = $drugs[ $drug_id ];
		        $sub = $drugs[ $drug_id ] * $qty;
		        $total += $sub;

		        $od->insert([
		        	'order_id' => $order,
		        	'drug_id' => $drug_id,
		        	'price' => $price,
		        	'qty' => $qty,
		        	'subtotal' => $sub,
                    'created_at' => now(),
                    'updated_at' => now(),
		        ]);
		        Drug::find($drug_id)->update([
		        	'sold' => $qty,
		        ]);
        	}
        	DB::table('orders')->where('id', $order)->update(['total' => $total]);
        }
    }
}
