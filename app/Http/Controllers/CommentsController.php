<?php

namespace Http\Controllers;

use App\Mail;
use App\Post;
use App\User;
use Auth;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $postId)
    {
        if (Auth::check()) {
            #dd(request()->body);
            $this->validate(request(), ['body' => 'required|min:2']);

            $postId->addComment(request('body'), Auth::user()->id);

            $toMail    = $postId->user()->first()->email;
            $toName    = $postId->user()->first()->email;
            $fromName  = User::find(Auth::user()->id)->name;
            $postTitle = $postId->title;
            $url       = 'http://' . request()->server('SERVER_NAME') . '/posts/' . $postId->id;

            $data = compact('toMail', 'toName', 'fromName', 'postTitle', 'url');

            \Mail::to($toMail)->send(new Mail\NewComment($data));

            session()->flash('message', 'Comment added successfully');

            return back();
        }

        //if not loggen in create an error!!!
        return back()->withErrors('Can not comment if not loged in');
    }
}
