<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/index.css')  }}" >
        <title>eventApp</title>
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
                <a class="login_button" href='/login'>ログイン</a>
                <a class="login_button" href='/register'>新規登録</a>
            </div>
            <div class="blog_container">
                <img style="width:100%;"src="https://res.cloudinary.com/derexoeav/image/upload/v1674231158/ajy01ljzsnvcew6spkad.jpg">
                <div class="label"><h2>イベントブログ一覧</h2></div>
                <div class="card_container">
                    @foreach ($blogs as $blog)
                    <div class="blog_card">
                        @if($blog->image_url1 === null)
                        <img style="width:100%;height:50%;"src="https://res.cloudinary.com/derexoeav/image/upload/v1674231158/ajy01ljzsnvcew6spkad.jpg">
                        @else
                        <img style="width:100%;height:50%;"src="{{ $blog->image_url1 }}">
                        @endif
                        <h2>{{$blog->title}}</h2>
                        <p>{{$blog->created_at}}</p>
                        <p class="indents">{{$blog->body}}</p>
                        
                        <a class="join_button" style="margin-top:auto; margin-bottom:40px;width:95%;" href='/{{$blog->id}}/blog'>ブログを見る</a>
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
