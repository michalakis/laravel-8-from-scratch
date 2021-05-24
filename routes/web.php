<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/', function(){
    \Illuminate\Support\Facades\DB::listen(function ($query) {
        logger($query->sql, $query->bindings);
    });
    return view('posts', [
        'posts' => Post::with('category')->get()
    ]);

});

Route::get('posts/{post}', function(Post $post) {

    return view('post',[
        'post' => $post
    ]);

});

Route::get('categories/{category}', function(Category $category) {
    return view('category', [
        'posts' => Post::where('category_id', $category->id)->get()
    ]);
});
