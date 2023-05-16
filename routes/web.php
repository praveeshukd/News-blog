<?php

use App\Http\Controllers\Newslettercontroller;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\Postcontroller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;
use PhpParser\Node\Stmt\TryCatch;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::post('newsletter',Newslettercontroller::class);


Route::get('/',[Postcontroller::class,'index'])->name('home');


Route::get('posts/{post:slug}',[Postcontroller::class,'show']);
Route::post('/posts/{post:slug}/comments',[PostCommentController::class, 'store']);
Route::get('/register',[RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionController::class ,'create'])->middleware('guest');
Route::post('/login',[SessionController::class, 'store'])->middleware('guest');
Route::post('/logout',[SessionController::class, 'destroy' ])->middleware('auth');

Route::get('admin/posts/create',[Postcontroller::class,'create'])->middleware('admin');
Route::post('admin/posts',[Postcontroller::class,'store'])->middleware('admin');
// 24e2e9a412