<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id']; // Alterei 'author' para 'user_id'

    // Relacionamento com o modelo Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relacionamento com o modelo User (autor do post)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

