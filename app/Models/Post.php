<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id', 'id');
    }
    public function authors()
    {
        return $this->belongsTo(Authors::class, 'author_id', 'id');
    }
}
