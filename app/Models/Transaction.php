<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'room_id',
        'check_in',
        'many_room',
        'check_out',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id', 'transaction_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
    public function roomNumber()
    {
        return $this->hasOne(Room::class, 'id', 'room_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id', 'transaction_id');
    }
}
