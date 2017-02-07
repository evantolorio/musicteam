<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongController extends Controller
{


    public function viewManageSongs()
    {
        return view('manageSongs');
    }
}
