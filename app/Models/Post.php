<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['tilte', 'author', 'slug', 'body'];

    // eloquent relationship "BelongsTo"
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

