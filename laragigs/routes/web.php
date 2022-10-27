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
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/hello', function() {
//     return response('<h1>Hello World !!!</h1>', 200)
//     ->header('Content-Type', 'text/html')
//     ->header('Custom-Header', 'MyCustom/Header');
// });

// Route::get('/posts/{id}', function ($id) {
//     // dd($id); //Dump and Die
//     // ddd($id); //Dump, Die and Debug
//     return response('<h2>Posts' . $id . '</h2>');
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $request) {
//     return '<h2><strong>' . $request->name . '</strong>, from: ' . $request->city . '</h2>';
// });


// All Listings ...
// Route::get('/', function () {
//     return view('listings', [
//         'heading' => 'Latest Listing',
//         'listings' => Listing::all()
//     ]);
// });

Route::get('/', [ListingController::class, 'index'])->name('home');

// Store a listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Handle Update Submit
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Handle Delete Submit
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// One Listings
// Route::get('/listings/{listing}', function (Listing $listing) {
//     // without Route Model Binding
//     // $listing = Listing::find($id);
//     // if ($listing) {
//     //     return view('listing',  [
//     //         'heading' => 'Listing by ' . $listing['company'],
//     //         'listing' => $listing
//     //     ]);
//     // } else {
//     //     abort('404');
//     // }
//     // Route Model Binding
//     return view('listing',  [
//         'heading' => 'Listing by ' . $listing['company'],
//         'listing' => $listing
//     ]);
// });

Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show regiter create form ...
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new User
Route::post('/users', [UserController::class, 'store']);

// Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show logging form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
