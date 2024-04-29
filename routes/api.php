<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\AtelierController;
use App\Http\Controllers\API\CommandeController;
use App\Http\Controllers\API\TypeArticleController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\PrestationController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');


Route::apiResource("user", UserController::class);
Route::apiResource("post", PostController::class);
Route::apiResource("atelier", AtelierController::class);
Route::apiResource("commande", CommandeController::class);
Route::apiResource("typearticle", TypeArticleController::class);
Route::apiResource("article", ArticleController::class);
Route::apiResource("prestation", PrestationController::class);