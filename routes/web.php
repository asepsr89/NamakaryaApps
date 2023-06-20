<?php

use App\Http\Controllers\AnalisController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DebiturController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SlikController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    if (Auth::check()) {
        return redirect('home');
    }else{
        return view('auth.login');
    }
});

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

// Route::get('/home', function () {
//     return view('home');
//     })->middleware(['auth', 'verified'])->name('home');

Auth::routes();

Route::middleware('auth')->group(function(){
    // Route::get('index',[HomeController::class])->middleware(['auth','verified'])->name('home');
    Route::resource('users',UsersController::class);
    Route::resource('cabang',CabangController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('menu',NavigationController::class);
    Route::resource('permission',PermissionController::class);
    Route::resource('mitra',MitraController::class);
    Route::resource('jabatan',JabatanController::class);
    Route::resource('debitur',DebiturController::class);
    Route::get('debitur/{id}/editdata',[DebiturController::class,'editdata']);
    Route::get('debitur/{id}/viewdata',[DebiturController::class,'viewdata']);
    Route::get('debitur/{id}/edit',[DebiturController::class,'edit'])->name('debitur.edit');
    Route::post('debitur/media',[DebiturController::class, 'storeMedia'])->name('debitur.storeMedia');
    Route::put('pengajuanslik/{id}', [DebiturController::class, 'pengajuanslik'])->name('debitur.pengajuanslik');
    Route::get('debitur/{id}/kirim', [DebiturController::class, 'kirim']);
    Route::get('slik', [SlikController::class,'index'])->name('slik.index');
    Route::get('slik/dataslik', [SlikController::class,'dataslik'])->name('slik.dataslik');
    Route::get('slik/allslik', [SlikController::class,'allslik'])->name('slik.allslik');
    Route::get('slik/{id}/cekslik', [SlikController::class,'cekslik']);
    Route::put('slik/{id}/', [SlikController::class,'update'])->name('slik.update');
    Route::get('fasilitas/{id}/edit',[FasilitasController::class,'edit']);
    Route::post('fasilitas',[FasilitasController::class,'store'])->name('fasilitas.store');
    Route::get('fasilitas',[FasilitasController::class,'index'])->name('fasilitas.index');
    Route::get('fasilitas/{id}/otorisasi',[FasilitasController::class,'otorisasi']);
    Route::get('fasilitas/{id}/kirimpusat',[FasilitasController::class,'kirimpusat']);
    Route::get('fasilitas/{id}/cekFasilitas',[FasilitasController::class,'checkFasilitas']);
    Route::get('fasilitas/{id}/cekFasilitasmitra',[FasilitasController::class,'checkFasilitasmitra']);
    Route::get('fasilitas/{id}/download',[FasilitasController::class,'download']);
    Route::get('fasilitas/{id}/approve',[FasilitasController::class,'approve'])->name('fasilitas.approve');
    Route::get('fasilitas/{id}/approvemitra',[FasilitasController::class,'approvemitra'])->name('fasilitas.approvemitra');
    Route::get('fasilitas/{id}/reject',[FasilitasController::class,'reject'])->name('fasilitas.reject');
    Route::get('fasilitas/{id}/kirimmitra',[FasilitasController::class,'kirimmitra'])->name('fasilitas.kirimmitra');
    Route::put('fasilitas/{id}/revisi',[FasilitasController::class,'revisi'])->name('fasilitas.revisi');
    Route::get('fasilitas/{id}/revisifasilitas',[FasilitasController::class,'revisifasilitas'])->name('fasilitas.revisifasilitas');
    Route::get('fasilitas/{id}/revisifasilitasmitra',[FasilitasController::class,'revisifasilitasmitra'])->name('fasilitas.revisifasilitasmitra');
    Route::put('fasilitas/{id}/revisimitra',[FasilitasController::class,'revisimitra'])->name('fasilitas.revisimitra');
    Route::put('fasilitas/{id}/updatemitra',[FasilitasController::class,'updatemitra'])->name('fasilitas.updatemitra');
    Route::put('fasilitas/{id}',[FasilitasController::class,'update'])->name('fasilitas.update');
    Route::post('analis/getdata',[AnalisController::class,'getdata'])->name('analis.getdata');
    Route::get('analis',[AnalisController::class,'index'])->name('analis.index');
    Route::post('analis',[AnalisController::class,'store'])->name('analis.store');
    Route::get('analis/dtanalis',[AnalisController::class,'dtanalis'])->name('analis.dtanalis');
    Route::get('analis/{id}/mppanalis',[AnalisController::class,'mppanalis'])->name('analis.mppanalis');
});
