<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/posts/create', [PostController::class, 'create'])->name('create');
Route::post('/posts', [PostController::class, 'store']);
Route::post('/posts/like', [PostController::class, 'like'])->name('like');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('show');
Route::get('/search', [PostController::class, 'search']);
Route::get('/schedule', [PostController::class, 'schedule']);
// Route::post('/posts/geocode', [PostController::class, 'geocode'])->name('posts.geocode');
// Route::get('/mypage', [App\Http\Controllers\PostController::class, 'myPosts'])->middleware(['auth'])->name('mypage');
Route::get('/mypage', [PostController::class, 'mypage'])->name('mypage');



// Route::get('/like/{postId}',[PostController::class,'like']);
// Route::post('/like/{postId}',[PostController::class,'like'])->name('post.like');
// Route::post('/unlike/{postId}',[PostController::class,'unlike'])->name('post.unlike');



require __DIR__.'/auth.php';
