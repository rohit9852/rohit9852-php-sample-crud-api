<?php

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// show list blogs articles

Route::get('/articles/list', function() {
    return Article::all();
});

// particular details

Route::get('/articles/details/{id}', function($id) {
    return Article::find($id);
});

//  data save api

Route::post('articles',[ArticleController :: class, 'Datasave']);

// update api

Route::put('articles/update/', [ArticleController::class, 'UpdateData']);

// delete api

Route::delete('articles/delete/{id}', [ArticleController::class, 'DataDelete']);


