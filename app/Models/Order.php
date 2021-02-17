<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        //Pivot attribute allows me to access the quantity from the order_product table
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
