<?php

namespace App\Models\Education;

use App\Models\User;
use Guzzle\Common\Collection;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;
use Str;

class Dialog extends Model
{
    protected $table = 'group_dialogs';

    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'dialog_id', 'id');
    }

    public function writeMessageByTeacher(int $userId, string $message): void
    {
        $this->messages()->create([
            'user_id' => $userId,
            'message' => $message,
        ]);
        $this->student_new_messages++;
        $this->save();
    }

    public function writeMessageByStudent(int $userId, string $message, $file): void
    {
        $this->messages()->create([
            'user_id' => $userId,
            'message' => $message,
            'file' => $this->uploadFile($file)
        ]);
        $this->teacher_new_messages++;

        $this->save();
    }

    public function readByTeacher()
    {
        $this->update(['teacher_new_messages' => 0]);

        return $this;
    }

    public function readByStudent(): void
    {
        $this->update(['student_new_messages' => 0]);
    }

    public function getAllMessages(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->messages()->orderBy('id')->with('user')->get();
    }

    public function uploadFile($file)
    {
        if ($file == null) {
            return null;
        }

        $filename = Str::random(10) . '.' . $file->extension();
        $file->storeAs('uploads', $filename);
        return $filename;
    }

}
