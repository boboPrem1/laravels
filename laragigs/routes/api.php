<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/posts', function() {
//     return response()->json(
//         [
//             'status' => 'Succèss',
//             'data' => [
//                 [
//                     'title' => 'Post One',
//                     'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi soluta laboriosam iste. Facilis officia possimus libero iste voluptates itaque inventore amet temporibus aliquid, veniam eius.'
//                 ],
//                 [
//                     'title' => 'Post Two',
//                     'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi soluta laboriosam iste. Facilis officia possimus libero iste voluptates itaque inventore amet temporibus aliquid, veniam eius.'
//                 ],
//                 [
//                     'title' => 'Post Three',
//                     'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi soluta laboriosam iste. Facilis officia possimus libero iste voluptates itaque inventore amet temporibus aliquid, veniam eius.'
//                 ],
//                 [
//                     'title' => 'Post Four',
//                     'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi soluta laboriosam iste. Facilis officia possimus libero iste voluptates itaque inventore amet temporibus aliquid, veniam eius.'
//                 ],
//                 [
//                     'title' => 'Post Five',
//                     'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi soluta laboriosam iste. Facilis officia possimus libero iste voluptates itaque inventore amet temporibus aliquid, veniam eius.'
//                 ]
//             ]
//         ]
//     );
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
