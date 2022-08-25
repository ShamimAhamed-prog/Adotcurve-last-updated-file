<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
  use HasFactory;

  protected $fillable = [
    'slotdate',
    'timeslot',
];
  
    public function getFacingsAttribute()
    {
      return explode(',', $this->facings);
    }
}
