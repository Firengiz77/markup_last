<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailTemplateImage extends Model
{
    protected $table = 'email_template_image';
    protected $fillable = [
        'parent_id',
        'image',
    ];
}
