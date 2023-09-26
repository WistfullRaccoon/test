<?php

namespace App\Models\Education;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'group_dialog_messages';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function hasFile()
    {
        return $this->file !== NULL;
    }

    public function getFile()
    {
        return '/uploads/' . $this->file;
    }
}
