<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'name' => 'Sunday 9AM ; March 19, 2017',
                'songs' => [16, 28, 29]
            ],
            [
                'name' => 'Sunday 11AM | 5PM | 7PM ; March 19, 2017',
                'songs' => [16, 27, 29]
            ],
            [
                'name' => 'Youth ; March 16, 2017',
                'songs' => [21, 32, 58, 38]
            ],
            [
                'name' => 'Youth ; March 23, 2017',
                'songs' => [21, 22, 29, 9]
            ],
            [
                'name' => 'Sunday 9AM ; March 26, 2017',
                'songs' => [7, 28, 20]
            ],
            [
                'name' => 'Sunday 11AM | 5PM | 7PM ; March 26, 2017',
                'songs' => [7, 11, 20]
            ],
            [
                'name' => 'Sunday 9AM ; April 2, 2017',
                'songs' => [24, 56, 25]
            ],
            [
                'name' => 'Sunday 11AM | 5PM | 7PM ; April 2, 2017',
                'songs' => [24, 54, 25]
            ],
            [
                'name' => 'Sunday 9AM ; April 9, 2017',
                'songs' => [13, 56, 9]
            ],
            [
                'name' => 'Sunday 11AM | 5PM | 7PM ; April 9, 2017',
                'songs' => [13, 54, 9]
            ],
            [
                'name' => 'Sunday 9AM ; April 16, 2017',
                'songs' => [55, 56, 25]
            ],
            [
                'name' => 'Sunday 11AM | 5PM | 7PM ; April 16, 2017',
                'songs' => [55, 54, 25]
            ]

        ];

        foreach ($events as $event) {
            $eventInstance = Event::create([
                'name' => $event['name']
            ]);

            $i = 1;
            foreach ($event['songs'] as $song) {
                $eventInstance->songs()->attach($song, ['order' => $i]);
                $i++;
            }
        }
    }
}
