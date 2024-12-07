<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class MovieGenreSeeder extends Seeder
{
    public function run()
    {
        $action = Genre::where('name', 'Action')->first();
        $comedy = Genre::where('name', 'Comedy')->first();
        $drama = Genre::where('name', 'Drama')->first();
        $horror = Genre::where('name', 'Horror')->first();
        $scifi = Genre::where('name', 'Science Fiction')->first();

        $actionMovie = Movie::where('title', 'Action Movie')->first();
        $comedyMovie = Movie::where('title', 'Comedy Movie')->first();
        $dramaMovie = Movie::where('title', 'Drama Movie')->first();
        $horrorMovie = Movie::where('title', 'Horror Movie')->first();

        $actionMovie->genres()->attach($action);
        $comedyMovie->genres()->attach($comedy);
        $dramaMovie->genres()->attach($drama);
        $horrorMovie->genres()->attach($horror);
    }
}
