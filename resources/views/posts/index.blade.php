<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <x-app-layout>
        
        
        
        
    <body>
        <img src='{{ asset('storage/tophead.png') }}'>
        <!--<a href='/posts/create'>日記作成はここから！</a>-->
        
        
        <div class='search flex flex-row gap-4 justify-center items-center'>
            <div class=''>
                <form method="get" action="/search">
                  <input type="text" name="spot" placeholder="お気に入り観光地">
                  <input type="submit" value="検索">
                </form>
            </div>
            
            <form method="get" action="/adsearch">
              <input type="text" name="address" placeholder="観光地">
              <input type="submit" value="検索">
            </form>
             
            <form action="/schedule" method="get">
            　<label for="from">from:</label>
            　<input type="date" name="from" id="from" required>
            　<label for="until">until:</label>
            　<input type="date" name="until" id="until" required>
            　<button type="submit">Search</button>
            </form>
        </div>    
          
        
        <div class='posts'>
            <div class="flex flex-row gap-4 ">
                @foreach ($posts as $post)
                    <div class='post text-center border border-gray-400 p-4 rounded-lg shadow-md '>
                        <a href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                        <a href="/posts/{{ $post->id }}"><h3 class='schedule'>{{ $post->schedule }}</h3></a>
                        <a href="/posts/{{ $post->id }}"><h3 class='spot'>{{ $post->spot }}</h3></a>
                        <img src="{{ $post->image_url }}" alt="画像が投稿されていません。"width="300px" height="200px"/>
                        
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="flex justify-center">
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
        </div>
        
    </body>
    
    </x-app-layout>
</html>

