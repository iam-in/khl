<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $guarded = [
        'id',
    ];

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translatable');
    }
}
