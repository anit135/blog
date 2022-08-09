<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessComment;
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

        ProcessComment::dispatch($request->article_id, $request->title, $request->body_comment);

        return response()->json(['success' => 'Your message has been sent successfully']);
    }
}
