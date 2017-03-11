<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Event,Song};

class EventController extends Controller
{
    /**
     * Add Event
     *
     * @return  String
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
     *
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
     *
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
}
