<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <title>eventApp</title>
    </head>
    <body class="antialiased">
        


        <h1>作成画面</h1>
       <form action="/storeBlog" method="POST" enctype="multipart/form-data">
            @csrf
    
                <div><input type="text" name="blog[title]" placeholder="イベント名"/></div>
                <div><input type="hidden" name="blog[user_id]" value="{{ Auth::user()->id }}"/></div>
                <div><textarea name="blog[body]" placeholder="イベント説明"></textarea></div>
             
               
            <input type="submit" value="決定"/>
        </form>
        <div class="footer">
            <a href="view">戻る</a>
        </div>
        
    </body>    
</html>
