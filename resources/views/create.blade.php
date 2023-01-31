<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/create.css')  }}" >
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
                <div class="label"><h2>イベント作成画面</h2></div>
                
                    <form style="margin-left:1vw;" action="/store" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div><input type="hidden" name="events[user_id]" value="{{ Auth::user()->id }}"/></div>
                            <h3>イベント名(必須)</h3>
                            <div><input class="input_form" type="text" name="events[title]" placeholder="イベント名"/></div>
                            <h3>イベント説明（必須）</h3>
                            <div><textarea name="events[description]" placeholder="イベント説明"></textarea></div>
                            <h3>集合場所（必須）</h3>
                            <div><textarea name="events[address]" placeholder="大まかな集合場所を設定してください。例）東京駅、使用するオンライン会議ソフトの名前など"></textarea></div>
                            <h3>開催日時（必須）</h3>
                            <div><input class="input_form" type="datetime-local" name="events[date]" placeholder="日時"></div>
                            <h3>参加上限人数（必須）</h3>
                            <div><input class="input_form" type="number" min="2"name="events[max_num]" placeholder="参加上限人数（参加者は含めない）"></input></div>
                            <h3>秘密のメッセージ</h3>
                            <div><textarea name="events[message]" placeholder="秘密のメッセージはイベント参加者のみが閲覧できます。詳しい集合場所やオンライン会議のURLはこちらへ"></textarea></div>
                            <h3>その他</h3>
                            <div><textarea name="events[others]" placeholder="その他"></textarea></div>
                           
                            <div><input type="file" name="events[image_path1]" placeholder="イメージ１"></input></div>
                            <div><input type="file" name="events[image_path2]" placeholder="イメージ２"></input></div>
                            <div><input type="file" name="events[image_path3]" placeholder="イメージ３"></input></div>
                        <input class="join_button" type="submit" value="このイベントを作成する"/>
                    </form>
                
            </div>
        </div>    
    </body>    
</html>
