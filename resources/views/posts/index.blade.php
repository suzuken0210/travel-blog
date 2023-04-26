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
        
        <form method="get" action="/adsearch">
          <input type="text" name="address" placeholder="adサーチ">
          <input type="submit" value="検索">
        </form>
        
        
        
          {{--　<input type="datetime-local" name="schedule">　--}}
            <form action="/schedule" method="get">
                <label for="from">from:</label>
                <input type="date" name="from" id="from" required>
                <label for="until">until:</label>
                <input type="date" name="until" id="until" required>
                <button type="submit">Search</button>
            </form>
            
          
        
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    
                    <a href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                    <h3 class='spot'>{{ $post->spot }}</h3> 
                    <h3 class='schedule'>{{ $post->schedule }}</h3> 
                    <p class='body'>{{ $post->body }}</p>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。" width="10%" height="10%" />
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
    
    </x-app-layout>
</html>

