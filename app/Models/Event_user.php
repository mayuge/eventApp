<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class Event_user extends Model
{
    use HasFactory;
    //use SoftDeletes;
    
    protected $fillable = [
      
        'user_id',
        'comment',
        'event_id',
        
    ];
}
