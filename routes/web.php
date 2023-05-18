<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminPostController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\PostCommentsController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('newsletter', function () {

    request()->validate(['email'=> 'required|email']);
    $mailchimp = new ApiClient();
    
    
    
    try{
        (new Newsletter())->subscribe(request('email'));

    }catch ( Exception $e){
       
        ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter list.'
        ]);
    }
    
    
    return redirect('/')->with('success', 'You are now signed up for our newsletter');
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');

Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');

Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');

Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');

Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');

Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');

Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');
// Route::get('categories/{category:slug}', function (Category $category) {
//     // Find a category by its id and return its contents

//     return view('posts', [
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::orderBy('name')->get(),
//     ]);
// })->name('categories');

// Route::get('author/{author:username}', function (User $author) {
//     // Find an author by its id and return its posts

//     return view('posts', [
//         'posts' => $author->posts,
//         'categories' => Category::orderBy('name')->get(),
//     ]);
// });