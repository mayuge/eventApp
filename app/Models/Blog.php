<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Blog extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'user_id',
        'body',
        'image_path1',
        'image_path2',
        'image_path3',
        'image_url1',
        'image_url2',
        'image_url3',
        
    ];
    
    public function user(){
     return $this->belongsTo(User::class);
    }
     public function comments(){
     return $this->hasMany(Comment::class);
    }
}
