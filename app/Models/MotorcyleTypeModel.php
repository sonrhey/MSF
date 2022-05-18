<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorcyleTypeModel extends Model
{
    use HasFactory;

    protected $table = 'motorcyle_types';
    protected $fillable = [
        'motorcycle_name',
        'store_id'
    ];

    public function store() {
        return $this->belongsTo(StoreModel::class, 'store_id', 'id');
    }
}
