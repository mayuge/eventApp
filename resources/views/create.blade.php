<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <title>eventApp</title>
    </head>
    <body class="antialiased">
        


        <h1>作成画面</h1>
       <form action="/store" method="POST">
            @csrf
    
                <div><input type="text" name="events[title]" placeholder="イベント名"/></div>
                 <div><input type="hidden" name="events[user_id]" value="{{ Auth::user()->id }}"/></div>
                <div><textarea name="events[description]" placeholder="イベント説明"></textarea></div>
                <div><textarea name="events[address]" placeholder="場所"></textarea></div>
               <div><textarea name="events[date]" placeholder="日時"></textarea></div>
                <div><textarea name="events[message]" placeholder="メッセージ"></textarea></div>
                <div><textarea name="events[others]" placeholder="その他"></textarea></div>
                <div><textarea name="events[max_num]" placeholder="最大人数"></textarea></div>
                <div><textarea name="events[image_path1]" placeholder="イメージ１"></textarea></div>
                <div><textarea name="events[image_path2]" placeholder="イメージ２"></textarea></div>
                <div><textarea name="events[image_path3]" placeholder="イメージ３"></textarea></div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="view">戻る</a>
        </div>
        
    </body>    
</html>