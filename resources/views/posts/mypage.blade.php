<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <x-app-layout>
        
        
        
        
    <body>
        <img src='{{ asset('storage/mypage.png') }}'>
        <!--<a href='/posts/create'>日記作成はここから</a>-->
        
        <div class='posts'>
            <div class="flex flex-row gap-4 ">
                @foreach ($posts as $post)
                    <div class='post text-center border border-gray-400 p-4 rounded-lg shadow-md'>
                       <a href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                       <a href="/posts/{{ $post->id }}"><h3 class='schedule'>{{ $post->schedule }}</h3></a>
                       <a href="/posts/{{ $post->id }}"><h3 class='spot'>{{ $post->spot }}</h3></a>
                       <img src="{{ $post->image_url }}" alt="画像が投稿されていません。" width="300px" height="200px" />
                    </div>
                @endforeach
        </div>
        
        <div class="flex justify-center">
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
        </div>
        
    </body>
    
    </x-app-layout>
</html>

