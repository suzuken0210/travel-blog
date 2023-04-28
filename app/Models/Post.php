<?php

// namespace App\Models\Places;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'title',
        'spot',
        'body',
        'date',
        'schedule',
        'image_url', 
        'image_url2',
        'user_id',
        'address'
    ];
    
    public function getPaginateByLimit(int $limit_coumt = 5)
    {
        return $this->orderBy('updated_at','DESC')->paginate($limit_coumt);

    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

     public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('post_id', $this->id)->first() !==null;
    }

    public function places()
    {
        return $this->belongsToMany(Place::class);
    }
}

