<?php


namespace App\Assistants\Arts;

use App\Http\Requests\Comments\CommentRequest;
use App\Models\Comment;
use App\Models\Elements\Art;
use App\Http\Requests\Arts\CreateRequest;
use App\Http\Requests\Arts\EditRequest;
use Auth;

class ArtService
{
    public function create(CreateRequest $request)
    {
        $tags = explode(' ', $request->get('tags'));

        $art = Art::add($request->all());
        $art->uploadImage($request->file('image'));
        $art->syncTags($tags);

        $art->clearCache();

        return $art;
    }

    public function edit(EditRequest $request, Art $art)
    {
        $tags = explode(' ', $request->get('tags'));

        $art->edit($request->all());
        $art->uploadImage($request->file('image'));
        $art->syncTags($tags);

        $art->clearCache();

        return $art;
    }

    public function getTags(Art $art): string
    {
        $usedTags = '';
        foreach ($art->tags as $tag) {
            $usedTags .= $tag->name . ' ';
        }
        return $usedTags;
    }

    public function comment(CommentRequest $request, Art $art)
    {
        $comment = new Comment;
        $comment->text = $request->get('text');
        $comment->user_id = Auth::id();
        $art->comments()->save($comment);
    }
}
