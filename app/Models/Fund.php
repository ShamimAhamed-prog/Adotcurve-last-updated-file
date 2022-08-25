<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;
    protected $fillable = [
        'f_ammount',
        'percentage',
        'status',
        's_id',
        'inv_id',
    ];
    public function startup(){
        return $this->belongsTo(Startup::class);
    }
    public function investor(){
        return $this->belongsTo(Investor::class);
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
