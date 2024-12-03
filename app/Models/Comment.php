<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'post_id', 'author']; // Inclui 'author'


    // Relacionamento com o modelo Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relacionamento com o modelo User (autor do comentário)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
