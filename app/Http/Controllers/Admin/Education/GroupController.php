<?php

namespace App\Http\Controllers\Admin\Education;

use App\Http\Controllers\Controller;
use App\Http\Requests\Groups\CreateRequest;
use App\Http\Requests\Groups\EditRequest;
use App\Models\Education\Course;
use App\Models\Education\Group;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage-groups')->only('destroy');
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $groups = Group::all();

        return view('admin.groups.index', ['groups' => $groups]);
    }

    /**
     * @return Factory|View
     */

    public function create()
    {
        $teachers = User::getAllTeachers();
        $courses = Course::getAllCourses();

        return view('admin.groups.create', compact('teachers', 'courses'));
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        try {
            Group::add($request->all());
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.groups.index');
    }

    /**
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $teachers = User::getAllTeachers();
        $courses = Course::getAllCourses();
        $group = Group::find($id);

        return view('admin.groups.edit', compact('teachers', 'courses', 'group'));
    }

    /**
     * @param EditRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(EditRequest $request, $id)
    {
        $group = Group::find($id);

        try {
            $group->edit($request->all());
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.groups.index');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            Group::find($id)->delete();
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.groups.index');
    }
}
