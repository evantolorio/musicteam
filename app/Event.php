<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Song;

class Event extends Model
{
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'date'
    ];

    /**
     * Get the events where the Song is affiliated
     */
    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
}
