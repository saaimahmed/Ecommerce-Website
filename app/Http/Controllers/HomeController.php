<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    protected $usertype;
    protected $order;
    protected $total_revenue = 0;

    public function redirect()
    {
            $this->usertype = Auth::user()->usertype;

            if ($this->usertype == '1')
            {
                $this->order = Order::all();
                $this->total_revenue = 0;
                foreach ($this->order as $order)
                {
                    $this->total_revenue = $this->total_revenue + $order->price;
                }


                return view('admin.home.home',[
                    'totalProduct' => Product::all()->count(),
                    'totalOrder' => Order::all()->count(),
                    'totalUser' => User::all()->count(),
                    'totalRevenue' => $this->total_revenue,
                    'orderDelivered' => Order::where('delivery_status','=','delivered')->get()->count(),
                    'orderProcessng' => Order::where('delivery_status','=','Processing')->get()->count(),
                ]);
            }
            else
            {
                return view('front.home.home',[
                    'products' => Product::orderBy('id','DESC')->take(9)->get(),
                    'comments' => Comment::orderBy('id','DESC')->get(),
                    'replies' => Reply::orderBy('id','DESC')->get(),
                ]);
            }





    }


}
