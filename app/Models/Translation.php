<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $table = 'translations';

    protected $guarded = [
        'id',
    ];

    public function fields()
    {
        return $this->hasMany(TranslationField::class, 'translation_id');
    }
}
