<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'comment_id',
        'name',
        'reply'
    ];
    protected static $reply;

    public static function addReply($request)
    {
        self::$reply = Auth::user();

        Reply::create([

            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'comment_id' => $request->commentId,
            'reply' => $request->reply,

        ]);
    }
}
