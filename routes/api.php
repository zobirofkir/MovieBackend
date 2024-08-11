<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post("register", [AuthController::class, "register"]);
Route::post("login", [AuthController::class, "login"]);


Route::middleware("auth:api")->group(function() {
    Route::get("auth", [AuthController::class, "current"]);
    Route::put("auth/{id}", [AuthController::class, "updateCurrentUserPassword"]);
    Route::delete("auth", [AuthController::class, "logout"]);
});

Route::apiResource("movies/{page}", MovieController::class)->only("index");
Route::apiResource("movies", MovieController::class)->except("index");

/**
 * Search Url
 */
Route::get("/search/{page}", [MovieController::class, "search"]);

/**
 * Get The Movie
 */
Route::get("/movies/{page?}/{movieId}", [MovieController::class, "show"]);


/**
 * Tv List
*/
Route::apiResource("tv/{page}", TvController::class)->except("show");


/**
 * Show The Tv
*/
Route::get("tv/{page}/{tvId}", [TvController::class, "show"]);


/**
 * Contact Route
 */
Route::apiResource("contacts", ContactController::class);