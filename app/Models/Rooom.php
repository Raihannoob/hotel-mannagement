<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooom extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_tittle',
        'image',
        'description',
        'price',
        'wifi',
        'room_type',
    ];

}
