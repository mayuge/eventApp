<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <title>eventApp</title>
    </head>
    <body class="antialiased">
        


        <h1>作成画面</h1>
       <form action="/store" method="POST" enctype="multipart/form-data">
            @csrf
    
                <div><input type="text" name="events[title]" placeholder="イベント名"/></div>
                <div><input type="hidden" name="events[user_id]" value="{{ Auth::user()->id }}"/></div>
                <div><textarea name="events[description]" placeholder="イベント説明"></textarea></div>
                <div><textarea name="events[address]" placeholder="場所"></textarea></div>
                <div><input type="datetime-local" name="events[date]" placeholder="日時"></div>
                <div><textarea name="events[message]" placeholder="メッセージ"></textarea></div>
                <div><textarea name="events[others]" placeholder="その他"></textarea></div>
                <div><input type="number" min="2"name="events[max_num]" placeholder="最大人数"></input></div>
                <div><input type="file" name="events[image_path1]" placeholder="イメージ１"></input></div>
                <div><input type="file" name="events[image_path2]" placeholder="イメージ２"></input></div>
                <div><input type="file" name="events[image_path3]" placeholder="イメージ３"></input></div>
               
            <input type="submit" value="決定"/>
        </form>
        <div class="footer">
            <a href="view">戻る</a>
        </div>
        
    </body>    
</html>
