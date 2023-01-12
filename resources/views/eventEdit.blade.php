<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <title>eventApp</title>
    </head>
    <body class="antialiased">
        


        <h1>更新画面</h1>
        <div>テキストエリアにはvalue使えない</div>
       <form action="{event}/update" method="POST">
            @csrf
    
                <div><input type="text" name="events[title]" value="{{$events->title}}"></div>
                <div><input type="hidden" name="events[user_id]" value="{{ Auth::user()->id }}"/></div>
                <div><textarea name="events[description]" value="{{$events->description}}"></textarea></div>
                <div><textarea name="events[address]" value="{{$events->address}}"></textarea></div>
                <div><textarea name="events[date]" value="{{$events->date}}"></textarea></div>
                <div><textarea name="events[message]" value="{{$events->message}}"></textarea></div>
                <div><textarea name="events[others]" value="{{$events->others}}"></textarea></div>
                <div><input type="number" name="events[max_num]" value="{{$events->max_num}}"></input></div>
                <div><input type="file" name="events[image_path1]" value="{{$events->image_path1}}"></input></div>
                <div><input type="file" name="events[image_path2]" value="{{$events->image_path2}}"></input></div>
                <div><input type="file" name="events[image_path3]" value="{{$events->image_path3}}"></input></div>
               
            <input type="submit" value="決定"/>
        </form>
        <div class="footer">
            <a href="/view">戻る</a>
        </div>
        
    </body>    
</html>
