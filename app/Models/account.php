<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    use HasFactory;
    protected $fillable=['fullname','mobile','address','email','password'];
    protected $table="account";
    public function Cart(){
        return $this->hasMany(Carts::class);
    }
}
