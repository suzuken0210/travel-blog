<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cloudinary;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(3)]); 
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts/create');
    }
    
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url];
        $post->fill($input)->save();
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
    
}