<?php

namespace App\Http\Controllers\Admin;

use App\Assistants\Users\ProfileService;
use App\Assistants\Users\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class UsersController extends Controller
{
    private $service;

    public function __construct(ProfileService $service)
    {
        $this->service = $service;
        $this->middleware('can:manage-users')->except('index', 'show', 'toggleBan', 'toggleTeacher');
    }

    /**
     * @return Factory|View
     */

    public function index()
    {
        $users = User::all();

        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $user = User::add($request->all());
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->route('admin.users.index');
    }

    /**
     * @param int $id
     * @return Factory|View
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', ['user' => $user ]);
    }

    /**
     * @param int $id
     * @return Factory|View
     */

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)],
            'avatar' => 'nullable|image',
        ]);

        $this->service->edit($request, $user);

        return redirect()->route('admin.users.index');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */

    public function destroy($id)
    {
        User::find($id)->remove();
        return redirect()->route('admin.users.index');
    }


    public function toggleBan($id)
    {
        User::find($id)->toggleBan();

        return redirect()->back();
    }

    public function toggleTeacher($id)
    {
        User::find($id)->toggleTeacher();

        return redirect()->back();
    }
}
