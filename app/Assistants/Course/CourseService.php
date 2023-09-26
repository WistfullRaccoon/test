<?php

namespace App\Assistants\Course;

use App\Models\Education\Course;
use App\Http\Requests\Courses\CreateRequest;
use App\Http\Requests\Courses\EditRequest;
use Illuminate\Http\Request;

class CourseService
{
    public function create(CreateRequest $request): Course
    {
        $course = Course::add($request->all());
        $course->uploadImage($request->file('image'));

        return $course;
    }

    public function edit(EditRequest $request, $id): void
    {
        $course = Course::find($id);
        $course->edit($request->all());
        $course->uploadImage($request->file('image'));
    }
}
