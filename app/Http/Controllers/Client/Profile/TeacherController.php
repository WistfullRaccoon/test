<?php

namespace App\Http\Controllers\Client\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Groups\MessageRequest;
use App\Http\Requests\Lessons\CreateRequest;
use App\Http\Requests\Lessons\EditRequest;
use App\Models\Education\Dialog;
use App\Models\Education\Group;
use App\Models\Education\Lesson;
use Auth;

class TeacherController extends Controller
{
    public function show(Group $group)
    {
        $user = Auth::user();

        $lessons = $group->getLessons();
        $students = $group->getStudents();

        return view('client.profile.teacher_panel.group',
            compact('group', 'user', 'lessons', 'students'));
    }

    public function createLesson($groupId)
    {
        $user = Auth::user();

        return view('client.profile.teacher_panel.lessons.create', compact('user', 'groupId'));
    }

    public function storeLesson(CreateRequest $request, $groupId)
    {
        $lesson = Lesson::add($request->all(), $groupId);

        return redirect()->back();
    }

    public function editLesson(Lesson $lesson)
    {
        $user = Auth::user();

        return view('client.profile.teacher_panel.lessons.edit', compact('lesson', 'user'));
    }

    public function updateLesson(EditRequest $request, Lesson $lesson)
    {
        $lesson->edit($request->all());

        return redirect()->back();
    }

    public function dialog(Group $group, int $studentId)
    {
        $user = Auth::user();

        $dialog = $group->readTeacherMessages($studentId);

        return view('client.profile.teacher_panel.dialog', compact('user', 'dialog'));
    }

    public function message(MessageRequest $request, Dialog $dialog)
    {
        $user = Auth::user();

        $dialog->writeMessageByTeacher($user->id, $request->get('message'));

        return redirect()->route('own.profile');
    }
}
