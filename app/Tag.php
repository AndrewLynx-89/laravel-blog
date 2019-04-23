<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    use  Sluggable;

    protected $fillable = ['title'];

    public function articles()
    {
        return $this->belongsToMany(
            Article::class,
            'article_tags',
            'tag_id',
            'article_id'
        );
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
