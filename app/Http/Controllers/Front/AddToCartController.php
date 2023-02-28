<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddToCartController extends Controller
{

//        Add to card
    protected $cart;
    protected $user;
    protected $product;
    protected $totalPrice = 0;
    protected  $cancelOrder;
    public function addCart(Request $request ,$id)
    {
        if (Auth::check())
        {
             Cart::saveCart($request , $id);


             Alert::success('Product Added successfully','We have added Product to the cart');
             return redirect()->back();
        }
        return redirect('login');


    }



//    show cart
    public function showCart()
    {
        if (Auth::id())
        {
            $this->user = Auth::user()->id;
            return view('front.product.cart',[
                'carts' => Cart::where('user_id','=',$this->user)->get(),

            ]);
        }
        else
        {
            return redirect('login');
        }


    }
//    remove cart
    public function removeCart($id)
    {
        $this->cartRemove = Cart::find($id);

        $this->cartRemove->delete();

        return redirect()->back();



    }

    public function showOrder()
    {
        if (Auth::check())
        {
            return view('front.order.showOrder',[
                'orders' => Order::where('user_id','=', Auth::user()->id )->get(),
            ]);

        }
        return redirect('login');
    }
    public function cancelOrder($id)
    {
        $this->cancelOrder = Order::find($id);
        $this->cancelOrder->delivery_status = 'Order cancel';
        $this->cancelOrder->save();
        return redirect()->back();
    }



}
