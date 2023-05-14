<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'clubs';

    protected $guarded = [
        'id',
    ];

    public function players()
    {
        return $this->belongsToMany(Player::class, 'club_players',
            'club_id', 'player_id', 'id', 'id')
            ->withPivot(['season_id'])
            ->withTimestamps();
    }
}
