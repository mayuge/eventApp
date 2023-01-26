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
        'image_url1',
        'image_url2',
        'image_url3',
    ];
    public function getPaginateByLimit(int $limit_count = 5){
     return $this->paginate($limit_count);
    }
    
    public function user(){
     return $this->belongsTo(User::class);
    }
    public function users(){
     return $this->belongsToMany(User::class,'event_users');
    }
 
}
