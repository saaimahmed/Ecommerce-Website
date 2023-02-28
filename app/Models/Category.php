<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected static $category;

    public static function createCategory($request)
    {
        self::$category = new Category();
        self::$category->category_name = $request->category_name;
        self::$category->save();
    }

    public static function updateCategory($request ,$id)
    {
        self::$category = Category::find($id);
        self::$category->category_name = $request->category_name;
        self::$category->save();
    }
}
