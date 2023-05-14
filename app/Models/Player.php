<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';
    
    protected $guarded = [
        'id',
    ];

    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'club_players',
            'player_id', 'club_id', 'id', 'id')
            ->withPivot(['season_id'])
            ->withTimestamps();
    }
}
