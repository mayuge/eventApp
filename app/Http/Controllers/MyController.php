<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Event_user;

class MyController extends Controller
{
    public function index(User $user){
        return view('index')->with(['user' => $user]);
    }
    
    public function view(User $user, Event $event){
        return view('view')->with(["events"=>$event->withCount('user')->get(),'user' => $user]);
    }
    
    
    
      public function create(User $user){
        return view('create')->with(['user' => $user]);
    }
    
    public function eventEdit(User $user ,Event $event){
        return view('eventEdit')->with(['user' => $user,'events'=>$event]);
    }
    
    public function store(Request $request, Event $event){
        $input = $request['events'];
        //dd($input);
    
        $event->fill($input)->save();
        
         return redirect('/view');
    }
    
    public function candidate(Request $request, Event_user $event_user){
        $input = $request['event_users'];
        //dd($input);
    
        $event_user->fill($input)->save();
        
         return redirect('/view');
    }
    
    public function update(Request $request, Event $event){
        $input = $request['events'];
        $event->fill($input)->save();
        
         return redirect('/view');
    }
    
    
     public function join(User $user, Event $event){
        return view('join')->with(["events"=>$event,'user' => $user]);
    }
    
    public function delete(Event $event){
        $event->delete();
        return redirect('/view');
    }
}
