<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <title>eventApp</title>
    </head>
    <body class="antialiased">
        
        <h1>ブログ画面</h1>
        <h2>{{$blog->title}}</h2>
        <p>{{$blog->body}}</p>
         @foreach($blog->comments as $comment)
            <h3>{{$comment->name}}</h3>
            <div class="messagebox">
                <p>{{$comment->body}}</p>
            </div>
         @endforeach
         <form action="/storeComment/{{$blog->id}}" method="POST">
             @csrf
            <div><input type="text" name="comment[name]" placeholder="ニックネーム"/></div>
            <div><input type="text" name="comment[body]" placeholder="コメント"/></div>
            <div><input type="hidden" name="comment[blog_id]" value="{{$blog->id}}"/></div>
            <input type="submit" value="決定"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        
    </body>    
</html>
