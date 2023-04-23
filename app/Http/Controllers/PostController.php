<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cloudinary;
use GuzzleHttp\Client;
use App\Models\User;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    {
        // dd($post);
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(3)]); 
    }
    
    public function show(Post $post)
    {
        // dd($post);
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts/create');
        
    
        // return view('posts.create', [
        //     'post' => new Post(),
        // ]);
    
    }
    
    public function store(Request $request, Post $post)
    {
        $post->user_id = \Auth::id();
        $input = $request['post'];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url];
        $post->fill($input)->save();
        
        
        // dd($request['address']);
        for($i=0; $i<3; $i++){
            $place = new Place();
            // dd($place->where('address', $request['address'][(string)$i])->exists());
            $place->address = $request['address'][(string)$i];
            // dd(is_null($place->address));
            
            if (!is_null($place->address)){
                if(!$place->where('address', $request['address'][(string)$i])->exists()){
                    $place->save();
                }
                
                $post->places()->attach($place->where('address', $request['address'][(string)$i])->first()->id); 
            }
            
        }
        
        return redirect('/posts/' . $post->id);
        
        
        
    }
    
    public function search(Request $request, Post $post)
    {
         $search = $post->where('spot', $request->input('spot') )->paginate(3);
         return view('posts/index')->with(['posts' => $search]);
        
    }
    
    public function schedule(Request $request, Post $post)
    {
        // $schedule = $post->where('schedule', $request->input('schedule') )->paginate(3);
        $from = $request->input('from');
        $until = $request->input('until');
        $schedule = $post->whereBetween("schedule", [$from, $until])->paginate(3);
        return view('posts/index')->with(['posts' => $schedule, 'from' => $from , 'until' => $until]); 
        
    }
    
    
    public function mypage(Post $post)
    {
        $user_id = Auth()->id();
        $posts = Post::where('user_id', $user_id)->get();
        
        // dd($user);
        return view('posts/mypage', ['posts' => $posts]);
    }
    
    public function adsearch(Request $request, Post $post)
    {
         $adsearch = Place::where('address', $request->input('address') )->first();
         return view('posts/index')->with(['posts' => $adsearch->posts()->paginate(3)]);
        
    }
    
}