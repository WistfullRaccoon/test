<?php

namespace App\Models;

use App\Models\Subcategory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


/**
 * Class Category
 * @package App
 * @property $preview
 */

class Category extends Model
{
    use Sluggable;

    protected $fillable = ['title'];

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class);
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

    /**
     * @throws \Exception
     */

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
            return'/img/boxed-bg.jpg';
        }

        return '/uploads/' . $this->preview;
    }

    public static function getAllCategories()
    {
        return self::pluck('title', 'id')->all();
    }
}
