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
       <form action="/update" method="POST"  enctype="multipart/form-data">
            @csrf
             @method('PUT')
                <div><input type="text" name="events[title]" value="{{$events->title}}"></div>
                <div><input type="hidden" name="events[user_id]" value="{{ Auth::user()->id }}"/></div>
                <div><input name="events[description]" value="{{$events->description}}"></input></div>
                <div><input name="events[address]" value="{{$events->address}}"></input></div>
                <div><input name="events[date]" value="{{$events->date}}"></input></div>
                <div><input name="events[message]" value="{{$events->message}}"></input></div>
                <div><input name="events[others]" value="{{$events->others}}"></input></div>
                <div><input type="number" name="events[max_num]" value="{{$events->max_num}}"></input></div>
                <div>{{$events->image_url1}}<input type="file" name="events[image_path1]" placeholder="{{$events->image_path1}}"></input></div>
                <div>{{$events->image_url2}}<input type="file" name="events[image_path2]" placeholder="{{$events->image_path2}}"></input></div>
                <div>{{$events->image_url3}}<input type="file" name="events[image_path3]" placeholder="{{$events->image_path3}}"></input></div>
               
            <input type="submit" value="決定"/>
        </form>
        <div class="footer">
            <a href="/view">戻る</a>
        </div>
        
    </body>    
</html>
