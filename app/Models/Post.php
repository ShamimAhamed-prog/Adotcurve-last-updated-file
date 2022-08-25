<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
 
     protected $fillable = [
     'c_name',
     'title',
     'slug',
     'description',
     'image',
     'status',
    ];
    public function postcategories()
    {
        return $this->belongsTo(PostCategory::class);
    }
//     public function sluggable()
//     {
//         return [
//             'slug' => [
//                 'source' => 'title'
//             ]
//         ];
//     }
 }