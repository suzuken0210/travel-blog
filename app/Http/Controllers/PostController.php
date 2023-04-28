<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cloudinary;
use GuzzleHttp\Client;
use App\Models\Like;
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
        // dd($post->withCount('likes')->first());
        $post = $post->withCount('likes')->where('id',$post->id)->first();
        
        // $post = $post->withCount('likes')->get();
        // $post = $post->withCount('likes');
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
        if($request->file('image')){ //画像ファイルが送られた時だけ処理が実行される
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_url' => $image_url];
        }
        
        if($request->file('image2')){ //画像ファイルが送られた時だけ処理が実行される
            $image_url2 = Cloudinary::upload($request->file('image2')->getRealPath())->getSecurePath();
            $input += ['image_url2' => $image_url2];
        }
        
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
        $posts = Post::where('user_id', $user_id)->Paginate(3);
        
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

    public function adsearch(Request $request, Post $post)
    {
         $adsearch = Place::where('address', $request->input('address') )->first();
         return view('posts/index')->with(['posts' => $adsearch->posts()->paginate(3)]);
        
    }

    
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