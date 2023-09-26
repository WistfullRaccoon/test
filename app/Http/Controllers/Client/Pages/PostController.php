<?php

namespace App\Http\Controllers\Client\Pages;

use App\Assistants\Posts\PostService;
use App\Events\HasViewed;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\CommentRequest;
use App\Models\Elements\Post;
use App\Models\Subcategory;
use Spatie\Tags\Tag;

class PostController extends Controller
{
    private $service;

    /**
     * @param PostService $service
     */

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $subcategories = Subcategory::all();
        $posts = Post::getPosts();

        return view('client.pages.posts.all_posts', compact('posts', 'subcategories'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $subcategories = Subcategory::all();
        $comments = $post->comments->all();

        event(new HasViewed($post));

        return view('client.pages.posts.single_post', compact('post','subcategories', 'comments'));
    }

    public function tag($id)
    {
        $subcategories = Subcategory::all();
        $tag = Tag::where('id', $id)->firstOrFail();
        $posts = Post::withAnyTags($tag->name)->paginate(9);

        return view('client.pages.posts.list', compact('posts', 'subcategories'));
    }

    public function subcategory($slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->firstOrFail();
        $subcategories = Subcategory::where('id', '!=', $subcategory->id)->get();;
        $posts = $subcategory->posts()->where('status', '!=', 'draft')->paginate(9);

        return view('client.pages.posts.list', compact('posts', 'subcategories'));
    }

    public function comment(CommentRequest $request, Post $post)
    {
        try {
            $this->service->comment($request, $post);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->back();
    }
}
