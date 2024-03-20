<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderModel extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['user_id', 'product_id', 'quantity', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(ProductModel::class);
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    
}
