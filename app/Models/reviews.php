<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    use HasFactory;
    protected $table = "reviews";
    protected $fillable = ['ReviewsName','account_id','comment','star','created_at'];
    public function product(){
        return $this->hasMany(Products::class);
    }
    public function account(){
        return $this->belongsTo(account::class);
    }
}
