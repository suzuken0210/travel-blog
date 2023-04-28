<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <x-app-layout>
        <x-slot name="header">
    
            <head>
                <x-slot name="header">
                    ここにはヘッダー
                    <meta charset="utf-8">
                    <title>マイページ</title>
                    <!-- Fonts -->
                    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
                    </x-slot>
            </head>
        
        
        
    <body>
        <h1>マイページ</h1>
        <a href='/posts/create'>日記作成</a>
        
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h1 class='title'>
                       <a href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                   </h1>
                    <h3 class='spot'>{{ $post->spot }}</h3> 
                   <h3 class='schedule'>{{ $post->schedule }}</h3> 
                   <h3>本文</h3>
                   <p class='body'>{{ $post->body }}</p>
                   <img src="{{ $post->image_url }}" alt="画像が投稿されていません。" width="15%" height="15%" />
                    <img src="{{ $post->image_url2 }}" alt="画像が投稿されていません。" width="15%" height="15%" />
                </div>
            
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
    
    </x-app-layout>
</html>

