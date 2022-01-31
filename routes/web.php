<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CategoryController,
    TrainerController,
    TrainingController,
    UserController,
    IndexController
};

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

Route::get('/', [IndexController::class, 'show'])->name('index');
Route::get('/search-kategori', [IndexController::class, 'showByCategory'])->name('index_category');

Auth::routes();

Route::get('/program', [IndexController::class, 'showTraining'])->name('program');
Route::get('/program/kategori', [IndexController::class, 'showTrainingByCategory'])->name('program_category');
Route::get('/program/search', [IndexController::class, 'searchTraining'])->name('search_program');

Route::get('/pelatihan-detail/{categories}/{training}', [IndexController::class, 'showTrainingDetail'])->name('detail_training');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function(){
        if(\Auth::user()->role == 'admin'){
            return redirect()->route('show_user');
        }else{
            return redirect()->route('index');
        }
    });

    Route::middleware(['Admin'])->group(function () {
        Route::prefix('kategori')->group(function () {
            Route::get('/', [CategoryController::class, 'show'])->name('show_category');
            Route::get('/create', function () {
                return view('admin.category.create');
            })->name('create_category');

            Route::post('/store', [CategoryController::class, 'store'])->name('store_category');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit_category');
            Route::patch('/update/{id}', [CategoryController::class, 'update'])->name('update_category');
            Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete_category');

            Route::get('/search', [CategoryController::class, 'search'])->name('search_category');
        });

        Route::prefix('pengguna')->group(function () {
            Route::get('/', [UserController::class, 'show'])->name('show_user');
            Route::get('/create', [UserController::class, 'create'])->name('create_user');

            Route::post('/store', [UserController::class, 'store'])->name('store_user');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit_user');
            Route::patch('/update/{id}', [UserController::class, 'update'])->name('update_user');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete_user');
            Route::get('/search', [UserController::class, 'search'])->name('search_user');
        });

        Route::prefix('pengajar')->group(function () {
            Route::get('/', [TrainerController::class, 'show'])->name('show_trainer');
            Route::get('/create', function () {
                return view('admin.trainer.create');
            })->name('create_trainer');

            Route::post('/store', [TrainerController::class, 'store'])->name('store_trainer');
            Route::get('/edit/{id}', [TrainerController::class, 'edit'])->name('edit_trainer');
            Route::patch('/update/{id}', [TrainerController::class, 'update'])->name('update_trainer');
            Route::delete('/delete/{id}', [TrainerController::class, 'destroy'])->name('delete_trainer');

            Route::get('/search', [TrainerController::class, 'search'])->name('search_trainer');
        });

        Route::prefix('pelatihan')->group(function () {
            Route::get('/', [TrainingController::class, 'show'])->name('show_training');
            Route::get('/create', [TrainingController::class, 'create'])->name('create_training');

            Route::post('/store', [TrainingController::class, 'store'])->name('store_training');
            Route::get('/edit/{id}', [TrainingController::class, 'edit'])->name('edit_training');
            Route::patch('/update/{id}', [TrainingController::class, 'update'])->name('update_training');
            Route::delete('/delete/{id}', [TrainingController::class, 'destroy'])->name('delete_training');

            Route::get('/search', [TrainingController::class, 'search'])->name('search_training');
        });

        Route::get('/laporan', function () {
            return view('admin.laporan.show', ["active" => "report"]);
        })->name('laporan_peserta');

        Route::get('/laporan/peserta', [UserController::class, 'showuserandtraining'])->name('show_report');
        Route::get('/laporan/pdf', [UserController::class, 'createPDF']);
        Route::get('/laporan/pdff', function() {
            return view('admin.laporan.laporanbaru');
        });

    });
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
