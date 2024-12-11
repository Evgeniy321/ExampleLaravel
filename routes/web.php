<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\MyPlaceController;
use App\Http\Middleware\AdminPanelMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('home');

//can add oneMethod controllers with Route::group(['Post', function(){<place your controllers here>})
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware(AdminPanelMiddleware::class);
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware(AdminPanelMiddleware::class);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware(AdminPanelMiddleware::class);

Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');
Route::get('/tags', [TagController::class, 'index'])->name('tags.index');

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
