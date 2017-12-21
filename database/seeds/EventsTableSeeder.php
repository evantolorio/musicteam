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
                'name' => 'Week 1 (Promises Fulfilled): Sunday 9AM ; December 3, 2017',
                'songs' => [55, 75, 89]
            ],
            [
                'name' => 'Week 1 (Promises Fulfilled): Sunday 11AM | 4PM | 6PM ; December 3, 2017',
                'songs' => [55, 86, 89]
            ],
            [
                'name' => 'Youth ; ',
                'songs' => []
            ],
	    [
		'name' => 'Others ; ',
		'songs' => []
	    ],
            [
                'name' => 'Week 2 (Promises Fulfilled): Sunday 9AM ; December 10, 2017',
                'songs' => [90, 75, 3]
            ],
            [
                'name' => 'Week 2 (Promises Fulfilled): Sunday 11AM | 4PM | 6PM ; December 10, 2017',
                'songs' => [90, 6, 3]
            ],
            [
                'name' => 'Week 3 (Promises Fulfilled): Sunday 9AM ; December 17, 2017',
                'songs' => [90, 79, 53]
            ],
            [
                'name' => 'Week 3 (Promises Fulfilled): Sunday 11AM | 4PM | 6PM ; December 17, 2017',
                'songs' => [90, 92, 53]
            ],
            [
                'name' => 'Week 4 (Promises Fulfilled): Sunday ; December 24, 2017',
                'songs' => [90, 92, 91]
            ],
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
