<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
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
}
