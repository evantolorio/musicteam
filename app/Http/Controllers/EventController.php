<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Song;

class EventController extends Controller
{
    /**
     * Add Event
     * AJAX
     *
     * @param   Request $request
     * @return  Integer
     */
    public function addEvent(Request $request)
    {
        if($request->ajax()){
            $event = new Event;
            $event->name = $request->name;
            $event->save();

            return $event->id;
        }
    }

    /**
     * Edit Event
     * AJAX
     *
     * @param   Request $request
     * @return  String
     */
    public function editEvent(Request $request)
    {
        if($request->ajax()){
            $event = Event::find($request->eventId);
            $event->name = $request->name;
            $event->save();

            return "OK";
        }
    }

    /**
     * Delete Event
     * AJAX
     *
     * @param   Request $request
     * @return  String
     */
    public function deleteEvent(Request $request)
    {
        if($request->ajax()){
            $event = Event::find($request->eventId);
            $event->songs()->detach();
            $event->delete();

            return "OK";
        }
    }

    /**
     * Add Songs to specific Event
     * AJAX
     *
     * @param   Request $request
     * @return  JSON
     */
    public function addEventSongs(Request $request)
    {
        if($request->ajax()){
            $event = Event::find($request->eventId);
            $songsArray = explode(",", $request->eventSongs);

            $i = 1;
            foreach ($songsArray as $song) {
                $event->songs()->attach($song, ['order' => $i]);
                $i++;
            }

            return $event->songs;
        }
    }
}
