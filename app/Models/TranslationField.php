<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranslationField extends Model
{
    protected $table = 'translation_fields';

    protected $guarded = [
        'id',
    ];
}
