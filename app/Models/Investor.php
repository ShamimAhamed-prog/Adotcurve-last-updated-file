<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Investor extends Authenticatable
{
    
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'designation',
        'password',
        'is_investor',
        'company_name',
        'company_website',
        'company_portfolio',
        'company_address',
        'photo',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
