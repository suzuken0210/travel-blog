<?php

// namespace App\Models\Places;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
    public function places()
    {
        return $this->belongsToMany(Place::class);
    }
}
