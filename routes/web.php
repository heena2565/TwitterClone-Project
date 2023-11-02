<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TwitterController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/', function () {
//     return view('index');
// });
Auth::routes();
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

//Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/create',  [App\Http\Controllers\HomeController::class, 'create'])->name('home');
    Route::post('/store',  [App\Http\Controllers\HomeController::class, 'store'])->name('store');


    Route::post('comment/save',  [App\Http\Controllers\CommentController::class, 'save'])->name('comment.save');
    Route::post('like/save',  [App\Http\Controllers\LikeController::class, 'save'])->name('like.save');

    Route::post('profile/update',  [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
//});
