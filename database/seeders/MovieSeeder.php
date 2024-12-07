<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // созд фильм
        Movie::create(['title' => 'Action Movie', 'poster' => 'action_movie.jpg']);
        Movie::create(['title' => 'Comedy Movie', 'poster' => 'comedy_movie.jpg']);
        Movie::create(['title' => 'Drama Movie', 'poster' => 'drama_movie.jpg']);
        Movie::create(['title' => 'Horror Movie', 'poster' => 'horror_movie.jpg']);
    }
}
