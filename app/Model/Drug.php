<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drug extends Model
{
	use SoftDeletes;    
    protected $fillable = [
        'drug_code', 'name', 'type', 'stock', 'exp_date', 'price', 'information', 'image', 'sold',
    ];

    public function Tag()
    {
        return $this->belongsToMany('App\Model\Tag');
    }

}
