<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <title>eventApp</title>
    </head>
    <body class="antialiased">
        <h1>ログイン後画面</h1>
        <div>{{ Auth::user()->name }}</div>
         <div>{{ Auth::user()->id }}</div>
         <div>{{ Auth::user()->email }}</div>
         
        <a href='/create'>イベント作成</a>
        <a href='/createBlog'>ブログを書く</a>
        <a href='/'>戻る</a>
        
        <div class="card_container">
            @foreach ($blogs as $blog)
            <div class="blog_card">
                <img style="width:100%;height:50%;"src="{{ $blog->image_url1 }}" alt="画像が読み込めません。">
              
                <h2>{{$blog->title}}</h2>
                <p>{{$blog->body}}</p>
                @if(Auth::user()->id == $blog->user_id)
                    <a href='/{{$blog->id}}/blogDelete'>削除する</a>
                @endif    
            </div>
            @endforeach
        </div>
        <div class="paginate">
            {{ $blogs->links() }}   
        </div>
        @foreach ($events as $event)
        <div style="border:solid 3px;margin-top:2%;">
            <div>
                <p>{{$event->id}}</p>
                <h2>{{$event->title}}</h2>
                <p>{{$event->description}}</p>
                <li>{{$event->address}}</li>
                <li>{{$event->date}}</li>
                <li>{{$event->max_num}}人</li>
                <p>{{$event->message}}</p>
                <p>{{$event->others}}</p>
                
                <img src="{{ $event->image_url1 }}" alt="画像が読み込めません。"/>
                <img src="{{ $event->image_url2 }}" alt="画像が読み込めません。"/>
                <img src="{{ $event->image_url3 }}" alt="画像が読み込めません。"/>
                
            </div>
            <p>{{$event->user_count}}</p>
            @if($event->user_id != Auth::id())
            <a href='/{{$event->id}}/join'>参加する</a>
            @else
            <a href='/{{$event->id}}/join'>参加者と交流</a>
            <a href='/{{$event->id}}/delete'>削除する</a>
            <a href='/{{$event->id}}/eventEdit'>編集する</a>
            @endif
        </div>
         
        @endforeach 
        <div>
            {{ $events->links() }}    
        </div>
        
        <a href='/'>戻る</a>
    </body>    
       
</html>
