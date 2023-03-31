<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index(Client $client)
    {
        $comments = $client->comments()->whereNull('parent_id')->get();
        return view('clients.show', compact('client', 'comments'));
    }

    public function store(Request $request, Client $client)
    {
        $request->validate([
            'comment_text' => 'required|string|max:255',
        ]);

        $comment = new Comment([
            'comment_text' => $request->input('comment_text'),
        ]);
        $comment->doctor_id = Auth::guard('doctor')->user()->id;
        $comment->client_id = $client->id;
        $comment->save();

        return response()->json(['success' => true, 'comment' => $comment]);
}
}
