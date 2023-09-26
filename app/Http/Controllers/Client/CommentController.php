<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\CommentRequest;
use App\Models\Comment;
use App\Models\Elements\Art;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $commentableId) {

        $art = Art::find($commentableId);

        $comment = new Comment;
        $comment->text = $request->get('text');
        $comment->user_id = Auth::id();
        $art->comments()->save($comment);


        return redirect()->back();
    }
}
