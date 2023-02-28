<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentReplyController extends Controller
{
    //

    protected $comment;
    protected $search;
    protected $product;


//    search product

    public function addComment(Request $request)
    {
        if (Auth::check())
        {

            Comment::addComment($request);
            return redirect()->back();

        }
        return redirect('login');
    }

    public function addReply(Request $request)
    {
        if (Auth::check())
        {
            Reply::addReply($request);
            return redirect()->back();

        }
        return redirect('login');

    }
}
