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
                'name' => 'Week 6: Sunday 9AM ; August 6, 2017',
                'songs' => [5, 67, 4]
            ],
            [
                'name' => 'Week 6: Sunday 11AM | 4PM | 6PM ; August 6, 2017',
                'songs' => [5, 76, 4]
            ],
            [
                'name' => 'Week 6: Youth ; August 10, 2017',
                'songs' => [57, 13, 74, 4]
            ],
            [
                'name' => 'Other Events ; ',
                'songs' => []
            ],
            [
                'name' => 'Week 7: Sunday 9AM ; August 13, 2017',
                'songs' => [7, 75, 77]
            ],
            [
                'name' => 'Week 7: Sunday 11AM | 4PM | 6PM ; August 13, 2017',
                'songs' => [7, 76, 77]
            ],
            [
                'name' => 'Week 7: Youth ; August 17, 2017',
                'songs' => [66, 32, 74, 20]
            ],
            [
                'name' => 'Week 8: Sunday 9AM ; August 20, 2017',
                'songs' => [7, 75, 72]
            ],
            [
                'name' => 'Week 8: Sunday 11AM | 4PM | 6PM ; August 20, 2017',
                'songs' => [7, 76, 72]
            ],
            [
                'name' => 'Week 8: Youth ; August 24, 2017',
                'songs' => [70, 19, 11, 72]
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
