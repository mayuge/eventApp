<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class mySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appusers')->insert([
                'name' => '山田太郎',
                'email' => 'taro@gmail.com',
         ]);
         
          DB::table('blogs')->insert([
                'title' => 'ブログのタイトル',
                'body' => '本文',
         ]);
         
        DB::table('events')->insert([
             
                'user_id' => '1',
                'title' => 'イベント名',
                'address' => 'アドレス名',
                'date' => '2018-02-02 18:31',
                'description' => 'ディスクリプション',
                'image_path1' => 'イメージ１',
                'image_path2' => 'イメージ２',
                'image_path3' => 'イメージ３',
                'message' => 'メッセージ',
                'others' => 'その他',
                'max_num' => 10,
         ]);
         DB::table('event_users')->insert([
             
                'user_id' => 'ユーザーアイディー',
                'event_id' => 'イベントアイディー',
                'comment' => 'コメント',
               
         ]);
    }
}
