<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'user_id', 'customer_name', 'total',
    ];
    public function order_details()
    {
    	return $this->hasMany(OrderDetail::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class)->withTrashed();
    }
}
