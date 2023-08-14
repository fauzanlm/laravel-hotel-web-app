<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFacility extends Model
{
    use HasFactory;
    protected $table = 'facility_rooms';
    protected $fillable = [
        'facility_name',
    ];
}
