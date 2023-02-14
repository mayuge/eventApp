<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/eventEdit.css')  }}" >
        <title>kimi ~君だけのイベントを開催しよう~</title>
    </head>
    <body class="antialiased">
        <nav class="header_nav">
            <ul>
                <img href="/"style="margin-left:-60px;"src="https://res.cloudinary.com/derexoeav/image/upload/v1674273998/xdnja7rhsf3w7imicf3y.png">
                <li><a href="/">サービス紹介</a></li>
                <li><a href="/">最新情報</a></li>
                <li><a href="/">ブログ</a></li>
                <li><a href="/">お問い合わせ</a></li>
            </ul>
        </nav>

        <div class="container">
            <div class="left_bar">
                    <a class="login_button" href='/'>ログアウト</a>
                    <a class="login_button" href='/view'>戻る</a>
            </div>
            <div class="blog_container">
                <img style="width:100%;"src="https://res.cloudinary.com/derexoeav/image/upload/v1674231158/ajy01ljzsnvcew6spkad.jpg">
                <div class="sm_menu">
                    <a class="login_button" href='/'>ログアウト</a>
                    <a class="login_button" href='/view'>戻る</a>
                </div>
                <div class="label"><h2>ブログ編集画面</h2></div>
                
                <form style="margin-left:1vw" action="/update/{{ $events->id }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div><input type="hidden" name="events[user_id]" value="{{ Auth::user()->id }}"/></div>
                        <h3>イベント名（必須）</h3>
                        <div><input class="input_form" type="text" name="events[title]" value="{{$events->title}}"></div>
                        <h3>イベント説明（必須）</h3>
                        <div><input class="textarea_form" name="events[description]" value="{{$events->description}}"></input></div>
                        <h3>集合場所（必須）</h3>
                        <div><input class="textarea_form" name="events[address]" value="{{$events->address}}"></input></div>
                        <h3>開催日時（必須）</h3>
                        <div><input class="input_form" name="events[date]" value="{{$events->date}}"></input></div>
                        <h3>参加上限人数（必須）</h3>
                        <div><input class="input_form" min="2" type="number" name="events[max_num]" value="{{$events->max_num}}"></input></div>
                        <h3>秘密のメッセージ</h3>
                        <div><input class="textarea_form" name="events[message]" value="{{$events->message}}"></input></div>
                        <h3>その他</h3>
                        <div><input class="textarea_form" name="events[others]" value="{{$events->others}}"></input></div>
                        
                        <div style="margin-top:20px;">{{$events->image_url1}}<input type="file" name="events[image_path1]" placeholder="{{$events->image_path1}}"></input></div>
                        <div>{{$events->image_url2}}<input type="file" name="events[image_path2]" placeholder="{{$events->image_path2}}"></input></div>
                        <div>{{$events->image_url3}}<input type="file" name="events[image_path3]" placeholder="{{$events->image_path3}}"></input></div>
                       
                    <input class="join_button" type="submit" value="この内容で決定する"/>
                </form>
            </div>
        </div>
    </body>    
</html>
