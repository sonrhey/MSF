<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    use HasFactory;

    protected $table = 'product_inventories';
    protected $fillable = [
        'product_id',
        'old_stock',
        'new_stock',
        'old_price',
        'new_price',
    ];

    public function products() {
        return $this->belongsTo(ProductsModel::class, 'product_id', 'id');
    }
}
