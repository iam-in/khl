<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClubPlayers extends Model
{
    protected $table = 'club_players';

    protected $guarded = [
        'id',
    ];
}
