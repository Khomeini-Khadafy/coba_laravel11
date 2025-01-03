<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['tilte', 'author', 'slug', 'body'];
    
    // noted * jika mau simple menggunakan Eager Load secara default
    // *protected $with = ['author', 'category'];

    // eloquent relationship "BelongsTo" untuk author
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
        
    }
}

