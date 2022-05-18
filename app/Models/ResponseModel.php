<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseModel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'status_code',
        'message',
        'data',
    ];
}
