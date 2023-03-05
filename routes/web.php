<?php

use App\Http\Controllers\approveController;
use App\Http\Controllers\catalogController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\mainpageController;
use App\Http\Controllers\redirectController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\sendController;
use Facade\FlareClient\View;
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
    return view('welcome');
});


Route::get('register',function (){
    if(Auth::check()){
        return redirect('userpage/'.Auth::user()->id);
    }
    return view('register');
})->name('register');
Route::post('register', [registerController::class, 'addUser'])->name('registration');


Route::get('login',function (){
    if(Auth::check()){
        return redirect('userpage/'.Auth::user()->id);
    }
    return view('login');
})->name('login');
Route::post('login', [loginController::class, 'loginUser'])->name('userLogin');


Route::get('logout', function(){
    Auth::logout();
    return redirect('mainpage');
})->name('logout');


Route::view('mainpage', 'mainPage');
Route::get('mainpage', [mainpageController::class, 'index'])->name('mainpage');


Route::Resources([
    'userpage' => redirectController::class,
]);


Route::get('sending', function(){
    if(Auth::check()){
        return view('sendMaterialPage');
    }
    return redirect('mainpage');
})->name('sendMaterialPage');
Route::post('sending', [sendController::class, 'send'])->name('sendMaterial');


Route::get('approval', [approveController::class, 'show'])->name('approvalpage');
Route::get('approvaldelete/{id}', [approveController::class, 'delete'])->name('approvaldelete');
Route::get('approvaldownload/{id}', [approveController::class, 'download'])->name('approvaldownload');
Route::post('approved', [approveController::class, 'send'])->name('approved');


Route::view('catalog', 'catalog');
Route::get('catalog', [catalogController::class, 'index'])->name('catalog');
