<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;

class Service extends Model
{
    use HasFactory,HasSEO,HasTranslations,HasTranslatableSlug;

    protected $table = 'service';

    protected $fillable = [
    'title',
    'detail',
    'image',
    'image2',
    'icon',
    'meta_title',
    'meta_description',
    'meta_keywords',

    'slug',
    ];

    public $translatable = [
    'title',
    'detail',
    'slug',
    'meta_title',
    'meta_description',
    'meta_keywords',
    ];

    
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }


}
