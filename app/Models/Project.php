<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use App\Models\ProjectAttribute;

class Project extends Model
{
    use HasFactory, HasSEO, HasTranslations, HasTranslatableSlug;



    protected $table = 'project';

    protected $fillable = [
         'category_id',
'title',
'desc',
'slug',
'image',
'meta_title',
'meta_description',
'meta_keywords',

    ];

    public $translatable = [

   'meta_title',
'meta_description',
'meta_keywords',
'title',
'desc',
'slug',

    ];

       /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function attribute()
    {
        return $this->hasMany('App\Models\ProjectAttribute', 'project_id', 'id');
    }


    public function getCategory(){
        return $this->hasOne(ProjectCategory::class,'id','category_id');
    }


    
    public function getImages()
    {
        return $this->hasMany('App\Models\ProjectImage', 'project_id', 'id');
    }

}
