<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;

class Tag extends Model
{
    use HasFactory,HasSEO,HasTranslations,HasTranslatableSlug;

    protected $table = 'tag';

    protected $fillable = [
    'title',
    'slug',

    ];

    public $translatable = [
    'title',
    'slug',
    ];



       
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }




}
