<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    // метод отображения фильмов
    public function index()
    {
        return Movie::with('genres')->paginate(10);  // пагинация
    }
    // метод отображения фильма по id
    public function show($id)
    {
        return Movie::with('genres')->findOrFail($id);
    }
    // метод создания фильмов
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $movie = new Movie();
        $movie->title = $request->title;

        if ($request->hasFile('poster')) {
            $movie->poster = $request->file('poster')->store('posters');
        }

        $movie->save();
        return response()->json($movie, 201);
    }
    // метод обновления данных фильма
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $movie = Movie::findOrFail($id);
        $movie->title = $request->title;

        if ($request->hasFile('poster')) {
            if ($movie->poster && $movie->poster !== 'default.jpg') {
                Storage::delete($movie->poster);
            }
            $movie->poster = $request->file('poster')->store('posters');
        }

        $movie->save();
        return response()->json($movie);
    }
    // метод удаления фильма
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        if ($movie->poster && $movie->poster !== 'default.jpg') {
            Storage::delete($movie->poster);
        }
        $movie->delete();
        return response()->json(null, 204);
    }
    // метод публикации фильма
    public function publish($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->status = 'published';
        $movie->save();

        return response()->json($movie);
    }
}
