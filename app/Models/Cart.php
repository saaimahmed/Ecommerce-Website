<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\HttpFoundation\Session\Storage\save;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'product_id',
        'title',
        'image',
        'product_quality',
        'price',


    ];
    protected static $user;
    protected static $product;
    public static function saveCart($request ,$id)
    {
        self::$user    = Auth::user();
        self::$product = Product::find($id);


        Cart::create([
            'user_id'        => self::$user->id,
            'name'           => self::$user->name,
            'email'          => self::$user->email,
            'phone'          => self::$user->phone,
            'address'        => self::$user->address,

            'product_id'     => self::$product->product_id,
            'title'          => self::$product->title,
            'image'          => self::$product->image,
            'product_quality'=> $request->quantity,

            'price'          => self::$product->discount_price!=null ? self::$product->discount_price * $request->quantity : self::$product->price * $request->quantity,

        ]);

    }


}
