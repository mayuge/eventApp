<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <title>eventApp</title>
    </head>
    <body class="antialiased">
  


        <h1>イベントアプリ</h1>
        <a href='/login'>ログイン</a>
        <a href='/register'>新規登録</a>
        
        @foreach ($blogs as $blog)
        <div style="border:solid 3px;margin-top:2%;">
        <h2>{{$blog->title}}</h2>
        <p>{{$blog->body}}</p>
        
        <form action="/storeComment/{{$blog->id}}" method="POST">
             @csrf
            <div><input type="text" name="comment[name]" placeholder="ニックネーム"/></div>
            <div><input type="text" name="comment[body]" placeholder="コメント"/></div>
            <div><input type="hidden" name="comment[blog_id]" value="{{$blog->id}}"/></div>
            <input type="submit" value="決定"/>
        </form>    
            
            @foreach($blog->comments as $comment)
               
                    <h3>{{$comment->name}}</h3>
                    <p>{{$comment->body}}</p>
               
            @endforeach
            
        </div>
        @endforeach
        
    </body>    
</html>
