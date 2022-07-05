<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\Models\Listing;
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

// Common Resource Routes:
//index - show all listings
//show - show single listing
//create - show form to create new listing
//store - store new listing
//edit - show form to edit listing
//update - Update Listing
// destroy - Delete listing

// All listing
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit form

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing

Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing

Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings

Route::get('/listings/manage', [ListingController::class, 'manage']);


// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])->middleware('auth');

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Log User out

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in User

Route::post('/users/authenticate', [UserController::class, 'authenticate']);
