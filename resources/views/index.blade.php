<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/index.css')  }}" >
        <title>eventApp</title>
    </head>
    <body class="antialiased">

        <nav>
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
                <div class="card_container">
                @foreach ($blogs as $blog)
                <div class="blog_card">
                    <h2>{{$blog->title}}</h2>
                    <p>{{$blog->body}}</p>
                    
                    <div class="message_scroll">
                         @foreach($blog->comments as $comment)
                         
                            <h3>{{$comment->name}}</h3>
                            <div class="messagebox">
                                <p>{{$comment->body}}</p>
                            </div>
                            
                         @endforeach
                         
                    </div>
                       
                    <form action="/storeComment/{{$blog->id}}" method="POST">
                         @csrf
                        <div><input type="text" name="comment[name]" placeholder="ニックネーム"/></div>
                        <div><input type="text" name="comment[body]" placeholder="コメント"/></div>
                        <div><input type="hidden" name="comment[blog_id]" value="{{$blog->id}}"/></div>
                        <input type="submit" value="決定"/>
                    </form>
             </div>
                
                @endforeach
            <div class="paginate">
                 {{ $blogs->links() }}   
            </div>    
               
            </div>
              
             
         
        </div>
       
    </body>    
</html>
