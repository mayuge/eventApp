<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Event_user;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cloudinary; 

class MyController extends Controller
{
    public function index(User $user, Blog $blog, Comment $comment){
        return view('index')->with(['user' => $user,'blogs' => $blog->orderBy('created_at', 'desc')->paginate(6),'comments'=>$comment]);
    }
    public function blog(User $user, Blog $blog, Comment $comment){
        return view('blog')->with(['user' => $user,'blog' => $blog,'comments'=>$comment]);
    }
    
    public function view(User $user, Event $event, Blog $blog){
        $event_input = $event->withCount('users')->orderBy('updated_at', 'desc')->paginate(6,['*'], 'eventPage')->appends(['blogPage' => \Request::get('blogPage')]);
        $blog_input = $blog->orderBy('created_at', 'desc')->paginate(6,['*'], 'blogPage')->appends(['eventPage' => \Request::get('eventPage')]);
        
        return view('view')->with(['events'=>$event_input,'user' => $user,'blogs' =>$blog_input]);
    }
    
    public function createBlog(User $user){
        return view('createBlog')->with(['user' => $user]);
    }
    
    public function create(User $user){
        return view('create')->with(['user' => $user]);
    }
    
    public function eventEdit(User $user ,Event $event){
        return view('eventEdit')->with(['user' => $user,'events'=>$event]);
    }
    public function storeBlog(Request $request, Blog $blog){
         $input = $request['blog'];
        // dd($input);
         $file = $request->file('blog');
       
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
        
        $blog->fill($input)->save();
        return redirect('/view');
    }
    
    public function storeComment(Request $request, Comment $comment){
         $input = $request['comment'];
         $comment->fill($input)->save();
         return redirect('/');
    }
    
    public function store(Request $request, Event $event, Event_user $event_user){
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
        //dd($event);
       
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
         return redirect('/view');

    }
    
    
     public function join(Event $event ,Event_user $event_user){
    
        $event_user2= DB::table('event_users')->where('event_id','=',$event->id)->get();
        
        $users = $event->users;
    
        return view('join')->with(['users'=>$users,'event_user2'=>$event_user2,'events'=>$event]);
    }
    
    public function delete(Event $event){
        $event->delete();
        return redirect('/view');
    }
    
    public function joinDelete(Event_user $event_user){
        $event_user->delete();
        return redirect('/view');
    }
    
    public function blogDelete(Blog $blog){
        $blog->delete();
        return redirect('/view');
    }
}
