<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Shipping;
use App\Payments;
use App\Order_details;
use App\Orders;
use Cart;
use Session;
use DateTime;
class CartController extends Controller
{

    public function addtocart(Request $request){
    	$products=Product::find($request->id);

    	Cart::add([
    		'id'=>$request->id,
    		'qty'=>$request->qty,
    		'name'=>$products->Name,
    		'price'=>$products->Price,
    		'weight'=>0,
    		'options' => [
                'image' => $products->image,
                'description' => $products->description,
                'user_id' => $products->user_id
              
    		]
    	]);
         
        return back()->withInput();
      

    }

    public function cartshow(){
    	$cartProduct=Cart::content();
        $cartCount=Cart::count();
    	return view('Home.check_out.check_out',[
            'cartProduct'=>$cartProduct,
            'cartCount'=>$cartCount,
        ]);
        // return $cartProduct;
    }
    public function delete($id){
    	Cart::remove($id);
        return redirect()->back();
    
    }
    public function update(Request $request){
         Cart::update($request->rowId, $request->qty);
         
            return redirect()->back();
    }

    public function checkout(){
        $cartProduct=Cart::content();
        $cartCount=Cart::count();
    	return view('Home.check_out.shiping',[
            'cartProduct'=>$cartProduct,
            'cartCount'=>$cartCount,
        ]);
    }

    //shiping info
    public function shipping_info_store(Request $request){
        $shipping= new Shipping();
        $shipping->name= $request->name;
        $shipping->phone= $request->phone;
     
        $shipping->email= $request->email;
        $shipping->address= $request->address;
        $shipping->message= $request->message;
        $shipping->save();

        Session::put('shippingId',$shipping->id);
        Session::put('shippingAddress',$shipping->address);
        return redirect('/payment');
        // return "save data";
}
public function payment(){


 return view('Home.check_out.payment');


}

//payment Controller
public function neworder(Request $request){
    

    $paymentType=$request->payment_type;
//     $shipping=Session::get('shippingEmail');

    if($paymentType=='Bkash'){
     $cartProducts= Cart::content();
     $current_date_time = new DateTime("now");
     $order=new Orders();
     $order->order_date=$current_date_time->format("Y-m-d");
     $order->customer_id=Session::get('id');
     $order->shipping_id=Session::get('shippingId');
     $order->order_total=Session::get('sum');
     $order->order_qty=Session::get('sumqty');
    //  $order->user_id=$cartProduct->options->user_id;
    foreach($cartProducts as $cartProduct){
        $order->user_id=$cartProduct->options->user_id;
        // $order->image=$cartProduct->options->image;
    }
     $order->save();

     $payment =new Payments();
     $payment->order_id=$order->id;
     $payment->payment_type=$paymentType;
     $payment->save();

     $cartProducts= Cart::content();
     foreach($cartProducts as $cartProduct){
          $orderDetail= new Order_details();
          $orderDetail->order_id=$order->id;
          $orderDetail->product_id= $cartProduct->id;
          $orderDetail->product_name=$cartProduct->name;
          $orderDetail->product_url=$cartProduct->options->image;
          $orderDetail->product_price=$cartProduct->price;
          $orderDetail->product_quantity=$cartProduct->qty;
          $orderDetail->user_id=$cartProduct->options->user_id;
          $orderDetail->customer_id=Session::get('id');
          $orderDetail->save();
     }
            
    }
    elseif($paymentType=='Roket'){
     $cartProducts= Cart::content();
     $current_date_time = new DateTime("now");
     $order=new Orders();
     $order->order_date=$current_date_time->format("Y-m-d");
     $order->customer_id=Session::get('id');
     $order->shipping_id=Session::get('shippingId');
     $order->order_total=Session::get('sum');
     $order->order_qty=Session::get('sumqty');
    //  $order->user_id=$cartProduct->options->user_id;
    foreach($cartProducts as $cartProduct){
        $order->user_id=$cartProduct->options->user_id;
        // $order->image=$cartProduct->options->image;
    }
     $order->save();

     $payment =new Payments();
     $payment->order_id=$order->id;
     $payment->payment_type=$paymentType;
     $payment->save();

     $cartProducts= Cart::content();
     foreach($cartProducts as $cartProduct){
          $orderDetail= new Order_details();
          $orderDetail->order_id=$order->id;
          $orderDetail->product_id= $cartProduct->id;
          $orderDetail->product_name=$cartProduct->name;
          $orderDetail->product_url=$cartProduct->options->image;
          $orderDetail->product_price=$cartProduct->price;
          $orderDetail->product_quantity=$cartProduct->qty;
          $orderDetail->user_id=$cartProduct->options->user_id;
          $orderDetail->customer_id=Session::get('id');
          $orderDetail->save();
     }
            
    }
   
    Session::put('orderId',$order->id);


    Cart::destroy();
     return redirect('/my-order')->with('confirm','confirm ');
}
}
