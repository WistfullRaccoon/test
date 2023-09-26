<?php

namespace App\Http\Controllers\Admin\Elements;

use App\Assistants\Posts\PostService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\CreateRequest;
use App\Http\Requests\Posts\EditRequest;
use App\Models\Elements\Post;
use App\Models\Subcategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * @return Factory|View
     */

    private $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * @return Factory|View
     */

    public function create()
    {
        $subcategories = Subcategory::getSubcategoriesTitles();

        return view('admin.posts.create', ['subcategories' => $subcategories]);
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */

    public function store(CreateRequest $request)
    {
//        (?<=\s|^)#(\w*[A-Za-z_]+\w*)

        try {
            $this->service->create($request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
        return redirect()->route('admin.posts.index');
    }

    /**
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
        $post = Post::find($id);
        $usedTags = '';
        foreach ($post->tags as $tag) {
            $usedTags .= $tag->name . ' ';
        }
        $subcategories = Subcategory::getSubcategoriesTitles();

        return view('admin.posts.edit', compact('post', 'subcategories', 'usedTags'));
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

        return redirect()->route('admin.posts.index');
    }

    /**
     * @param  int  $id
     * @return RedirectResponse
     */

    public function destroy($id)
    {
        Post::find($id)->remove();

        return redirect()->route('admin.posts.index');
    }

    public function toggleHidden($id)
    {
        Post::find($id)->toggleHidden();
        return redirect()->back();
    }

}
