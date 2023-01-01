<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MyController extends Controller
{
    public function index(User $user){
        return view('index')->with(['user' => $user]);
    }
    
    public function view(User $user){
        return view('view')->with(['user' => $user]);
    }
}
