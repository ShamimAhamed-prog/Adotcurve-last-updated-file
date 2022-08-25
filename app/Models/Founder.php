<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Founder extends Model
{
    use HasFactory;
    protected $fillable = [
        'f_name',
        'email',
        'linkedin',
        'phone',
        'experienced',
        'own_portfolio',
        'company_name',
        'company_website',
        'company_portfolio',
        'address',
        'photo',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
