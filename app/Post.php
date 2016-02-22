<?php

namespace App;

use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';

	protected $fillable = [
        'title',
        'sub_title',
        'content',
        'is_feature',
        'page_view',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
