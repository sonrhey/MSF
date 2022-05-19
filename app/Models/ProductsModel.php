<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'motorcycle_type_id',
        'product_name',
        'product_price',
        'product_stock'
    ];

    public function motorcycle() {
        return $this->belongsTo(MotorcyleTypeModel::class, 'motorcycle_type_id', 'id');
    }
}
