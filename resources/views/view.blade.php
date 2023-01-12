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
         
         <div>画像の投稿を任意にしたい。削除・更新機能必要。現段階での参加希望人数を表示したい。グーグルマップの表示必要？画像を投稿する機能。主催者も参加できてしまう。参加日時Date型にする？何度も同じイベントに同じ人がログインできてしまう。</div>
         
        <a href='/create'>イベント作成</a>
        <a href='/'>戻る</a>
        
        @foreach ($events as $event)
        <div style="border:solid 3px;margin-top:2%;">
            <div>
                <h2>{{$event->title}}</h2>
                <p>{{$event->description}}</p>
                <li>{{$event->address}}</li>
                <li>{{$event->date}}</li>
                <li>{{$event->max_num}}人</li>
                <p>{{$event->message}}</p>
                <p>{{$event->others}}</p>
            </div>
            <p>{{$event->user_count}}</p>
            @if($event->user_id != Auth::id())
            <a href='/{{$event->id}}/join'>参加する</a>
            @else
            <a href='/{{$event->id}}/delete'>削除する</a>
            <a href='/{{$event->id}}/eventEdit'>編集する</a>
            @endif
        </div>
         
        @endforeach
        <a href='/'>戻る</a>
       
</html>
