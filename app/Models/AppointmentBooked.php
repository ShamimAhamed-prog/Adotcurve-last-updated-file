<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentBooked extends Model
{
    use HasFactory;
    protected $fillable = [
        'slotdate',
        'timeslot',
        'note',
        's_id',
        'inv_id',
        'status',
        'book_id',
    ];

    public function startup(){
        return $this->belongsTo(Startup::class);
    }
    public function investor(){
        return $this->belongsTo(Investor::class);
    }
    public function appointment(){
        return $this->belongsTo(Appointment::class);
    }
}
