<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessComment;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'article_id' => 'required',
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
