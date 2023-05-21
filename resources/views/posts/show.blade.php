<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-app-layout>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>travel-blog</title>

        <!-- Fonts --> 
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
       
       @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        
       
    </head>
   <body class="antialiased">
       <h1 class='title'>
           {{ $post->title }}
       </h1>
       <div class='content'>
           <div class='content_post'>
               <h3 class='spot'>{{ $post->spot }}</h3> 
               
               <h3 class='schedule'>{{ $post->schedule }}</h3> 
               <h3>ほんぶん</h3>
               <p class='body'>{{ $post->body }}</p>
           </div>
            @if($post->image_url)
            <div>
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。"width="10%" height="10%" />
            </div>
            @endif
            
            @if($post->image_url2)
            <div>
                <img src="{{ $post->image_url2 }}" alt="画像が読み込めません。"width="10%" height="10%" />
            </div>
            @endif
            
	        
	        <div id="map" style="height:500px"></div>
	        <script>const point = @json($post->spot)</script>
            <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyC96c6lhvoTpYKKm-hU2Ug89Lkvz0lipLQ&callback=initgeocoder" async defer></script>
            </script>
            
            <script src="{{ asset('/js/map.js')}}">
                
            </script>
             

            @auth
                <!-- Post.phpに作ったisLikedByメソッドをここで使用 -->
                @if (!$post->isLikedBy(Auth::user()))
                    <span class="likes">
                        <i class="fas fa-heart like-toggle" data-post-id="{{ $post->id }}"></i>
                    <span class="like-counter">{{$post->likes_count}}</span>
                    </span><!-- /.likes -->
                @else
                    <span class="likes">
                        <i class="fas fa-heart heart like-toggle liked" data-post-id="{{ $post->id }}"></i>
                    <span class="like-counter">{{$post->likes_count}}</span>
                    </span><!-- /.likes -->
                @endif
            @endauth
            

    
            @foreach($post->places as $place)   
            {{ $place->address }}
            @endforeach
	        
       </div>
       <div class='footer'>
           <a href="/">記事一覧へ戻る</a>
       </div>
    </body>
</x-app-layout>
</html>
