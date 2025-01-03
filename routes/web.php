<?php

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Khomeini Khadafy', 'title' => 'About']);
});

Route::get('/posts', function () {
    // membuat Eager Loading menggunkan with | Post::with('author')->latest()->get();
    $post = Post::with(['author', 'category'])->latest()->get();
    return view('posts', ['title' => 'Blog', 'posts' => $post]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    // Lazy loading
    $posts = $user->posts->load('category', 'author');

    return view('posts', ['title' => count($posts) . ' Article by ' .
        $user->name, 'posts' => $posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    // Lazy loading
    $posts = $category->posts->load('category', 'author');
    
    return view('posts', ['title' => 'Articles in: ' .
        $category->name, 'posts' => $posts]);
});



Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
