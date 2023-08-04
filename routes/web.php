<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SneakersController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Brands\CreateBrand;
use App\Livewire\Admin\Brands\EditBrand;
use Illuminate\Support\Facades\Route;

use App\Livewire\Admin\Brands\IndexBrand;
use App\Livewire\Admin\IndexAdmin;
use App\Livewire\Admin\Sneakers\CreateSneaker;
use App\Livewire\Admin\Sneakers\EditSneaker;
use App\Livewire\Admin\Sneakers\IndexSneaker;
use App\Livewire\App\Index;
use App\Livewire\App\SneakerView;
use App\Livewire\App\Wishlist;

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

Route::get('/', Index::class);
Route::get('/sneaker/{id}/slug', SneakerView::class);
Route::get('/wishlist', Wishlist::class);





//ADMIN

Route::get('/admin', IndexAdmin::class)->name('admin.index');

Route::get('/admin/sneakers', IndexSneaker::class);
Route::get('/admin/sneakers/create', CreateSneaker::class);
Route::get('/admin/sneakers/edit/{id}', EditSneaker::class);

Route::get('/admin/brands', IndexBrand::class);
Route::get('/admin/brands/create', CreateBrand::class);
Route::get('/admin/brands/edit/{id}', EditBrand::class);




Route::get('/welcome', function () {
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

require __DIR__ . '/auth.php';
