<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    
     protected $fillable = [
        'title',
        'user_id',
        'description',
        'address',
         'date',
        'message',
        'others',
        'max_num',
        'image_path1',
        'image_path2',
        'image_path3',
        
    ];
    
    public function user(){
     return $this->belongsTo(User::class);
    }
}
