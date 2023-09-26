<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = ['id'];

    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';

    public static function statusesList(): array
    {
        return [
            self::STATUS_ACTIVE => 'active',
            self::STATUS_INACTIVE => 'inactive',
        ];
    }

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id');
    }

    public static function add($fields, $groupId)
    {
        $lesson = new static;
        $lesson->fill($fields);
        $lesson->group_id = $groupId;
        $lesson->save();

        return $lesson;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
}
