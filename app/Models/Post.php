<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body', 'category_id', 'slug'];

    protected $with = ['category', 'author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(
                fn($query) =>
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%')
            );
        });
        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query
                ->whereExists(fn($query) =>
                    $query->from('categories')
                        ->whereColumn('categories.id', 'posts.category_id')
                        ->where('categories.slug', $category));
        });
        // $query->when($filters['author'] ?? false, function ($query, $author) {
        //     $query
        //         ->whereExists(fn($query) =>
        //             $query->from('author') 
        //                   ->where('username', $author));
        // });

    }

}