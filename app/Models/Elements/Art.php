<?php

namespace App\Models\Elements;

use App\Models\Comment;
use App\Models\Subcategory;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Tags\HasTags;

/**
 * Class Post
 * @package App
 * @property int $id
 * @property int $user_id
 * @property int $subcategory_id
 * @property string $title
 * @property string $content
 * @property string $date
 * @property string $image
 */

class Art extends Model
{
    use Sluggable;
    use HasTags;

    const IS_HIDDEN = 0;
    const IS_PUBLIC = 1;

    protected $fillable = ['title', 'date', 'description', 'subcategory_id'];

    public static function getArtClassName(): string
    {
        return Art::class;
    }

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
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function claims()
    {
        return $this->morphMany('App\Models\Claim', 'claimable');
    }

    public static function add($fields)
    {
        $art = new static;
        $art->fill($fields);
        $art->user_id = Auth::id();
        $art->save();

        return $art;
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
            $this->clearCache();
        } catch (\Exception $e) {
        }
    }

    public function uploadImage($image)
    {
        if ($image == null) {
            return;
        }

        $this->removeImage();
        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
//        imageCompressor::compressImage('uploads/' . $filename);

        $this->save();
    }

    protected function removeImage()
    {
        if ($this->image != null) {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function getImage()
    {
        if ($this->image == null) {
            return '/img/no-img.png';
        }
        return '/uploads/' . $this->image;
    }

    public function setSubcategory($id)
    {
        if ($id == null) {
            return;
        }

        $this->subcategory_id = $id;
        $this->save();
    }

    public function setTags($tags)
    {
        if ($tags == null) {
            return;
        }

        $this->syncTags($tags);
    }

    public function setDateAttribute($value)
    {
        if ($value) {
            $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
            $this->attributes['date'] = $date;
        }
    }

    public function getDateAttribute($value)
    {
        if ($value) {
            $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
            return $date;
        }
    }

    public function getDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('F d, Y');
    }

    public function getViews()
    {
        return $this->views;
    }

    public static function getPopularArts()
    {
        return self::with('subcategory', 'tags')
            ->orderByDesc('views')
            ->paginate(3);
    }

    public function getSameArts()
    {
        return $this->subcategory->arts()->limit(4)->get();
    }

    public function getCommentsCount()
    {
        return $this->comments->count();
    }

    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $postId = $this->hasPrevious();
        return self::find($postId);
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $postId = $this->hasNext();
        return self::find($postId);
    }

    public function scopeForUser(Builder $query, User $user)
    {
        return $query->where('user_id', $user->id);
    }

    public function clearCache()
    {
        Cache::tags(['arts', 'author' . $this->user_id])->flush();
    }
}
