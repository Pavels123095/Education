<?php

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

Route::get('verstka/', function () {
    return view('html');
});

// profiles routes
Route::middleware(['role:student||teacher'])->prefix('profile')->group(function () {

    Route::resource('profile', App\Http\Controllers\ProfileController::class);
    Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profiles');

    Route::get('/tasks', [App\Http\Controllers\ProfileController::class, 'tasks'])->name('tasks');
    Route::get('/lessons', [App\Http\Controllers\ProfileController::class, 'lessons'])->name('lessons');
    Route::get('/filesystem', function () {
        return view('admins.filesystem');
    })->name('filesystem');

    Route::middleware(['role:teacher'])->group(function () {
        Route::resource('lessons', App\Http\Controllers\Admin\LessonsController::class);
        Route::resource('groups', App\Http\Controllers\Admin\GroupController::class);
        Route::resource('task', App\Http\Controllers\Admin\TaskController::class);
    });

});

// adminpanel routes
Route::middleware(['role:admin'])->prefix('adminpanel')->group(function () {
    
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('adminpanel');
    Route::get('/students', [App\Http\Controllers\Admin\AdminController::class, 'students'])->name('students');
    Route::get('/teachers', [App\Http\Controllers\Admin\AdminController::class, 'teachers'])->name('teachers');
    Route::get('/filesystem', function () {
        return view('admins.filesystem');
    })->name('filesystem');

    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('articles', App\Http\Controllers\Admin\ArticlesController::class);
    Route::resource('pages', App\Http\Controllers\Admin\PagesController::class);
    Route::resource('lessons', App\Http\Controllers\Admin\LessonsController::class);
    Route::resource('teachers', App\Http\Controllers\Admin\TeacherController::class);
    Route::resource('groups', App\Http\Controllers\Admin\GroupController::class);
    Route::resource('options', App\Http\Controllers\Admin\OptionController::class);
    Route::resource('task', App\Http\Controllers\Admin\TaskController::class);
    Route::resource('banner', App\Http\Controllers\Admin\Option\BannerController::class);
    Route::resource('menu', App\Http\Controllers\Admin\Option\MenuController::class);

});

//route this view pages front-end
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/articles', [App\Http\Controllers\HomeController::class, 'articles'])->name('articles');
Route::get('/pages/{alias}', [App\Http\Controllers\HomeController::class, 'page'])->name('page');
Route::get('/articles/{alias}', [App\Http\Controllers\HomeController::class, 'article_show'])->name('article_show');

Auth::routes();