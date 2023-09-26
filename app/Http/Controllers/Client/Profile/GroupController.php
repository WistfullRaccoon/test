<?php

namespace App\Http\Controllers\Client\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Groups\MessageRequest;
use App\Models\Education\Dialog;
use App\Models\Education\Group;
use Auth;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function show(Group $group)
    {
        $user = Auth::user();

        $lessons = $group->getLessons();
        $dialog = $group->getOrCreateDialogWith($user->id);

        return view('client.profile.courses.group', compact('group', 'user', 'lessons', 'dialog'));
    }

    public function message(MessageRequest $request, Dialog $dialog)
    {
        $user = Auth::user();

        $dialog->writeMessageByStudent($user->id, $request->get('message'), $request->file('file'));

        return redirect()->back();
    }
}
