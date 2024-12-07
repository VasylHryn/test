<?php

use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// маршруты для фильмов
Route::get('movies', [MovieController::class, 'index']); // получение списка фильмов
Route::get('movies/{id}', [MovieController::class, 'show']); // получение фильма по ID
Route::post('movies', [MovieController::class, 'store']); // создание нового фильма
Route::put('movies/{id}', [MovieController::class, 'update']); // обновление фильма
Route::delete('movies/{id}', [MovieController::class, 'destroy']); // удаление фильма
Route::post('movies/{id}/publish', [MovieController::class, 'publish']); // публикация фильма

// мршруты для жанров
Route::get('genres', [GenreController::class, 'index']); // получение списка жанров
Route::get('genres/{id}', [GenreController::class, 'show']);// получение фильмов по жанру
