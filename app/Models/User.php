<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Event;
use App\Models\Event_user;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     * 
     *この下にあるはモデルの関数でリレーションができる
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function joinEvents(){
     return $this->belongsToMany(Event::class,'event_users');
    }
    
    public function joinedEvent($event_id){
        return Event_user::where('user_id',$this->id)->where('event_id',$event_id)->exists();
    }
    
   
}
