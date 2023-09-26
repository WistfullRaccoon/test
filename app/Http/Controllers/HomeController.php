<?php

namespace App\Http\Controllers;

use App\Events\HasViewed;
use App\Models\Category;
use App\Models\Elements\Art;
use App\Models\Elements\Post;
use App\Models\Subcategory;
use Cache;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class HomeController extends Controller
{
    public function index()
    {
        $arts = Art::paginate(20);
        $categories = Category::all();

        return redirect()->route('arts.index');

        return view('client.index', compact('arts', 'categories'));
    }

    public function like($slug)
    {
        $art = Art::where('slug', $slug)->firstOrFail();
        event(new HasViewed($art));
    }
}
