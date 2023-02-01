<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/view.css')  }}" >
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
                <a class="login_button" href='/loginBlog'>ブログ一覧</a>
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
                
                <div class="label"><h2>開催イベント一覧</h2></div>
                <div class="card_container">
                    @foreach ($events as $event)
                    <div class="event_card">
                        <div>
                            @if($event->image_url1 === null)
                                <img style="width:100%;height:220px;"src="https://res.cloudinary.com/derexoeav/image/upload/v1674231158/ajy01ljzsnvcew6spkad.jpg">
                            @else
                                <img style="width:100%;height:220px;"src="{{ $event->image_url1 }}">
                            @endif
                            <h2 class="indent">{{$event->title}}</h2>
                            <div style="display:flex;">
                                <p　class="indent">{{$event->description}}</p>
                            </div>
                            <div style="display:flex;">
                                <span class="material-icons mini_icon">person</span>
                                <p>作成者：{{$event->creater()->name}}</p>
                            </div>
                            <div style="display:flex;">
                                <span class="material-icons mini_icon">place</span>
                                <p>場所：{{$event->address}}</p>
                            </div>
                            <div style="display:flex;">
                                <span class="material-icons mini_icon">schedule</span>
                                <p>日時：{{$event->date}}</p>
                            </div>
                            <div style="display:flex;">
                                <span class="material-icons mini_icon">groups</span>
                                <p>定員：{{$event->max_num}}人</p>
                            </div>
                            <div style="display:flex;">
                                <span class="material-icons mini_icon">person_add</span>
                                <p>現在：{{$event->users_count}}人</p>
                            </div>
                            <div style="display:flex;">
                                <span class="material-icons mini_icon">description</span>
                                <p class="indent">その他：{{$event->others}}</p>
                            </div>
                            
                        </div>
                      
                      
                            @if($event->user_id == Auth::id())
                                <a class="join_button" style="width:95%;" href='/{{$event->id}}/join'>主催者管理画面へ</a>
                                <div style="display:flex;">
                                <a class="join_button" style="width:45%;background-color:#8e89c4;" href='/{{$event->id}}/delete'>削除する</a>
                                <a class="join_button" style="width:45%;background-color:#92c957;" href='/{{$event->id}}/eventEdit'>編集する</a>
                                </div>
                            @else
                                @if(!Auth::user()->joinedEvent($event->id) && $event->users_count < $event->max_num)
                                    <a class="join_button" style="width:95%;" href='/{{$event->id}}/join'>イベント詳細</a>
                                @elseif(Auth::user()->joinedEvent($event->id) && $event->users_count < $event->max_num)
                                    <a class="join_button" style="width:95%;" href='/{{$event->id}}/join'>参加済み</a>    
                                @elseif(!Auth::user()->joinedEvent($event->id))
                                    <div style="color:red;">募集が終了しました。</div>
                            　  @else
                            　       <a class="join_button" style="width:95%;" href='/{{$event->id}}/join'>参加済み</a>
                            　  @endif
    
                            @endif
                       
                           
                    </div>
                    @endforeach 
                </div>
                <div>
                    {{ $events->links() }}    
                </div>
            </div>
        </div>
        
    </body>    
       
</html>
