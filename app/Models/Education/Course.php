<?php

namespace App\Models\Education;

use App\Models\Subcategory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Storage;
use Str;

class Course extends Model
{
    use Sluggable;

    protected $guarded = ['id'];

    public const STATUS_ACTIVE = 'active';
    public const STATUS_CLOSED = 'closed';
    public const STATUS_INACTIVE = 'inactive';

    public static function statusesList(): array
    {
        return [
            self::STATUS_ACTIVE => 'active',
            self::STATUS_INACTIVE => 'inactive',
            self::STATUS_CLOSED => 'closed',
        ];
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'course_id');
    }

    public static function add($fields)
    {
        $course = new static;
        $course->fill($fields);
        $course->save();

        return $course;
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

    public function getDate()
    {
        $group = $this->groups()->orderByDesc('date')->firstOrFail();
        return $group->date;
    }

    public function getFreePlaces()
    {
        $group = $this->groups()->orderByDesc('date')->firstOrFail();
        return $group->places;
    }

    public function getLastGroup()
    {
        $group = $this->groups()->orderByDesc('date')->firstOrFail();
        return $group;
    }

    public function isActive()
    {
        return $this->status ===  self::STATUS_ACTIVE;
    }

    public function isClosed()
    {
            return $this->status ===  self::STATUS_CLOSED;
    }

    public function isInactive()
    {
        return $this->status ===  self::STATUS_INACTIVE;
    }

    public function setActive()
    {
        return $this->status ===  self::STATUS_ACTIVE;
    }

    public function setInactive()
    {
        return $this->status ===  self::STATUS_INACTIVE;
    }

    public function setClosed()
    {
        return $this->status ===  self::STATUS_CLOSED;
    }

    public static function getAllCourses()
    {
        return self::pluck('title', 'id')->all();
    }
}
