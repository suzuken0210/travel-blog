<?php

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
        'id'
    ];
    
    public function getPaginateByLimit(int $limit_coumt = 5)
    {
        return $this->orderBy('updated_at','DESC')->paginate($limit_coumt);
    }
}
