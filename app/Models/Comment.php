<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Blog;

class Comment extends Model
{
    use HasFactory;
      protected $fillable = [
        'name',
        'blog_id',
        'body',
    ];
    
    public function blog(){
     return $this->belongsTo(Blog::class);
    }
}
