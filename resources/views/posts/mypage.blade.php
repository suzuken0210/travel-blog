<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <x-app-layout>
        <x-slot name="header">
    
            <head>
                <x-slot name="header">
                    ここにはヘッダー
                    <meta charset="utf-8">
                    <title>Blog</title>
                    <!-- Fonts -->
                    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
                    </x-slot>
            </head>
        
        
        
    <body>
        <h1>Blog Name</h1>
        <a href='/posts/create'>create</a>
        
        
        <!--<form method="get" action="/search">-->
        <!--  <input type="text" name="spot" placeholder="検索語句を入力">-->
        <!--  <input type="submit" value="検索">-->
        <!--</form>-->
        
        
        <!--  {{--　<input type="datetime-local" name="schedule">　--}}-->
        <!--    <form action="/schedule" method="get">-->
        <!--        <label for="from">from:</label>-->
        <!--        <input type="date" name="from" id="from" required>-->
        <!--        <label for="until">until:</label>-->
        <!--        <input type="date" name="until" id="until" required>-->
        <!--        <button type="submit">Search</button>-->
        <!--    </form>-->
            
          
        
        <div class='posts'>
            @foreach ($posts as $post)
                <!--<div class='post'>-->
                    
                    
                <li>{{ $post->title }}</li>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
    
    </x-app-layout>
</html>

