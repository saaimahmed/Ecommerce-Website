<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected static $product;

    public static function createProduct($request)
    {
        self::$product                    = new Product();
        self::$product->category_id       = $request->category_id;
        self::$product->user_id           = $request->user_id;
        self::$product->title             = $request->title;
        self::$product->description       = $request->description;
        self::$product->price             = $request->price;
        self::$product->discount_price    = $request->discount_price;
        self::$product->product_quality   = $request->product_quality;
        self::$product->image             = Helper::uploadImage($request->file('image'),'admin-assets/img/product/');
        self::$product->save();
    }

    public static function updateProduct($request ,$id)
    {

        self::$product                    = Product::find($id);
        self::$product->category_id       = $request->category_id;
        self::$product->title             = $request->title;
        self::$product->description       = $request->description;
        self::$product->price             = $request->price;
        self::$product->discount_price    = $request->discount_price;
        self::$product->product_quality   = $request->product_quality;
        self::$product->image             = Helper::uploadImage($request->file('image'),'admin-assets/img/product/',isset($id) ? Product::find($id)->image:null);
        self::$product->save();
    }


}
