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
    
    public function view(User $user){
        return view('view')->with(['user' => $user]);
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
}
