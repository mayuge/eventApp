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
            <a href='/{{$event->id}}/join'>参加する</a>
        </div>
         
        @endforeach
        <a href='/'>戻る</a>
       
</html>
