<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $guarded = ['id'];

//    public function subscribe($author_id, $subscriber_id)
//    {
//        return static::create([
//            'author_id' => $author_id,
//            'subscriber_id' => $subscriber_id
//        ]);
//    }
}
