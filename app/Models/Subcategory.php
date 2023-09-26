<?php

namespace App\Models;

use App\Models\Education\Course;
use App\Models\Elements\Art;
use App\Models\Elements\Photo;
use App\Models\Elements\Post;
use App\Models\Elements\Track;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Subcategory extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function arts()
    {
        return $this->hasMany(Art::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
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
        $category = new static;
        $category->fill($fields);
        $category->save();

        return $category;
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function uploadPreview($preview)
    {
        if($preview == null) { return; }

        $this->removeImage();
        $filename = Str::random(10) . '.' . $preview->extension();
        $preview->storeAs('uploads', $filename);
        $this->preview = $filename;
        $this->save();
    }

    protected function removeImage()
    {
        if($this->preview != null)
        {
            Storage::delete('uploads/' . $this->preview);
        }
    }

    public function getImage()
    {
        if($this->preview == null)
        {
            return'/img/no-img.png';
        }

        return '/uploads/' . $this->preview;
    }

    public function setCategory($id)
    {
        if($id == null) { return; }

        $this->category_id = $id;
        $this->save();
    }

    public static function getSubcategoriesTitles()
    {
        return self::pluck('title', 'id')->all();
    }

    public function scopeForCategory(Builder $query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

}
