<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasTranslatableSlug;



class Blog extends Model
{
    use HasFactory,HasSEO,HasTranslations,HasTranslatableSlug;

    protected $table = 'blog';

    protected $fillable = [
    'title',
'desc',
'image',
'meta_title',
'meta_description',
'meta_keywords',
'slug',

    ];

    public $translatable = [

            'title',
'desc',
'meta_title',
'meta_description',
'meta_keywords',
'slug',

    ];

    
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tags', 'blog_id', 'tag_id');
    }

    
}
