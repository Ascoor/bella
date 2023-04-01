<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CommentController extends Controller
{

    public function index(Client $client)
    {
        $comments = $client->comments()->whereNull('parent_id')->with('doctor', 'client', 'replies.client')->get();
        return view('clients.details_client', compact('client', 'comments'));
    }
    public function store(Request $request, $client_id)
{

        // Validate the request data
        $client = Client::find($client_id);



        $request->validate([
            'comment_text' => 'required|string|max:255',
            'doctor_id' => [
                'required',
                Rule::exists('doctors', 'id')->where(function ($query) {
                    $query->where('id', Auth::guard('doctor')->user()->id);
                })
            ],
        ]);

        $comment = new Comment([
            'comment_text' => $request->input('comment_text'),
        ]);
        $comment->doctor_id = Auth::guard('doctor')->user()->id;
        $comment->client_id = $client_id;

        // Save the comment to the database
        $comment->save();

        // Redirect back to the client details page with a success message
        return redirect()->back()->with('success', 'Comment added successfully.');
    }
    public function reply(Request $request, $comment_id)
    {
        // Validate the request data
        $comment = Comment::find($comment_id);

        $request->validate([
            'comment_text' => 'required|string|max:255',
            'doctor_id' => [
                'required',
                Rule::exists('doctors', 'id')->where(function ($query) {
                    $query->where('id', Auth::guard('doctor')->user()->id);
                })
            ],
        ]);

        $reply = new Comment([
            'comment_text' => $request->input('comment_text'),
        ]);
        $reply->doctor_id = Auth::guard('doctor')->user()->id;
        $reply->client_id = $comment->client_id;
        $reply->parent_id = $comment_id;

        // Save the reply to the database
        $reply->save();

        // Redirect back to the client details page with a success message
        return redirect()->back()->with('success', 'Reply added successfully.');
    }


}
