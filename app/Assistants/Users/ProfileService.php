<?php


namespace App\Assistants\Users;

use App\Models\Education\Group;
use App\Models\Elements\Art;
use App\Models\Elements\Post;
use App\Models\Tickets\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProfileService
{
    public function edit(Request $request, User $user)
    {
        $user->edit($request->except('password'));
        $user->uploadAvatar($request->file('avatar'));
        $user->generatePassword($request->get('password'));
    }

    public function getUserArts(User $user)
    {
        return Cache::tags(['arts', 'author' . $user->id])
            ->remember('artOf' . $user->id, 120, function() use ($user) {
                return Art::forUser($user)->orderByDesc('updated_at')->paginate(20);
            });
    }

    public function getUserPosts(User $user)
    {
        return Cache::tags(['posts', 'author' . $user->id])
            ->remember('postOf' . $user->id, 120, function() use ($user) {
        return Post::forUser($user)->orderByDesc('updated_at')->paginate(20);
        });
    }

    public function getUserTickets(User $user)
    {
        return Ticket::forUser($user)->orderByDesc('updated_at')->paginate(20);
    }

    public function getStudentGroups(User $user)
    {
        return User::find($user->id)->groups()->where('payment_time', '!=', NULL)->orderByDesc('date')->get();
    }

    public function getTeacherGroups(User $user)
    {
        return Group::where('teacher_id', $user->id)->orderByDesc('date')->get();
    }
}
