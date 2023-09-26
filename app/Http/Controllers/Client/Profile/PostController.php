<?php

namespace App\Http\Controllers\Client\Profile;

use App\Assistants\Posts\PostService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\CreateRequest;
use App\Http\Requests\Posts\EditRequest;
use App\Models\Elements\Post;
use App\Models\Subcategory;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    private $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function create()
    {
        $user = Auth::user();
        $subcategories = Subcategory::getSubcategoriesTitles();
        $posts = Post::forUser($user)->orderByDesc('title')->paginate(20);

        return view('client.profile.posts.create', compact('user', 'subcategories', 'posts'));
    }

    public function store(CreateRequest $request)
    {
        try {
            $this->service->create($request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('own.profile');
    }

    public function edit(Post $post)
    {
        $this->checkAccess($post);

        $user = Auth::user();
        $subcategories = Subcategory::getSubcategoriesTitles();
        $usedTags = $this->service->getTags($post);

        return view('client.profile.posts.edit',
            compact('post', 'subcategories', 'usedTags', 'user'));
    }

    /**
     * @param EditRequest $request
     * @param Post $post
     * @return RedirectResponse
     */

    public function update(EditRequest $request, Post $post)
    {
        $this->checkAccess($post);

        try {
            $this->service->edit($request, $post);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('own.profile');
    }

    private function checkAccess(Post $post): void
    {
        if (!Gate::allows('manage-own-post', $post)) {
            abort(403);
        }
    }

}
