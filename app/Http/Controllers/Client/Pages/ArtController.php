<?php

namespace App\Http\Controllers\Client\Pages;

use App\Assistants\Arts\ArtService;
use App\Events\HasViewed;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\CommentRequest;
use App\Models\Elements\Art;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;
use Storage;

class ArtController extends Controller
{
    private $service;

    /**
     * @param ArtService $service
     */

    public function __construct(ArtService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $subcategories = Subcategory::forCategory(1)->get();
        $arts = Art::paginate(20);
        return view('client.pages.arts.all_arts', compact('arts', 'subcategories', 'file'));
    }

    public function show($slug)
    {
        $subcategories = Subcategory::forCategory(1)->get();
        $art = Art::where('slug', $slug)->firstOrFail();
        $authorArts = Art::forUser($art->author)->whereNotIn('id', [$art->id])->limit(10)->get();
        $sameArts = $art->getSameArts();
        $comments = $art->comments->all();

        event(new HasViewed($art));

        return view('client.pages.arts.single_art',
            compact('art', 'authorArts', 'subcategories', 'sameArts', 'comments'));
    }

    public function subcategory($slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->firstOrFail();
        $subcategories = Subcategory::forCategory(1)->where('id', '!=', $subcategory->id)->get();
        $arts = $subcategory->arts()->paginate(10);

        return view('client.pages.arts.category', compact('arts', 'subcategories'));
    }

    public function tag($id)
    {
        $subcategories = Subcategory::forCategory(1)->get();
        $tag = Tag::where('id', $id)->firstOrFail();
        $arts = Art::withAnyTags($tag->name)->paginate(10);

        return view('client.pages.arts.tag', compact('arts', 'subcategories'));
    }

    public function comment(CommentRequest $request, Art $art)
    {
        try {
            $this->service->comment($request, $art);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->back();
    }

    public function like($slug)
    {
        Art::where('slug', $slug)->increment('likes');
        return redirect()->back();
    }
}
