<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
//use App\Http\Controllers\DemoResourceController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegistrationController;
use App\Models\Customer;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ConController;
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
Route::get('/dbcon',[ConController::class, 'index']);

Route::get('/oneToOne', [CustomerController::class, 'onetoone']);


Route::get('/demo1', [DemoController::class,'index']);
//Route::get('/demo1','DemoControlle@index');

//Route::resource('/demo12', DemoResourceController::class);
Route::resource('/photo', PhotoController::class);
//Route::POST('/photos', PhotoController::class);

/*
Route::get("/myDemoForm",function(){
    return view('form');
});
*/
Route::get('/',function(){
    //return redirect('/myForm');
    return view('index');
});
Route::get('/newHTMLForm', function(){
        return view('NewHtmlForm');
    });

Route::get('/myForm', [RegistrationController::class, 'index']);
Route::post('/fetchFormData',[RegistrationController::class, 'fetchData']);

//// Add record
Route::get('/customerForm',[CustomerController::class,'index']);
Route::post('/customerForm',[CustomerController::class, 'fetchCutomerData']); ///fetchCustomerFormData

//// Ajax  ====
//Route::view('/CustomerAjaxForm', 'CustomerAjax');
Route::get('/CustomerAjaxForm',[CustomerController::class,'registration']);
Route::post('/CustomerAjaxForm',[CustomerController::class,'customerFormAjax']);

//// view list data
Route::get('/CustomerView',[CustomerController::class,'viewPage']);

//// delete reord

Route::get('/customerDel/{id}',[CustomerController::class, 'delete']);
///// edit record
Route::get('/customerEdit/{id}',[CustomerController::class, 'edit']);

///// update record
Route::post('/customerUpdate/{id}',[CustomerController::class, 'update']);


Route::get('/custom', function(){
    $customer=customer::all();
    echo "<pre>";
    print_r($customer->toArray());
});


Route::get("/user", function(){
    if(session()->has('user_id')){
        return redirect('CustomerView');    
    }
    return view('login');
});

Route::view('/abc','basicinfo');

Route::post('/User_Auth',[UserAuthController::class, 'UserAuthendication']);

Route::get('/profile' ,function(){
    return view('profile');
});

Route::get('/logout', function(){
    if(session()->has('user_id')){
        session()->pull('user_id');     
    }
    return redirect('/user');
});
