<?php

namespace App\Assistants\Posts;

use App\Http\Requests\Comments\CommentRequest;
use App\Http\Requests\Posts\CreateRequest;
use App\Http\Requests\Posts\EditRequest;
use App\Models\Comment;
use App\Models\Elements\Post;
use Auth;

class PostService
{
    public function create(CreateRequest $request): Post
    {
        $tags = explode(' ', $request->get('tags'));

        $post = Post::add($request->all());
        $post->uploadImage($request->file('image'));
        $post->setStatus($request->get('isDraft'));
//        $post->setSubcategory($request->get('subcategory_id'));
        $post->syncTags($tags);

        $post->clearCache();

        return $post;
    }

    public function edit(EditRequest $request, Post $post): void
    {
        $tags = explode(' ', $request->get('tags'));

        $post->edit($request->all());
        $post->uploadImage($request->file('image'));
        $post->setStatus($request->get('isDraft'));
        $post->syncTags($tags);

        $post->clearCache();
    }

    public function getTags(Post $post): string
    {
        $usedTags = '';
        foreach ($post->tags as $tag) {
            $usedTags .= $tag->name . ' ';
        }
        return $usedTags;
    }

    public function comment(CommentRequest $request, Post $post)
    {
        $comment = new Comment;
        $comment->text = $request->get('text');
        $comment->user_id = Auth::id();
        $post->comments()->save($comment);
    }
}
