<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBookingDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'name',
        'email',
        'phone',
        'startDate',
        'endDate',
    ];
    public function room() {
        return $this->hasOne('App\Models\rooom','id','room_id'); 
    }
}
