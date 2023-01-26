<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <title>eventApp</title>
    </head>
    <body class="antialiased">
  
        <h1>イベント参加</h1>
        
        <div style="border:solid 3px;">
                <div>イベント概要</div>
                <h2>{{$events->title}}</h2>
                <p>{{$events->description}}</p>
                <li>{{$events->address}}</li>
                <li>{{$events->date}}</li>
                <li>{{$events->max_num}}人</li>
                <p>{{$events->message}}</p>
                <p>{{$events->others}}</p>
        </div>
           @foreach($event_user2 as $event_user)
               <div>{{Auth::user()::find($event_user->user_id)->name}}</div>
               <div>{{$event_user->comment}}</div>
               @if(Auth::user()->id == $events->user_id)
                    <a href='/{{$event_user->id}}/joinDelete'>管理者削除する</a>
               @endif
               
               @if(!(Auth::user()->id == $events->user_id) && Auth::user()->id == $event_user->user_id)
                    <a href='/{{$event_user->id}}/joinDelete'>削除する</a>
               @endif
               
               
           @endforeach
           
            @if(!Auth::user()->joinedEvent($events->id))
                <form action="/candidate" method="POST">
                    @csrf
                        <div><input type="hidden" name="event_users[user_id]" value="{{ Auth::user()->id }}"/></div>
                        <div><input type="hidden" name="event_users[event_id]" value="{{$events->id}}"/></div>
                        <div><textarea name="event_users[comment]" placeholder="参加にあたってのコメント"></textarea></div>
                        <input type="submit" value="参加する"/>
                </form> 
            @endif
            
            
            
            
         <a href='/view'>戻る</a>
      
    </body>    
</html>