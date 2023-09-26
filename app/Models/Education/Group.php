<?php

namespace App\Models\Education;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
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

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function teacher()
    {
        return $this->hasOne(User::class,'id', 'teacher_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function dialogs()
    {
        return $this->hasMany(Dialog::class);
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'orders',
            'group_id',
            'user_id'
        );
    }

    public static function add($fields)
    {
        $group = new static;
        $group->fill($fields);
        $group->save();

        return $group;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function isActive()
    {
        return $this->status ===  self::STATUS_ACTIVE;
    }

    public function setActive()
    {
        $this->status = self::STATUS_ACTIVE;
        $this->save();
    }

    public function getPrice()
    {
        return $this->course->price;
    }

    public function getCourseName()
    {
        return $this->course->title;
    }

    public function getCourseSubcategory()
    {
        return $this->course->subcategory->title;
    }

    public function getTeacher()
    {
        return $this->teacher_id;
    }

    public function getStudents()
    {
        return $this->users->all();
    }

    public function getLessons()
    {
        return $this->lessons->all();
    }

    public function readStudentMessages(int $userId): void
    {
        $this->getDialogWithTeacher($userId)->readByStudent();
    }

    public function readTeacherMessages(int $userId): Dialog
    {
        return $this->getOrCreateDialogWith($userId)->readByTeacher();
    }

    public function getOrCreateDialogWith(int $studentId): Dialog
    {
        if ($studentId === $this->studentId) {
            throw new \DomainException('Cannot send message to myself.');
        }
        return $this->dialogs()->firstOrCreate([
            'teacher_id' => $this->teacher_id,
            'student_id' => $studentId,
        ]);
    }

    public function calcTeacherNewMessages(int $studentId)
    {
        return $this->getOrCreateDialogWith($studentId)->teacher_new_messages;
    }

    public function calcStudentNewMessages(int $studentId)
    {
        return $this->getOrCreateDialogWith($studentId)->student_new_messages;
    }

    public function reduceFreePlaces()
    {
        $this->places--;
        if(!$this->hasFreePlaces())
            $this->course->setClosed();
        $this->save();
    }

    public function hasFreePlaces()
    {
        return $this->places>0;
    }
}
