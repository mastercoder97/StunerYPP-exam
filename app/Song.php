<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'tbl_songs';

    protected $primaryKey = 'song_id';

    protected $fillable = ['title', 'artist', 'lyrics'];
}