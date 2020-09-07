<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    
    protected $fillable = [
        'drug_code', 'name', 'type', 'stock', 'exp_date', 'price', 'information', 'image',
    ];

    public function Tag()
    {
        return $this->belongsToMany('App\Model\Tag');
    }

}
