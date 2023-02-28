<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Reply;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    protected $user;
    protected $product;
    protected $cart;
    protected $cartRemove;
    public function index()
    {
        return view('front.home.home',[
            'products' => Product::orderBy('id','DESC')->take(9)->get(),
            'comments' => Comment::orderBy('id','DESC')->get(),
            'replies' => Reply::orderBy('id','DESC')->get(),
        ]);
    }

    public function about()
    {
        return view('front.about.about');
    }

    public function product()
    {

        return view('front.product.product',[
            'products' => Product::orderBy('id','DESC')->get(),

        ]);
    }

    public function blog()
    {
        return view('front.blog.blog');
    }
     public function contact()
     {
        return view('front.contact.contact');
     }


//     product Details page
    public function productDetails($id)
    {
        return view('front.product.detail',[
            'product' => Product::find($id),
        ]);
    }

}
