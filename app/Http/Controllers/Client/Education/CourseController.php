<?php

namespace App\Http\Controllers\Client\Education;

use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 'active')->paginate(20);
        $subcategories = Subcategory::all();

        return view('client.pages.courses.all_courses', compact('courses', 'subcategories'));
    }

    public function show($slug)
    {
        $course= Course::where('slug', $slug)->firstOrFail();

        return view('client.pages.courses.single_course', ['course' => $course]);
    }

    public function subcategory($slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->firstOrFail();
        $subcategories = Subcategory::where('id', '!=', $subcategory->id)->get();
        $courses = $subcategory->courses()->paginate(9);

        return view('client.pages.courses.subcategory', compact('courses', 'subcategories'));
    }
}
