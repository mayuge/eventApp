<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/blog.css')  }}" >
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
                <div class="label"><h2>ブログ画面</h2></div>
                <div class="middle_container">
                    <img class="event_img"src="{{ $blog->image_url1 }}" />
                    <img class="event_img"src="{{ $blog->image_url2 }}" />
                    <img class="event_img"src="{{ $blog->image_url3 }}" />
                    <h2>{{$blog->title}}</h2>
                    <p>作成者：{{$blog->blogCreater()->name}}</p>
                    <p>作成日時：{{$blog->created_at}}</p>
                    <hr>
                    <p>{{$blog->body}}</p>
                </div>
                <div class="label"><h2>ブログのコメント</h2></div>
                <div class="comment">
                     @foreach($blog->comments as $comment)
                        <div class="messagebox">
                            <h3>{{$comment->name}}</h3>
                            <p style="font-size:12px;">コメント日時：{{$comment->created_at}}</p>
                            <p style="font-size:20px;margin:10px auto;">{{$comment->body}}</p>
                        </div>
                        <hr>
                     @endforeach
                     <form action="/storeComment/{{$blog->id}}" method="POST">
                         @csrf
                        
                        <input type="text" style="margin-top:10px; height:30px;" placeholder="ニックネーム" name="comment[name]"/>
                        <textarea style="width:100%;" rows="3" name="comment[body]" placeholder="コメント"></textarea>
                        <input type="hidden" name="comment[blog_id]" value="{{$blog->id}}"/>
                        <input class="join_button" type="submit" value="コメントを送信"/>
                    </form>
                </div>
            </div>
        </div>
    </body>    
</html>
