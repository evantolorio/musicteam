<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Song extends Model
{
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'songs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'artist',
        'original_key',
        'male_key',
        'female_key'
    ];

    /**
     * Get the events where the Song is affiliated
     */
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
