<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Settings extends Model
{
    use HasFactory;
    protected $table = 'settings';

    protected $fillable = [
        'name',
        'key',

    ];

  
}
