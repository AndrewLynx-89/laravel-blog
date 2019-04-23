<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{

    use Sluggable;

    protected $fillable = ['title','content', 'date', 'description', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'article_tags', //таблица через которую будем связываться с постами
            'article_id',// id этой модели в связующей таблице
            'tag_id'  // id модели тега
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

    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->user_id = Auth::user()->id;
        $post->save();

        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage()
    {
        if($this->image != null)
        {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function uploadImage($image)
    {
        if($image == null) { return; }

        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if($this->image == null)
        {
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->image;

    }

    public function setCategory($id)
    {
        if($id == null) {return;}
        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if($ids == null){return;}

        $this->tags()->sync($ids);
    }

    public function toggleStatus($value)
    {
        if($value == null)
        {
            $this->status = 0;
            $this->save();
        }else{
            $this->status = 1;
            $this->save();
        }
    }

    public function toggleFeatured($value)
    {
        if($value == null)
        {
            $this->is_featured = 0;
            $this->save();
        }else{
            $this->is_featured = 1;
            $this->save();
        }
    }

    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');

        return $date;
    }

    public function getCategoryTitle()
    {
        return ($this->category != null)
            ?   $this->category->title
            :   'Нет категории';
    }

    public function getTagsTitles()
    {
        return (!$this->tags->isEmpty())
            ?   implode(', ', $this->tags->pluck('title')->all())
            : 'Нет тегов';
    }

    public function hasCategory()
    {
        return $this->category != null ? true : false;
    }

    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }

    public function getDate()
    {
        return Carbon::createFromFormat('d/m/y', $this->date)->format('F d, Y');
    }

    public function related()
    {
        return self::all()->except($this->id);
    }

    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $articleID = $this->hasPrevious();
        return self::find($articleID);
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $articleID = $this->hasNext();
        return self::find($articleID);
    }

    public static function getPopularArticles()
    {
        return self::orderBy('views','desc')->take(3)->get();
    }

    public function getComments()
    {
        return $this->comments()->where('status', 1)->get();
    }
}
