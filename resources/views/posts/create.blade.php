<!DOCTYPE HTML>

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
        <head>
            <meta charset="utf-8">
            <title>Blog</title>
            
        </head>
        <x-app-layout>
        <body>
            <h1>Blog Name</h1>
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="title">
                    <h2>Title</h2>
                    <input type="text" name="post[title]" placeholder="タイトル"/>
                </div>
                
                <div class="spot">
                    <h2>spot</h2>
                    <input type="text" name="post[spot]" placeholder="tokyo"/>
                </div>
                
                <!--<div class="spot">-->
                <!--    <h2>spot</h2>-->
                <!--    <input type="text" name="post[spot]" placeholder="tokyo"/>-->
                <!--</div>-->
                
                <div class="body">
                    <h2>Body</h2>
                    <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
                    
                </div>
                
                
                
                <div class="schedule">
                    <h2>schedule</h2>
                    <input type="datetime-local" name="post[schedule]"/>
                </div>
                
                <div class="image">
                <input type="file" name="image">
                </div>
                
                <input type="submit" value="store"/>
            </form>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </body>
        </x-app-layout>
    </html>
