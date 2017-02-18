<?php

use Illuminate\Database\Seeder;
use App\Song;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = [
            [
                'title' => 'My God',
                'artist' => 'Victory Worship',
                'original_key' => 'B',
                'male_key' => 'B',
                'female_key' => 'D'
            ],
            [
                'title' => 'Nothing is Impossible',
                'artist' => 'Planetshakers',
                'original_key' => 'C',
                'male_key' => 'C',
                'female_key' => 'E'
            ],
            [
                'title' => 'Cornerstone',
                'artist' => 'Hillsong',
                'original_key' => 'C',
                'male_key' => 'C',
                'female_key' => 'E'
            ],
            [
                'title' => 'Jesus My Savior',
                'artist' => 'Victory Worship',
                'original_key' => 'E',
                'male_key' => 'B',
                'female_key' => 'E'
            ],
            [
                'title' => 'Faithful',
                'artist' => 'Victory Worship',
                'original_key' => 'C',
                'male_key' => 'C',
                'female_key' => 'E'
            ],
            [
                'title' => 'God Is Able',
                'artist' => 'Hillsong',
                'original_key' => 'C',
                'male_key' => 'A',
                'female_key' => 'C'
            ],
            [
                'title' => 'O What a Savior',
                'artist' => 'Mid-Cities Worship',
                'original_key' => 'B',
                'male_key' => 'B',
                'female_key' => 'D'
            ],
            [
                'title' => 'You',
                'artist' => 'Hillsong',
                'original_key' => 'B',
                'male_key' => 'B',
                'female_key' => 'E'
            ],
            [
                'title' => 'Broken Vessels',
                'artist' => 'Hillsong',
                'original_key' => 'G',
                'male_key' => 'B',
                'female_key' => 'G'
            ],
            [
                'title' => 'One Thing Remains',
                'artist' => 'Bethel Music',
                'original_key' => 'B',
                'male_key' => 'B',
                'female_key' => 'E'
            ]
        ];

        foreach ($songs as $song) {
            $songInstance = Song::create([
                'title' => $song['title'],
                'artist' => $song['artist'],
                'original_key' => $song['original_key'],
                'male_key' => $song['male_key'],
                'female_key' => $song['female_key'],
            ]);
        }
    }
}
