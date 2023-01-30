<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
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
     public function blogCreater(){
       return User::where('id','=',$this->user_id)->first();
    }
}
