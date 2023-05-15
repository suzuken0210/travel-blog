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
                    <input type="text" name="post[title]" placeholder="GWに東京に行ってきました！"/>
                </div>
                
                <div class="schedule">
                    <h2>旅行日</h2>
                    <input type="date" name="post[schedule]"/>
                </div>
                
                <div class="address">
                    <h2>訪れた場所（最大１６箇所）</h2>
                    <input type="text" name="address[0]" placeholder="東京タワー"/>
                    <input type="text" name="address[1]" placeholder="東京スカイツリー"/>
                    <input type="text" name="address[2]" placeholder="東京駅"/>
                    <input type="text" name="address[3]" placeholder="上野動物園"/>
                    <input type="text" name="address[4]" />
                    <input type="text" name="address[5]" />
                    <input type="text" name="address[6]" />
                    <input type="text" name="address[7]" />
                    <input type="text" name="address[8]" />
                    <input type="text" name="address[9]" />
                    <input type="text" name="address[10]" />
                    <input type="text" name="address[11]" />
                    <input type="text" name="address[12]" />
                    <input type="text" name="address[13]" />
                    <input type="text" name="address[14]" />
                    <input type="text" name="address[15]" />
                </div>
                
                <div class="spot">
                    <h2>訪れた場所の中で特にお気に入りの場所</h2>
                    <input type="text" name="post[spot]" placeholder="東京タワー"/>
                </div>
                
                <div class="image">
                    <h2>お気に入り観光地の写真</h2>
                <input type="file" name="image">
                </div>
                
                <div class="body">
                    <h2>旅行日記</h2>
                    <textarea name="post[body]" placeholder=""></textarea>
                    
                </div>
 
                <input type="submit" value="保存"/>
            </form>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </body>
        </x-app-layout>
    </html>
