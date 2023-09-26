<?php

namespace App\Models\Elements;

use App\Models\Comment;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Tags\HasTags;

class Photo extends Model
{
    use Sluggable;
    use HasTags;

    const IS_HIDDEN = 0;
    const IS_PUBLIC = 1;

    protected $fillable = ['title', 'date', 'description', 'subcategory_id'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
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
        $photo = new static;
        $photo->fill($fields);
        $photo->user_id = 1;
        $photo->save();

        return $photo;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        try {
            $this->delete();
        } catch (\Exception $e) {
        }
    }

    public function uploadImage($image)
    {
        if($image == null) { return; }

        $this->removeImage();
        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    protected function removeImage()
    {
        if($this->image != null)
        {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function getImage()
    {
        if($this->image == null)
        {
            return'/img/no-img.png';
        }
        return '/uploads/' . $this->image;
    }

    public function setSubcategory($id)
    {
        if($id == null) { return; }

        $this->subcategory_id = $id;
        $this->save();
    }

    public function setTags($tags)
    {
        if($tags == null) { return; }

        $this->syncTags($tags);
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
}
