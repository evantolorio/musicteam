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
            'Sunday (February 5, 2017)',
            'Youth (February 16, 2017)',
            'Victory Weekend (March 11-12, 2017)'
        ];

        foreach ($events as $event) {
            $eventInstance = Event::create([
                'name' => $event
            ]);

            $eventInstance->songs()->attach(random_int(0,9), ['order' => 1]);
            $eventInstance->songs()->attach(random_int(0,9), ['order' => 2]);
            $eventInstance->songs()->attach(random_int(0,9), ['order' => 3]);
        }
    }
}
