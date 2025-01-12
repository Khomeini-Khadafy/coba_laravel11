<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['tilte', 'author', 'slug', 'body'];

    // noted * jika mau simple menggunakan Eager Load secara default
    protected $with = ['author', 'category'];

    // eloquent relationship "BelongsTo" untuk author
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);

    }

    // untuk memanggil filter search 'local scope'
    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when
            ($filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );

        // untuk category
        $query->when
            ($filters['category'] ?? false,
            fn($query, $category) =>
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when
            ($filters['author'] ?? false,
            fn($query, $author) =>
            $query->whereHas('author', fn($query) => $query->where('username', $author))
        );
    }
}
