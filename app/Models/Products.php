<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Products extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table="products";
    protected $fillable =['ProductsName','Price','description','categories_id','reviews_id','imagePath'];
    public function categories(){
        return $this->belongsTo(Categories::class);
    }
    public function reviews(){
        return $this->belongsTo(reviews::class);
    }
    public function Cart(){
        return $this->hasMany(Carts::class);
    }
}
