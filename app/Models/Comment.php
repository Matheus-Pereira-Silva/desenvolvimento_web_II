<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'author', 'post_id'];

    // Relacionamento com o modelo Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
