<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body_comment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        Comment::create([
            'article_id' => $request->article_id,
            'title' => $request->title,
            'body_comment' => $request->body_comment
        ]);

        // return back();
        // return response()->json(['success' => 'Comment created successfully.']);
    }
}
