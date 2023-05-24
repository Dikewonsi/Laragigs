<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

//Common Resource Routes:

//index - Show all listings
//show - show single listings
//create - show form to create new lisiting
//store  - store new lisitng
//edit - show form to edit new listing
//update - update listing
//destroy - delete listing

//All Listings
Route::get('/', [ListingController::class, 'index']);


//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');


//Store New Listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');


//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');


//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');


//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');


//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
 

//Single Listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);


//Show Registration Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create User
Route::post('/users', [UserController::class, 'store']);


//Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');


//LogIn User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
