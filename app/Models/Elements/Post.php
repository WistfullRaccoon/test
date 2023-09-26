<?php

namespace App\Models\Elements;

use App\Assistants\imageCompressor;
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
 * @property string $status
 */

class Post extends Model
{

    use Sluggable;
    use HasTags;

    public const STATUS_DRAFT = 'draft';
    public const STATUS_MODERATION = 'moderation';
    public const STATUS_PUBLIC = 'public';
    public const STATUS_HIDDEN = 'hidden';

    protected $fillable = ['title', 'content', 'date', 'description', 'subcategory_id'];

    public static function statusesList(): array
    {
        return [
            self::STATUS_DRAFT => 'draft',
            self::STATUS_MODERATION => 'moderation',
            self::STATUS_PUBLIC => 'public',
            self::STATUS_HIDDEN => 'hidden',
        ];
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

    public function claims()
    {
        return $this->morphMany('App\Models\Claim', 'claimable');
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
//        status = self::STATUS_DRAFT;
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
        try {
            $this->delete();
            $this->clearCache();
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

//        imageCompressor::compressImage('uploads/' . $filename);

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
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
    }

    public function getDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('F d, Y');
    }

    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $postID = $this->hasPrevious();
        return self::find($postID);
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $postID = $this->hasNext();
        return self::find($postID);
    }

    public function isDraft()
    {
        return $this->status ===  self::STATUS_DRAFT;
    }

    public function isOnModeration()
    {
        return $this->status ===  self::STATUS_MODERATION;
    }

    public function isPublic()
    {
        return $this->status ===  self::STATUS_PUBLIC;
    }

    public function isHidden()
    {
        return $this->status ===  self::STATUS_HIDDEN;
    }

    public function setDraft()
    {
        $this->status = self::STATUS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = self::STATUS_PUBLIC;
        $this->save();
    }

    public function setConcealed()
    {
        $this->status = self::STATUS_HIDDEN;
        $this->save();
    }

    public function setStatus($status)
    {
        if($status)
            return $this->setDraft();
        return $this->setPublic();
    }

    public function toggleHidden()
    {
        if(!self::isHidden())
            return $this->setConcealed();

        return $this->setPublic();
    }

    public function getViews()
    {
        return $this->views;
    }

    public static function getPosts()
    {
        return self::with('subcategory', 'tags')
            ->where('status', '!=', 'draft')
            ->orderByDesc('date')
            ->paginate(9);
    }

    public static function getPopularPosts()
    {
        return self::with('subcategory', 'tags')
            ->orderByDesc('views')
            ->paginate(3);
    }

    public function getCommentsCount()
    {
        return $this->comments->count();
    }

    public function scopeForUser(Builder $query, User $user)
    {
        return $query->where('user_id', $user->id);
    }

    public function clearCache()
    {
        Cache::tags(['posts', 'author' . $this->user_id])->flush();
    }
}
