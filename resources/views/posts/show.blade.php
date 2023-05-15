<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-app-layout>
    
   <body class="antialiased">
       <h1 class='title flex justify-center items-center'>
           <font size="7">
           {{ $post->title }}
           </font>
       </h1>
       
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
       
       <div class='content'>
            <div class='flex'>
               <div class='w-3/4 border border-gray-300 p-4'>
                   <h3><font size="5">旅行日</font></h3>
                   <h3 class='schedule border border-gray-300 p-4'>{{ $post->schedule }}</h3> 
                   <h3><font size="5">お気に入り観光地</font></h3>
                   <h3 class='spot border border-gray-300 p-4'>{{ $post->spot }}</h3> 
                   <h3><font size="5">訪ねた全ての観光地</font></h3>
                        @foreach($post->places as $place)   
                        {{ $place->address }}
                        @endforeach
               </div>
               
                @if($post->image_url)
                <div class='w-3/4'>
                    <h3>お気に入り観光地の写真</h3>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。"width="50%" height="50%" />
                </div>
                @endif
            </div>
        
            <h3><font size="6">旅行日記</font></h3>
                 <p class='body'>{{ $post->body }}</p>
        
	        <div id="map" style="height:500px"></div>
	        <script>const point = @json($post->spot)</script>
	        
	    </div>  
       
       <div class='footer'>
           <a href="/">記事一覧へ戻る</a>
       </div>
    </body>
</x-app-layout>
</html>
