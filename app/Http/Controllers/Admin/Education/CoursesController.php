<?php

namespace App\Http\Controllers\Admin\Education;

use App\Assistants\Course\CourseService;
use App\Http\Requests\Courses\EditRequest;
use App\Models\Education\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\Courses\CreateRequest;
use App\Models\Subcategory;
use App\Models\User;
use Cviebrock\EloquentSluggable\Tests\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CoursesController extends Controller
{

    private $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Factory|View
     */

    public function index()
    {
        $courses = Course::all();

        return view('admin.courses.index', ['courses' => $courses]);
    }

    /**
     * @return Factory|View
     */

    public function create()
    {
        $subcategories = Subcategory::getSubcategoriesTitles();

        return view('admin.courses.create', compact('subcategories'));
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */

    public function store(CreateRequest $request)
    {
        try {
            $this->service->create($request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }


        return redirect()->route('admin.courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        $subcategories = Subcategory::getSubcategoriesTitles();
        $course = Course::find($id);

        return view('admin.courses.edit', compact('subcategories', 'course'));
    }

    /**
     * @param EditRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(EditRequest $request, $id)
    {
        try {
            $this->service->edit($request, $id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.courses.index');
    }

    /**
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Course::find($id)->remove();
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.courses.index');
    }
}
