<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Event_user;

use Cloudinary; 

class MyController extends Controller
{
    public function index(User $user){
        return view('index')->with(['user' => $user]);
    }
    
    public function view(User $user, Event $event){
        return view('view')->with(["events"=>$event->withCount('user')->paginate(5),'user' => $user]);
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
        $file = $request->file('events');
        //$file1 =$file['image_path1'];
        //$file2 =$file['image_path2'];
        //$file3 =$file['image_path3'];
        if(isset($file['image_path1'])){
            $image_url1 = Cloudinary::upload($file['image_path1']->getRealPath())->getSecurePath();
            $input += ['image_url1' => $image_url1];
        }
        if(isset($file['image_path2'])){
            $image_url2 = Cloudinary::upload($file['image_path2']->getRealPath())->getSecurePath(); 
            $input += ['image_url2' => $image_url2];
        }
        if(isset($file['image_path3'])){
            $image_url3 = Cloudinary::upload($file['image_path3']->getRealPath())->getSecurePath();
            $input += ['image_url3' => $image_url3];
        }
        
        
        
        
       // dd($image_url2);
    
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
         $file = $request->file('events');
       
        if(isset($file['image_path1'])){
            $image_url1 = Cloudinary::upload($file['image_path1']->getRealPath())->getSecurePath();
            $input += ['image_url1' => $image_url1];
        }
        if(isset($file['image_path2'])){
            $image_url2 = Cloudinary::upload($file['image_path2']->getRealPath())->getSecurePath(); 
            $input += ['image_url2' => $image_url2];
        }
        if(isset($file['image_path3'])){
            $image_url3 = Cloudinary::upload($file['image_path3']->getRealPath())->getSecurePath();
            $input += ['image_url3' => $image_url3];
        }
        
        $event->fill($input)->save();
         return redirect('/');

    }
    
    
     public function join(User $user, Event $event){
        return view('join')->with(["events"=>$event,'user' => $user]);
    }
    
    public function delete(Event $event){
        $event->delete();
        return redirect('/view');
    }
}
