<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/loginBlog.css')  }}" >
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
                <a class="login_button" href='/create'>イベント作成</a>
                <a class="login_button" href='/createBlog'>ブログ作成</a>
                <a class="login_button" href='/view'>イベント一覧</a>
                <a class="login_button" href='/'>ログアウト</a>
            </div>
            <div class="blog_container">
                    
                <div class="label"><h2>ログイン後画面</h2></div>
                <div style="display:flex; margin-left:1vw;">
                    <span class="material-icons icon">person</span>
                    <div style="margin:auto 0;">{{ Auth::user()->name }}</div>
                </div>
                
                <div style="display:flex; margin-left:1vw;">
                    <span class="material-icons icon">email</span>
                    <div style="margin:auto 0;">{{ Auth::user()->email }}</div>
                </div>
                
                <div class="sm_menu">
                    <a class="login_button" href='/create'>イベント作成</a>
                    <a class="login_button" href='/createBlog'>ブログ作成</a>
                    <a class="login_button" href='/view'>イベント一覧</a>
                    <a class="login_button" href='/'>ログアウト</a>
                </div>
                
                <div class="label"><h2>ブログ一覧画面</h2></div>
                
                <div class="card_container">
                        @foreach ($blogs as $blog)
                        <div class="blog_card">
                            @if($blog->image_url1 === null)
                                <img style="width:100%;height:50%;"src="https://res.cloudinary.com/derexoeav/image/upload/v1674231158/ajy01ljzsnvcew6spkad.jpg">
                            @else
                                <img style="width:100%;height:50%;"src="{{ $blog->image_url1 }}">
                            @endif
                            
                            <h2>{{$blog->title}}</h2>
                            <div style="display:flex;">
                                <span class="material-icons mini_icon">person</span>
                                <p>作成者：{{$blog->blogCreater()->name}}</p>
                            </div>
                            <div style="display:flex;">
                                <span class="material-icons mini_icon">schedule</span>
                            <p>作成日：{{$blog->created_at}}</p>
                            </div>
                            
                            <p class="indents">{{$blog->body}}</p>
                            
                            
                            
                            @if(Auth::user()->id == $blog->user_id)
                                <a class="join_button" style="width:95%;" href='/{{$blog->id}}/blog'>ブログを見る</a>
                                <a class="join_button" style="width:95%; background-color:#8e89c4"href='/{{$blog->id}}/blogDelete'>削除する</a>
                            @else
                                <a class="join_button" style="margin-top:auto; margin-bottom:40px;width:95%;" href='/{{$blog->id}}/blog'>ブログを見る</a>
                            @endif
                            
                        </div>
                        @endforeach
                </div>
                <div class="paginate">
                    {{ $blogs->links() }}   
                </div>
          
            
            </div>
        </div>
        
    </body>    
       
</html>
