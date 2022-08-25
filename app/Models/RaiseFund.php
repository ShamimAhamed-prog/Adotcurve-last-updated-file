<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaiseFund extends Model
{
    use HasFactory;
    protected $fillable = [
        'inv_name',
        'f_ammount',
        'description', 
    ];
    public function investor(){
        return $this->belongsTo(Investor::class);
    }
}
