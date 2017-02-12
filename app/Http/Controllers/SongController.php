<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Event,Song};

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
        return view('songs',['canEdit' => true]);
    }

    /**
     * Show view ong songs and set-list
     * For non-administrator
     *
     * @return View
     */
    public function viewSongs()
    {
        return view('songs',['canEdit' => false]);
    }


    public function addSong(Request $request)
    {
        return "OK";
    }

    public function editSong(Request $request)
    {
        return "OK";
    }

    public function deleteSong(Request $request)
    {
        return "OK";
    }
}
