<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function admin():BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
    public function investor():BelongsTo
    {
        return $this->belongsTo(Investor::class);
    }
    public function startup(){
        return $this->belongsTo(Startup::class);
    }
}
