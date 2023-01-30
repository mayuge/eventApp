<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/join.css')  }}" >
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
            <div class="label"><h2>イベント概要</h2></div>
                <div class="middle_container">
                       
                        <img class="event_img"src="{{ $events->image_url1 }}" />
                        <img class="event_img"src="{{ $events->image_url2 }}" />
                        <img class="event_img"src="{{ $events->image_url3 }}" />
                        <h2>{{$events->title}}</h2>
                        <p>作成者：{{$events->creater()->name}}</p>
                        <p>更新日時：{{$events->updated_at}}</p>
                        <hr>
                        <p>イベント説明：{{$events->description}}</p>
                        <p>実施場所：{{$events->address}}</p>
                        <p>開催日時：{{$events->date}}</p>
                        <p>最大人数：{{$events->max_num}}人</p>
                        
                         <p>現在：{{$events->userCount()}}人</p>
                        
                        
                        @if(Auth::user()->id == $events->user_id)
                            <p style="background: #ff03d9;">参加者のみ表示される情報：{{$events->message}}</p>
                        @elseif(Auth::user()->joinedEvent($events->id))
                            <p style="background: #ff03d9;">参加者のみ表示される情報：{{$events->message}}</p>
                        @endif
                            <p>その他：{{$events->others}}</p>
                </div>
                @if($events->userCount() > 0)
                <div class="label"><h2>イベント参加状況</h2></div>
                    <table>
                    <tr><th class="top-th">名前</th ><th class="top-th">コメント</th><th class="top-th">参加取り消し</th></tr>    
                @endif
                       @foreach($event_user2 as $event_user)
                        <tr>
                           <th>{{Auth::user()::find($event_user->user_id)->name}}</th>
                           <th>{{$event_user->comment}}</th>
                           @if(Auth::user()->id == $events->user_id)
                                <th><a href='/{{$event_user->id}}/joinDelete'>管理者削除する</a></th>
                           @elseif(Auth::user()->id == $event_user->user_id)
                                <th><a href='/{{$event_user->id}}/joinDelete'>取り消す</a></th>
                           @else
                           <th></th>
                           @endif
                        </tr>   
                       @endforeach
                    </table>
                    @if(!Auth::user()->joinedEvent($events->id) && !(Auth::user()->id == $events->user_id))
                        <div class="label" style="margin-top:10px;"><h2>参加申し込み</h2></div>
                        <form action="/candidate" method="POST">
                            @csrf
                                <div><input type="hidden" name="event_users[user_id]" value="{{ Auth::user()->id }}"/></div>
                                <div><input type="hidden" name="event_users[event_id]" value="{{$events->id}}"/></div>
                                <div><textarea name="event_users[comment]"rows="4" placeholder="参加にあたってのコメントがあればどうそ！"></textarea></div>
                                <input class="join_button" type="submit" value="このイベントに参加する"/>
                        </form> 
                    @endif
             </div>
        </div>
    </body>    
</html>