<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Event,Song};

class SongController extends Controller
{


    public function viewManageSongs()
    {
        return view('manageSongs');
    }
}
