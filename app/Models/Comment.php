<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];
    public const SENT = 'sent';
    public const HIDDEN = 'hidden';

    public function commentable()
    {
        return $this->morphTo();
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function add($commentableType, $commentableId, $message)
    {
//        $comment = self::make([
//            'user_id' => Auth::id(),
//            'commentable_id' => $commentableId,
//            'commentable_type' => $commentableType,
//            'text' => $message,
//            'status' => self::SENT,
//        ]);
    }

    public function allow()
    {
        $this->status = self::SENT;
        $this->save();
    }

    public function disAllow()
    {
        $this->status = self::HIDDEN;
        $this->save();
    }

    public function toggleStatus()
    {
        if($this->status == self::HIDDEN)
        {
            return $this->allow();
        }

        return $this->disAllow();
    }

    public function remove()
    {
        try {
            $this->delete();
        } catch (\Exception $e) {
        }
    }
}
