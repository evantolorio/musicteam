<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Song;

class SongController extends Controller
{


    /**
     * Show view on managing songs and set-list
     * For administrator
     *
     * @return  View
     */
    public function viewManageSongs()
    {
        $songs = Song::all();
        $events = Event::with('songs')->get();

        foreach ($events as $event) {
            $parsedName = explode(";", $event->name);
            $event->parsedName = $parsedName[0];
            $event->parsedDate = $parsedName[1];
        }

        return view('songs',['canEdit' => true, 'songs' => $songs, 'events' => $events]);
    }

    /**
     * Show view ong songs and set-list
     * For non-administrator
     *
     * @return View
     */
    public function viewSongs()
    {
        $songs = Song::all();
        $events = Event::with('songs')->get();

        foreach ($events as $event) {
            $parsedName = explode(";", $event->name);
            $event->parsedName = $parsedName[0];
            $event->parsedDate = $parsedName[1];
        }

        $currentEvents = $events->take(4);
        $events = $events->slice(4);

        return view('songs',['canEdit' => false, 'songs' => $songs, 'events' => $events, 'currentEvents' => $currentEvents]);
    }

    /**
     * Add Song
     * AJAX
     *
     * @return  String
     */
    public function addSong(Request $request)
    {
        if($request->ajax()){
            $song = new Song;
            $song->title = $request->title;
            $song->artist = $request->artist;
            $song->original_key = $request->originalKey;
            $song->male_key = $request->maleKey;
            $song->female_key = $request->femaleKey;
            $song->save();

            return "OK";
        }

    }

    /**
     * Edit Song
     * AJAX
     *
     * @return  String
     */
    public function editSong(Request $request)
    {
        if($request->ajax()){
            $song = Song::find($request->songId);
            $song->title = $request->title;
            $song->artist = $request->artist;
            $song->original_key = $request->originalKey;
            $song->male_key = $request->maleKey;
            $song->female_key = $request->femaleKey;
            $song->save();

            return "OK";
        }
    }

    /**
     * Delete Song
     * AJAX
     *
     * @return  String
     */
    public function deleteSong(Request $request)
    {
        if($request->ajax()){
            $song = Song::find($request->songId);
            $song->delete();

            return "OK";
        }
    }
}
