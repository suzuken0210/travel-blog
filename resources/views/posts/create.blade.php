<!DOCTYPE HTML>

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
        <head>
            <meta charset="utf-8">
            <title>日記投稿画面</title>
            
        </head>
        <x-app-layout>
        <body>
            <h1>日記投稿画面</h1>
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="title">
                    <h2>タイトル</h2>
                    <input type="text" name="post[title]" placeholder="タイトル"/>
                </div>
                
                <div class="address">
                    <h2>訪れた場所</h2>
                    <input type="text" name="address[0]" placeholder="tokyo"/>
                    <input type="text" name="address[1]" placeholder="tokyo"/>
                    <input type="text" name="address[2]" placeholder="tokyo"/>
                </div>
                
                <div class="spot">
                    <h2>訪れた場所の中で特にお気に入りの場所</h2>
                    <input type="text" name="post[spot]" placeholder="tokyo"/>
                </div>
                
                <div class="body">
                    <h2>本文</h2>
                    <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
                    
                </div>
                
                
                
                <div class="schedule">
                    <h2>旅行日</h2>
                    <input type="date" name="post[schedule]"/>
                </div>
                
                <div class="image">
                <input type="file" name="image">
                </div>
                
                <div class="image2">
                <input type="file" name="image2">
                </div>
                
                <input type="submit" value="保存"/>
            </form>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </body>
        </x-app-layout>
    </html>
