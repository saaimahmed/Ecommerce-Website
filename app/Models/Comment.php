<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'name',
        'comment',
    ];

    protected static $user;

    public static function addComment($request)
    {
        self::$user = Auth::user();

        Comment::create([
            'user_id' => self::$user->id,
            'name' => self::$user->name,
            'comment' => $request->comment,
        ]);
    }
}
