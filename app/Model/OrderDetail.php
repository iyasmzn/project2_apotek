<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
    	'order_id', 'drug_id', 'price', 'qty', 'subtotal'
    ];
    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
    public function drug()
    {
    	return $this->belongsTo(Drug::class)->withTrashed();
    }
}
