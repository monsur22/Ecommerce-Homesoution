<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\RequestPost;
use App\User;
use App\Orders;
use App\Payments;
use App\Shipping;
use App\Order_details;
use App\Singup;
use DB;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
       
    }
    public function index(){
          $Product=Product::where('user_id','=',Session('id'))->get()->count();
          $ActiveProduct=Product::where('user_id','=',Session('id'))->where('status','=',1)->get()->count();
          $Product=Product::where('user_id','=',Session('id'))->get()->count();
          $dowanloadphotos= DB::table('order_details')
                        ->join('orders', 'order_details.order_id', '=', 'orders.id')
                        ->select('order_details.*', 'orders.id','orders.order_date','orders.shipping_id','orders.order_qty','orders.order_total')  
                        ->where('order_details.customer_id',Session('id'))
                        // ->where('products.status',1)
                        ->get()->count();

      $order_by_show= DB::table('orders')
                    ->join('users', 'orders.customer_id', '=', 'users.id')
                    ->join('payments', 'orders.id', '=', 'payments.order_id')
                    ->select('orders.*','users.name','payments.payment_status','payments.payment_type')
                    // ->where(Auth::user()->id,'order_details.user_id') 
                    ->where('orders.user_id',Session('id'))
                    ->get()->count();  
        return view('user.home.home_content',[
          
           'Product'=>$Product, 
           'ActiveProduct'=>$ActiveProduct, 
           'dowanloadphotos'=>$dowanloadphotos,
           'order_by_show'=>$order_by_show
        ]);
    }

    public function mypost(){
        $category=Category::all();
        $data=Product::where('user_id','=',Session('id'))->get();

        return view('user.pages.mypost',[
            'category'=>$category,
            'data'=>$data,
        ]);

    }
    public function mypost_add(Request $request){
        $data=new Product();

        if($request->hasFile('image')){
        $files = $request->file('image');
        $extension = $files->getClientOriginalExtension();
        $fileName = str_random(5) . "-" . date('his') . "-" . str_random(3) . "." . $extension;
        $folderpath = 'public/'.'Product_image/' . date('Y') . '/';
        $image_url = $folderpath . $fileName;
        $files->move($folderpath, $fileName);
        $data->image = $image_url;
    }

 
        $data->category=$request->category;
        $data->Name=$request->Name;
        $data->Price=$request->Price;
        $data->productuniq_id=$request->productuniq_id;
        $data->description=$request->description;
        $data->status=0;
        $data->user_id=Session('id');
        $data->save();
        return redirect()->back();

        // return $data;
      }
      
      public function mypost_edit($id){
        $data = Product::find($id);
        return $data;
      }
      
      
      
      
      
      public function mypost_update(Request $request){
        $data= Product::find($request->id);
      
        if($request->hasFile('image')){
            $files = $request->file('image');
            $extension = $files->getClientOriginalExtension();
            $fileName = str_random(5) . "-" . date('his') . "-" . str_random(3) . "." . $extension;
            $folderpath = 'public/'.'Product_image/' . date('Y') . '/';
            $image_url = $folderpath . $fileName;
            $files->move($folderpath, $fileName);
            $data->image = $image_url;
        }
    
     
        $data->category=$request->category;
        $data->Name=$request->Name;
        $data->productuniq_id=$request->productuniq_id;

        $data->Price=$request->Price;
        $data->description=$request->description;
        $data->status=0;
        $data->user_id=Session('id');
        $data->save();
        return redirect()->back();
        // return $data;
     
      
      
          
      }
      public function mypost_delete($id){
        $data=Product::find($id);
        $data->delete();
        return redirect()->back();
      }
      public function mypost_status_update($id){
        $status=Product::find($id);
        if ($status->status==1) {
          $status->status=0;
          $status->save();
        return redirect()->back();
          
        }else if($status->status==0){
          $status->status=1;
          $status->save();
        return redirect()->back();
          
        }
      }

//order Details start from here
public function show(){
  $order_by_show= DB::table('orders')
      ->join('users', 'orders.customer_id', '=', 'users.id')
      ->join('payments', 'orders.id', '=', 'payments.order_id')
      ->select('orders.*','users.name','payments.payment_status','payments.payment_type')
      // ->where(Auth::user()->id,'order_details.user_id') 
      ->where('orders.user_id',Session('id'))
      ->get();	
  $Order_by_post_id=Order_details::where('user_id','=',Session('id'))->get();         
      return view('user.Order.order',[
        'order_by_show'=> $order_by_show,
        'Order_by_post_id'=> $Order_by_post_id
        ]);

        
}
public function ordershow($id){
      $order=Orders::find($id);
      $customer=Singup::find($order->customer_id);
      $shipping=Shipping::find($order->shipping_id);
      $payment=Payments::where('order_id',$order->id)->first();
      $orderdetails=Order_details::where('order_id',$order->id)->get();
return view('user.Order.ordershow',[
          'customer'=>$customer,
          'shipping'=>$shipping,
          'payment'=>$payment,
          'orderdetails'=>$orderdetails,
          'order'=>$order
]);
}

public function orderinvoice($id){
  $order=Orders::find($id);
  $company=Company::all();
      $customer=Customer::find($order->customer_id);
      $shipping=Shipping::find($order->shipping_id);
      $payment=Payments::where('order_id',$order->id)->first();
      $orderdetails=Order_details::where('order_id',$order->id)->get();
     
return view('user.Order.invoice',[
         'customer'=>$customer,
          'shipping'=>$shipping,
          'payment'=>$payment,
          'orderdetails'=>$orderdetails,
           'order'=>$order,
           'company'=>$company
]);
}

public function orderstatus($id){
    $order_status= Orders::find($id);
    if ($order_status->order_status==0) {
      $order_status->order_status=1;
      $order_status->save();
      return redirect('/order');
    }else if($order_status->order_status==1){
      $order_status->order_status=0;
      $order_status->save();
      return redirect('/order');
    }  
  }


  public function my_order(){
    // $orders=Orders::all()->where('customer_id',Session('id'));
    // $data=Product::all();
    // $order_by_show= DB::table('order_details')
    //                     ->join('orders', 'order_details.order_id', '=', 'orders.id')
    //                     ->select('order_details.*', 'orders.customer_id')  
    //                     ->where('order_details.user_id',Auth::user()->id)
    //                     // ->where('products.status',1)
    //                     ->get();


  $dowanloadphotos= DB::table('order_details')
                        ->join('orders', 'order_details.order_id', '=', 'orders.id')
                        ->select('order_details.*', 'orders.id','orders.order_date','orders.shipping_id','orders.order_qty','orders.order_total')  
                        ->where('order_details.customer_id',Session('id'))
                        // ->where('products.status',1)
                        ->get();
    return view('user.Order.my_order',[
      // 'orders'=> $orders,
      'dowanloadphotos'=> $dowanloadphotos,

    ]);
    // return $dowanloadphotos;
  }
}
