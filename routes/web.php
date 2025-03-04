<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// personal-site.com => welcome
// personal-site.com/contacto => contact
// personal-site.com/blog => blog
// personal-site.com/nosotros => about

Route::view('/', 'welcome')->name('home');
Route::view('contacto', 'contact')->name('contact');

//Route::get('blog', [PostController::class, 'index'])->name('posts.index');
//Route::get('/blog/create', [PostController::class, 'create'])->name('posts.create');
//Route::post('/blog', [PostController::class, 'store'])->name('posts.store');
//Route::get('blog/{post}', [PostController::class, 'show'])->name('posts.show');  //{} -> Parametros de ruta
//Route::get('blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
//Route::patch('blog/{post}', [PostController::class, 'update'])->name('posts.update');  //{} -> Parametros de ruta
//Route::delete('blog/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


//Lo mismo que las lineas anteriores sin escribir linea por linea
Route::resource('blog', PostController::class, [
    'names' => 'posts',
    'parameters' => [
        'blog' => 'post',
    ]
]);


//Route::view('nosotros', 'about');
Route::view('/nosotros', 'about')->name('about');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
//->middleware(['auth', 'verified'])->name('dashboard'); El verified en caso de querer verificar el correo

Route::middleware(['auth', 'password.confirm'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
