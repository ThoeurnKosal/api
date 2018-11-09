<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable =  [
        'star','review','customer'
    ];
    public function product(){

    	return $this->belongsTo(Product::class);   
    }

}
