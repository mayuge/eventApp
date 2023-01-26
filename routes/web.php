<?php
use App\Http\Controllers\MyController;
use App\Http\Controllers\ProfileController;
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
    URL::forceScheme('https');
    
    Route::get('/', [MyController::class, 'index'])->name('index');

    Route::group(['middleware'=>['auth']], function(){
    //ログインした後の画面はここに入れる
    Route::get('/view', [MyController::class, 'view'])->name('view')->middleware('auth');
    // Route::get('{event}/view', [MyController::class, 'view'])->name('view')->middleware('auth');
     
    Route::get('/create', [MyController::class, 'create'])->name('create')->middleware('auth');
    Route::get('/createBlog', [MyController::class, 'createBlog'])->name('createBlog')->middleware('auth');
    
    
    
    Route::get('{event}/join', [MyController::class, 'join'])->name('join')->middleware('auth');
    Route::get('{event}/eventEdit', [MyController::class, 'eventEdit'])->name('eventEdit')->middleware('auth');
    
    Route::put('/update/{event}', [MyController::class, 'update'])->name('update')->middleware('auth');
    
    Route::post('/store', [MyController::class, 'store'])->name('store')->middleware('auth');
    Route::post('/storeBlog', [MyController::class, 'storeBlog'])->name('storeBlog')->middleware('auth');
    Route::post('/storeComment/{blog}', [MyController::class, 'storeComment'])->name('storeComment')->middleware('auth');
    
    Route::post('/candidate', [MyController::class, 'candidate'])->name('candidate')->middleware('auth');
    
    Route::get('{event}/delete', [MyController::class, 'delete'])->name('delete')->middleware('auth');
    
    Route::get('{event_user}/joinDelete', [MyController::class, 'joinDelete'])->name('joinDelete')->middleware('auth');
    Route::get('{blog}/blogDelete', [MyController::class, 'blogDelete'])->name('blogDelete')->middleware('auth');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
