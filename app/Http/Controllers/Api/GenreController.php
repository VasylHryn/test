<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // метод отображения жанров
    public function index()
    {
        return Genre::all();
    }
    // фильмы по конкретному жанру
    public function show($id)
    {
        $genre = Genre::findOrFail($id);

        // пагинация
        $movies = $genre->movies()->paginate(10);

        return response()->json($movies);
    }
}
