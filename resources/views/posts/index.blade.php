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
        
        
        <form method="get" action="/search">
          <input type="text" name="spot" placeholder="検索語句を入力">
          <input type="submit" value="検索">
        </form>
        
        <form method="get" action="/schedule">
          <input type="datetime-local" name="schedule">
          <input type="submit" value="検索">
        </form>
        
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    
                    <a href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                    <h3 class='spot'>{{ $post->spot }}</h3> 
                    <h3 class='schedule'>{{ $post->schedule }}</h3> 
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
    
    </x-app-layout>
</html>

