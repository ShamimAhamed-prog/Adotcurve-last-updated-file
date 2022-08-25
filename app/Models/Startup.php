<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Project;
class Startup extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        's_name',
        'email',
        'phone',
        'experienced',
        'own_portfolio',
        'password',
        'is_startup',
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
    public function project()
    {
        return $this->hasMany(Project::class,'s_id');
    }


}
