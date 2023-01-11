<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

class MyController extends Controller
{
    public function index(User $user){
        return view('index')->with(['user' => $user]);
    }
    
    public function view(User $user, Event $event){
        return view('view')->with(["events"=>$event->get()])->with(['user' => $user]);
    }
    
    
    
      public function create(User $user){
        return view('create')->with(['user' => $user]);
    }
    
    public function store(Request $request, Event $event){
        $input = $request['events'];
        //dd($input);
    
        $event->fill($input)->save();
        
         return redirect('/view');
    }
     public function join(User $user, Event $event){
        return view('join')->with(["events"=>$event])->with(['user' => $user]);
    }
}
