<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('home.index');
// });

route ::get('/',[AdminController::class,'home']);

route::get('/home', [AdminController::class,'index'])->name('home');

route::get('/create_room', [AdminController::class,'create_room'])->name('create.room');

route::post('/add_room', [AdminController::class,'add_room'])->name('add.room');

route::get('/view_room', [AdminController::class,'view_room'])->name('viewroom');

route::get('/room_delete/{id}', [AdminController::class,'room_delete'])-> name ('roomdelete') ;

route::get('/room_update/{id}', [AdminController::class,'room_update'])-> name ('roomupdate')  ;

route::post('/edit_room/{id}', [AdminController::class,'edit_room']) -> name ('editroom')   ;

route::get('/room_details/{id}', [HomeController::class,'room_details']) -> name ('roomdetails');

route::post('/add_booking', [HomeController::class,'add_booking'])->name('add.booking');

route::get('/bookingdetails', [AdminController::class,'booking_details']) -> name ('bookings');