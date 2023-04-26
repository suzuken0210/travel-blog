<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use app\Http\Controllsers\Like;

class Like extends Model
{
    use HasFactory;
    
    // 配列内の要素を書き込み可能にする
  protected $fillable = ['post_id','user_id'];

  public function post()
  {
    return $this->belongsTo(Post::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  
  // 「いいね」が既にされているかどうかを確認するための関数
    public static function like_exist($user_id, $post_id)
    {
        return Like::where('user_id', $user_id)->where('post_id', $post_id)->exists();
    }
}
