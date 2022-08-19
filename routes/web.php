<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ListsController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\Notifications\UserNotificationsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfilesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/tweets', TweetsController::class)->name('home');

    Route::post('/tweets', [TweetsController::class, 'store'])->name('create_tweet');
    Route::get('/tweets/{tweet:id}', [TweetsController::class, 'show'])->name('tweet');

    Route::post('/tweets/{tweet:id}/like', [LikeController::class, 'store'])->name('like');
    Route::post('/tweets/{tweet:id}/comment', [CommentsController::class, 'store'])->name('comment');

    Route::get('/profiles/{user:username}', [ProfilesController::class, 'show'])->name('profile');
    Route::get('/profiles/{user:username}/edit', [ProfilesController::class, 'edit'])->can('edit_profile', 'user')->name('edit_profile');
    Route::patch('/profiles/{user:username}', [ProfilesController::class, 'update'])->can('edit_profile', 'user')->name('update_profile');
    Route::post('/profiles/{user:username}/cover', [ProfilesController::class, 'upload'])->can('edit_profile', 'user')->name('upload_cover');
    Route::post('/profiles/{user:username}/follow', [FollowsController::class, 'store'])->can('follow', 'user');

    Route::get('/explore', ExploreController::class)->name('explore');
    Route::get('/notifications', [UserNotificationsController::class, 'show'])->name('notifications');

    Route::get('/{user:username}/lists/followers', [ListsController::class, 'list_followers'])->name('followers');
    Route::get('/{user:username}/lists/followings', [ListsController::class, 'list_followings'])->name('followings');
});

// Route::post('upload', [UploadController::class, 'store']);

require __DIR__ . '/auth.php';
