<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreModel extends Model
{
    use HasFactory;
    protected $table = 'stores';
    protected $fillable = [
        'store_name',
        'store_address',
        'store_origin_coords',
        'store_destination_coords',
        'store_owner',
        'store_hours_from',
        'store_hours_to',
        'added_by'
    ];
}
