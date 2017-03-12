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
                'name' => 'Sunday (March 12, 2017) 9AM',
                'songs' => [5, 28, 30]
            ],
            [
                'name' => 'Sunday (March 12, 2017) 11AM, 5PM, 7PM',
                'songs' => [5, 6, 30]
            ],
            [
                'name' => 'Youth (March 16, 2017)',
                'songs' => [21, 32, 58, 38]
            ],
            [
                'name' => 'Sunday (March 19, 2017) 9AM',
                'songs' => [16, 28, 29]
            ],
            [
                'name' => 'Sunday (March 19, 2017) 11AM, 5PM, 7PM',
                'songs' => [16, 27, 29]
            ],
            [
                'name' => 'Youth (March 23, 2017)',
                'songs' => [21, 22, 29, 9]
            ],
            [
                'name' => 'Sunday (March 26, 2017) 9AM',
                'songs' => [7, 28, 20]
            ],
            [
                'name' => 'Sunday (March 26, 2017) 11AM, 5PM, 7PM',
                'songs' => [7, 11, 20]
            ],
            [
                'name' => 'Sunday (April 2, 2017) 9AM',
                'songs' => [24, 56, 25]
            ],
            [
                'name' => 'Sunday (April 2, 2017) 11AM, 5PM, 7PM',
                'songs' => [24, 54, 25]
            ],
            [
                'name' => 'Sunday (April 9, 2017) 9AM',
                'songs' => [13, 56, 9]
            ],
            [
                'name' => 'Sunday (April 9, 2017) 11AM, 5PM, 7PM',
                'songs' => [13, 54, 9]
            ],
            [
                'name' => 'Sunday (April 16, 2017) 9AM',
                'songs' => [55, 56, 25]
            ],
            [
                'name' => 'Sunday (April 16, 2017) 11AM, 5PM, 7PM ',
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
