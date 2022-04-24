<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    protected $table ="carts";
    protected $fillable =['account_id','product_id','ordered'];
    public function Account(){
        return $this->belongsTo(account::class);
    } 
    public function Product(){
        return $this->belongsTo(Products::class);
    }
}
