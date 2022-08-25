<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'p_name',
        'type',
        'business_idea',
        'projects_goal',
        'contact_person',
        'phone',
        's_name',
        's_id'
    ];
    public function startups()
    {
        return $this->belongsTo(Startup::class);
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
