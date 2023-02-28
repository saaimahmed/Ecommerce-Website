<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Notifications\SendEmailNotification;

use Illuminate\Http\Request;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use function League\Flysystem\Local\delete;
use function Symfony\Component\HttpKernel\HttpCache\save;

use Session;
use Stripe;

use PDF;

class OrderController extends Controller
{
    protected $user;
    protected $userId;
    protected $data;
    protected $order;

//    delete er valiable
    protected $cart_id;
    protected $cart;
//delevary status
  protected $deliveryStatus;

//  print pdf

protected $pdf;

//send email
protected  $sendEmail;



    public function cashOrder()
    {
        $this->userId = Auth::user()->id;
        $this->data = Cart::where('user_id','=',$this->userId)->get();

        foreach ($this->data as $data)
        {
            $this->order              = new Order();
//            1st = order table       =  Cart Table data
            $this->order->user_id     = $data->user_id;
            $this->order->name        = $data->name;
            $this->order->email       = $data->email;
            $this->order->phone       = $data->phone;
            $this->order->address     = $data->address;

            $this->order->product_id      = $data->product_id;
            $this->order->title           = $data->title;
            $this->order->product_quality = $data->product_quality;
            $this->order->price           = $data->price;
            $this->order->image           = $data->image;

//order table payment status
            $this->order->payment_status  ='cash on delivery';
            $this->order->delivery_status ='Processing';

            $this->order->save();

            $this->cart_id = $data->id;
            $this->cart = Cart::find($this->cart_id);
            $this->cart->delete();

        }

        return redirect()->back()->with('message','We Received Your Order. we will Connect with you');

    }

    public function stripe($totalprice)
    {
        return view('front.stripe.stripe',compact('totalprice'));
    }

    public function stripePost(Request $request ,$totalprice)
    {



        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


        Stripe\Charge::create ([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for Payment."
        ]);


        $this->userId = Auth::user()->id;
        $this->data = Cart::where('user_id','=',$this->userId)->get();

        foreach ($this->data as $data)
        {
            $this->order              = new Order();
//            1st = order table       =  Cart Table data
            $this->order->user_id     = $data->user_id;
            $this->order->name        = $data->name;
            $this->order->email       = $data->email;
            $this->order->phone       = $data->phone;
            $this->order->address     = $data->address;

            $this->order->product_id      = $data->product_id;
            $this->order->title           = $data->title;
            $this->order->product_quality = $data->product_quality;
            $this->order->price           = $data->price;
            $this->order->image           = $data->image;

//order table payment status
            $this->order->payment_status  ='paid';
            $this->order->delivery_status ='Processing';

            $this->order->save();

            $this->cart_id = $data->id;
            $this->cart = Cart::find($this->cart_id);
            $this->cart->delete();

        }


        Session::flash('success', 'Payment successful!');

        return back();
    }



    public function orderAdmin()
    {
        return view('admin.order.order',[
            'orders' => Order::orderBy('id','DESC')->get(),
        ]);
    }


//    delevary status change
    public function changeDeliveredStatus($id)
    {
        $this->deliveryStatus = Order::find($id);
        $this->deliveryStatus->delivery_status = 'delivered';
        $this->deliveryStatus->payment_status = 'paid';
        $this->deliveryStatus->save();
        return redirect()->back()->with('message','Delivered successfully done');


    }

//    print pdf
    public function printPdf($id)
    {
        $order = Order::find($id);
        $pdf = PDF::loadView('admin.print.print',['orders' => $order]);

        return $pdf->download('order_details.pdf');

    }

//    send Email
     public function sendEmail($id)
     {
         return view('admin.email.sendemail_info',[
             'order' => Order::find($id),
         ]);

     }

     public function sendUserEmail(Request $request , $id)
     {
         $this->sendEmail = Order::find($id);
         $details = [
             'greeting' => $request->greeting,

             'firstline' => $request->firstline,
             'body'      => $request->body,
             'button'    => $request->button,
             'url'       => $request->url,
             'lastline'  => $request->lastline,

         ];
          Notification::send($this->sendEmail ,new SendEmailNotification($details));
//         Notification::send($this->sendEmail ,new SendEmailNotification($details));
         return redirect()->back();
     }
}
