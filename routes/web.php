<?php

use App\Http\Controllers\approveController;
use App\Http\Controllers\catalogController;
use App\Http\Controllers\collectionsController;
use App\Http\Controllers\followController;
use App\Http\Controllers\likesController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\mainpageController;
use App\Http\Controllers\messagesController;
use App\Http\Controllers\purchaseController;
use App\Http\Controllers\redirectController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\sendController;
use App\Http\Controllers\userDataUpdateController;
use App\Http\Controllers\userLikedController;
use App\Http\Requests\paymentRequest;
use App\Models\Approved_m;
use App\Models\Bought_material;
use App\Models\Collection;
use App\Models\Collection_item;
use App\Models\Pakege;
use App\Models\Subscriptions;
use App\Models\User;
use Facade\FlareClient\View;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Support\Facades\Artisan;
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
    Artisan::call('storage:link');
    return redirect('mainpage');
});


Route::get('register', function () {
    Artisan::call('storage:link');
    if (Auth::check()) {
        return redirect('userpage/' . Auth::user()->id);
    }
    return view('register');
})->name('register');
Route::post('register', [registerController::class, 'addUser'])->name('registration');


Route::get('login', function () {
    Artisan::call('storage:link');
    if (Auth::check()) {
        return redirect('userpage/' . Auth::user()->id);
    }
    return view('login');
})->name('login');
Route::post('login', [loginController::class, 'loginUser'])->name('userLogin');


Route::get('logout', function () {
    Auth::logout();
    return redirect('mainpage');
})->name('logout');


Route::view('mainpage', 'mainPage');
Route::get('mainpage', [mainpageController::class, 'index'])->name('mainpage');


Route::Resource(
    'userpage',
    redirectController::class,
);
Route::get('userdataupdatepage', [userDataUpdateController::class, 'show'])->name('userUpdatePage');
Route::post('userdataupdate', [userDataUpdateController::class, 'updateData'])->name('userUpdateAction');
Route::get('userlikedpage', [userLikedController::class, 'show'])->name('userLikedPage');
Route::get('userfollows', function () {
    $users = Subscriptions::join('users', 'users.id', '=', 'subscriptions.followed_id')
        ->where('users_id', '=', Auth::user()->id)
        ->select('users.id', 'users.path', 'users.nikname')
        ->paginate(100);
    return view('subscriptions', compact('users'));
})->name('userFollows');
Route::get('moneydrain', [redirectController::class, 'drain'])->name('moneyDrain');


Route::get('sending', function () {
    if (Auth::check()) {
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

Route::get('liked', [likesController::class, 'like'])->name('like');

Route::get('messagesshow', [messagesController::class, 'show_messages'])->name('messages');
Route::get('messagessdelete', [messagesController::class, 'delete_messages'])->name('messagesdelete');


Route::get('follow', [followController::class, 'follow'])->name('follow');

Route::get('collections', [collectionsController::class, 'show_collections'])->name('collections');
Route::get('makecollection', [collectionsController::class, 'make'])->name('makecollection');
Route::get('addotocollection', [collectionsController::class, 'add'])->name('addotocollection');
Route::get('collection/{id}', [collectionsController::class, 'show'])->name('collection');
Route::get('removefromcollection', [collectionsController::class, 'remove'])->name('removefromcollection');
Route::get('deletecollection', [collectionsController::class, 'delete'])->name('deletecollection');

Route::get('material/{id}', function ($id) {
    $material = Approved_m::join('users', 'users.id', '=', 'approved_ms.users_id')
        ->where('approved_ms.id', '=', $id)
        ->select('users.id as user_id', 'users.nikname', 'users.path as user_path', 'approved_ms.id as material_id', 'approved_ms.path as material_path', 'approved_ms.dimentions', 'approved_ms.type', 'approved_ms.likes')
        ->paginate(2);
    if (Auth::check()) {
        $has_packeges = Pakege::where('users_id', '=', Auth::user()->id)->exists();
        $pakages = Pakege::where('users_id', '=', Auth::user()->id)->get();
    } else {
        $has_packeges = false;
        $pakages = [];
    }
    return view('materialPage', compact('material', 'has_packeges', 'pakages'));
})->name('material');

Route::get('buying', [purchaseController::class, 'buy'])->name('buying');
Route::get('boughtdownload/{id}', [purchaseController::class, 'download'])->name('boughtdownload');
Route::get('bought', function () {
    if (Auth::check()) {
        $materials = Bought_material::join('approved_ms', 'approved_ms.id', '=', 'bought_materials.approved_ms_id')
            ->join('users', 'users.id', '=', 'bought_materials.users_id')
            ->where('users.id', '=', Auth::user()->id)
            ->select('approved_ms.id', 'approved_ms.path', 'approved_ms.dimentions', 'approved_ms.type', 'approved_ms.likes')
            ->paginate(2);
        $collections = Collection::where('users_id', '=', Auth::user()->id)->get();
        return view('boughtMaterials', compact('materials', 'collections'));
    } else {
        redirect()->back();
    }
})->name('boughtPage');
Route::get('buyingpackeges', [purchaseController::class, 'buypackege'])->name('buyingpackege');

Route::get('buyingpage', function(){
    return view('packegesBuy');
})->name('buyingpage');

Route::get('payment/{id}', function($id){
    
    $title = 'Купить';
    if($id == 1){
        $ammount = '10';
    }elseif($id == 2){
        $ammount = '50';
    }elseif($id == 3){
        $ammount = '100';
    }elseif($id == 4){
        $title = 'Снять деньги';
        $ammount = '0';
    }else{
        return redirect()->back();
    }

    return view('bankPage', compact('title', 'ammount'));

})->name('payment');
Route::get('operation', function(paymentRequest $req){
    if($req->ammount == 0){
        User::where("id", Auth::user()->id)->update(["money" => 0]);
        $success_message = $req->session()->put('success_message', 'Отправка успешна!');
        return redirect()->back()->with($success_message);
    }
    $exists = Pakege::where('users_id', '=', Auth::user()->id)->exists();
        if(!$exists){
            Pakege::create(['users_id' => Auth::user()->id, 'purchases_left' => $req->ammount]);
        } else {
            $packege = Pakege::where('users_id', '=', Auth::user()->id)->get();
            $ammount = $packege[0]->purchases_left + $req->ammount;
            Pakege::where('users_id', '=', Auth::user()->id)->update(['purchases_left' => $ammount]);
        }
    $success_message = $req->session()->put('success_message', 'Отправка успешна!');
    return redirect()->back()->with($success_message);
})->name('operation');
