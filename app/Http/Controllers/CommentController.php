<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Http\Resources\Comment as CommentResources;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Article $article)
    {
        return response()->json(CommentResource::collection($article->comments), 200);
    }
    public function show(Article $article, Comment $comment)
    {
        $comment = $article->comments()->where('id', $comment->id)->findOrFail();
        return response()->json($comment, 200);
    }

    public function store(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $comment = $article->comments()->save(new Comment([$request->all()]));
        return response()->json($comment, 201);
    }
    public function update(Request $request, Comment $comment)
    {

    }
    public function delete(Request $request, Comment $comment)
    {

    }
}
