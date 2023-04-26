<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cloudinary;
use GuzzleHttp\Client;
use App\Models\Like;
use App\Models\User;
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
    
    public function like(Request $request)
    {
        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $post_id = $request->post_id; //2.投稿idの取得
        $already_liked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first(); //3.

        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $like = new Like; //4.Likeクラスのインスタンスを作成
            $like->post_id = $post_id; //Likeインスタンスにpost_id,user_idをセット
            $like->user_id = $user_id;
            $like->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        }
        //5.この投稿の最新の総いいね数を取得
        $post_likes_count = Post::withCount('likes')->findOrFail($post_id)->likes_count;
        $param = [
            'post_likes_count' => $post_likes_count,
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す
    }
    
    // // only()の引数内のメソッドはログイン時のみ有効
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    // }
    
    /*
    public function like(Post $postid, Request $request)
    {
        // dd($postid);
        Like::create([
          'post_id' => $postid,
          'user_id' => Auth::id(),
        ]);
    
        session()->flash('success', 'You Liked the Reply.');
    
        return redirect()->back();
    }
    
    public function unlike(Post $postid, Request $request)
    {
        $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
    
        session()->flash('success', 'You Unliked the Reply.');
    
        return redirect()->back();
    }*/
    
}