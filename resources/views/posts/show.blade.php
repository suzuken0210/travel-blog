<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-app-layout>
    <head>
        <meta charset="utf-8">
        <title>travel-blog</title>

        <!-- Fonts --> 
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
       
    </head>
   <body class="antialiased">
       <h1 class='title'>
           {{ $post->title }}
       </h1>
       <div class='content'>
           <div class='content_post'>
               <h3 class='spot'>{{ $post->spot }}</h3> 
               <h3 class='schedule'>{{ $post->schedule }}</h3> 
               <h3>本文</h3>
               <p class='body'>{{ $post->body }}</p>
           </div>
           <div>
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。" width="10%" height="10%" />
            </div>
            
	        
	        <div id="map" style="height:500px"></div>
	        <script>const point = @json($post->spot)</script>
            <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyC96c6lhvoTpYKKm-hU2Ug89Lkvz0lipLQ&callback=initgeocoder" async defer></script>
            </script>
            
            <script src="{{ asset('/js/map.js')}}">
                
            </script>
             
    
	        

	        
       </div>
       <div class='footer'>
           <a href="/">戻る</a>
       </div>
    </body>
</x-app-layout>
</html>
