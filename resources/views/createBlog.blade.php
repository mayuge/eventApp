<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/createBlog.css')  }}" >
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
                <div class="label"><h2>ブログ作成画面</h2></div>
                
                <form style="margin-left:1vw;" action="/storeBlog" method="POST" enctype="multipart/form-data">
                    @csrf
                        <h3>ブログタイトル（必須）</h3>
                        <div><input class="input_form" type="text" name="blog[title]" placeholder="ブログタイトル"/></div>
                        <div><input type="hidden" name="blog[user_id]" value="{{ Auth::user()->id }}"/></div>
                        <h3>ブログ内容（必須）</h3>
                        <div><textarea name="blog[body]" placeholder="ブログ内容"></textarea></div>
                        <div><input type="file" name="blog[image_path1]" placeholder="イメージ１"></input></div>
                        <div><input type="file" name="blog[image_path2]" placeholder="イメージ２"></input></div>
                        <div><input type="file" name="blog[image_path3]" placeholder="イメージ３"></input></div>
                       
                    <input class="join_button"type="submit" value="この内容でブログを作成"/>
                </form>
                
            </div>    
        </div>
    </body>    
</html>
