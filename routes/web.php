<?php

use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PinController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\PasswordController;

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

Route::get('/', function () {
    return view('page.index');
});
Route::get('/register', [AuthController::class, 'register']);

Route::post('/registered', [AuthController::class, 'registered']);
Route::get('/login', function () {
    return view('page.login');
});

Route::post('/auth', [AuthController::class, 'auth']);

Route::middleware('auth')->group(function(){
    Route::get('/explore', function () {
        return view('page.explore');
    });
    Route::get('/getDataExplore', [ExploreController::class, 'getdata']);

    Route::post('/likefotos', [ExploreController::class, 'likefotos']);
    Route::get('/detail/{id}', [ExploreController::class, 'detail']);
    Route::get('/detail/{id}/getdatadetail', [ExploreController::class, 'getdatadetail']);

    Route::get('/detail/getComment/{id}', [ExploreController::class, 'ambildatakomentar']);
    Route::get('/upload', [UploadController::class, 'index']);
    Route::post('/detail/kirimkomentar', [ExploreController::class, 'kirimkomentar']);

    Route::get('/profilesaya', function () {
         return view('page.profilesaya');
    });

    Route::get('/dataprofile/', [ProfilController::class, 'getdataprofile']);
    Route::get('/getdataprofile/', [ProfilController::class, 'getdata']);

    Route::get('/edit-profile/{id}', [ProfilController::class, 'editProfile']);
    Route::post('/profile/update/{id}', [ProfilController::class, 'update']);


    Route::get('/other-pin/{id}', function () {
        return view('page.other-pin');
    });
    Route::get('/other-pin/getDataPin/{id}',[PinController::class, 'getdatapin']);
    Route::get('getdataotherpinexplore',[PinController::class, 'getdata']);

    Route::get('/edit-postingan', function () {
    return view('page.edit-postingan');
    });

    Route::get('/change-password', function () {
        return view('page.change-password');
    });
    Route::get('/ubahpassword', [PasswordController::class, 'ubahpassword']);
    Route::post('/update-password', [PasswordController::class, 'ubahpassword']);


    Route::get('/album', [AlbumController::class, 'index']);
    Route::post('/buatalbum', [AlbumController::class, 'storeAlbum']);
    Route::get('/detail-album/{id}', [AlbumController::class, 'detail']);

    Route::get('/buatalbum', function () {
        return view('page.buatalbum');
    });
    
    Route::post('/upload/store', [UploadController::class, 'storeFoto']);

    Route::post('/edit-postingan/{id}', [FotoController::class, 'editpostingan']);
    Route::get('/hapus/{id}', [FotoController::class, 'hapuspostingan']);
    Route::get('/hapusalbum/{id}', [FotoController::class, 'hapusalbum']);
    Route::get('/edit/{id}', [FotoController::class, 'editfoto']);

    Route::get('/logout', [AuthController::class, 'logout']);
});
Route::post('/auth', [AuthController::class, 'auth']);







