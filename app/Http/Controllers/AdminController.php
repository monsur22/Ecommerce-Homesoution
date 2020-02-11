<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Orders;
use App\Payments;
use App\Shipping;
use App\Product;
use App\Order_details;
use App\User;
use App\Singup;

use DB;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
      $user=Singup::all()->count();
      $Product=Product::all()->count();
      $ActiveProduct=Product::where('status','=',1)->get()->count();
      // $user=Singup::all()->count();
      $Category=Category::all()->count();
        return view('admin.home.home_content',[
            'user'=>$user, 
           'Product'=>$Product, 
           'ActiveProduct'=>$ActiveProduct, 
           'Category'=>$Category, 
        ]);
    }
    public function category(){
        $data= Category::all();
        return view('admin.pages.category',[
           'data'=>$data, 
        
           
        ]);

    }

    public function category_add(Request $request){
        $data=new Category();
        if($request->hasFile('image')){
          $files = $request->file('image');
          $extension = $files->getClientOriginalExtension();
          $fileName = str_random(5) . "-" . date('his') . "-" . str_random(3) . "." . $extension;
          $folderpath = 'public/'.'Category_image/' . date('Y') . '/';
          $image_url = $folderpath . $fileName;
          $files->move($folderpath, $fileName);
          $data->image = $image_url;
    }
        $data->category_name=$request->category_name;
        $data->status=0;
        $data->save();
        return redirect()->back();
      }
      
      
      
   
      
      public function category_edit($id){
        $data = Category::find($id);
        return $data;
      }
      
      
      
      
      
      public function category_update(Request $request){
      
      
        $data= Category::find($request->id);
        if($request->hasFile('image')){
          $files = $request->file('image');
          $extension = $files->getClientOriginalExtension();
          $fileName = str_random(5) . "-" . date('his') . "-" . str_random(3) . "." . $extension;
          $folderpath = 'public/'.'Category_image/' . date('Y') . '/';
          $image_url = $folderpath . $fileName;
          $files->move($folderpath, $fileName);
          $data->image = $image_url;
    }
        $data->category_name=$request->category_name;
        $data->status=0;
        $data->save();
        return redirect()->back();
      
      
          
      }
      public function category_delete($id){
        $data=Category::find($id);
        $data->delete();
        return redirect()->back();
      }
      public function category_status_update($id){
        $status=Category::find($id);
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

      //////////post Create////////////
      public function all_post(){
        $category=Category::all();
        $data=Product::all();

        return view('admin.pages.post',[
            'category'=>$category,
            'data'=>$data,
        ]);

    }
    
    public function admin_post(Request $request){
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
    public function admin_edit($id){
      $data = Product::find($id);
      return $data;
    }
    public function admin_post_update(Request $request){
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
    public function allpost_status_update($id){
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
          public function allpost_delete ($id){
        $data=Product::find($id);
        $data->delete();
        return redirect()->back();
      }
    // public function mypost_add(Request $request){
    //     $data=new Cricketer();

    //     if($request->hasFile('image')){
    //     $files = $request->file('image');
    //     $extension = $files->getClientOriginalExtension();
    //     $fileName = str_random(5) . "-" . date('his') . "-" . str_random(3) . "." . $extension;
    //     $folderpath = 'public/'.'Cricketer/' . date('Y') . '/';
    //     $image_url = $folderpath . $fileName;
    //     $files->move($folderpath, $fileName);
    //     $data->image = $image_url;
    // }

 
    //     $data->category=$request->category;
    //     $data->Name=$request->Name;
    //     $data->end_time=$request->end_time;
    //     $data->start_value=$request->start_value;
    //     $data->status=0;
    //     // $data->user_id=Auth::user()->id;
    //     $data->save();
    //     return redirect()->back();

     
    //   }
      
    //   public function mypost_edit($id){
    //     $data = Cricketer::find($id);
    //     return $data;
    //   }
      
      
      
      
      
    //   public function mypost_update(Request $request){
    //     $data= Cricketer::find($request->id);
      
    //     if($request->hasFile('image')){
    //       $files = $request->file('image');
    //       $extension = $files->getClientOriginalExtension();
    //       $fileName = str_random(5) . "-" . date('his') . "-" . str_random(3) . "." . $extension;
    //       $folderpath = 'public/'.'Cricketer/' . date('Y') . '/';
    //       $image_url = $folderpath . $fileName;
    //       $files->move($folderpath, $fileName);
    //       $data->image = $image_url;
    //   }
  
   
    //       $data->category=$request->category;
    //       $data->Name=$request->Name;
    //       $data->end_time=$request->end_time;
    //       $data->start_value=$request->start_value;
    //       $data->status=0;
    //     $data->save();

    //         return redirect()->back();
    //     // return $data;
     
      
      
          
    //   }
    //   public function mypost_delete($id){
    //     $data=Cricketer::find($id);
    //     $data->delete();
    //     return redirect()->back();
    //   }
    //   public function mypost_status_update($id){
    //     $status=Cricketer::find($id);
    //     if ($status->status==1) {
    //       $status->status=0;
    //       $status->save();
    //     return redirect()->back();
          
    //     }else if($status->status==0){
    //       $status->status=1;
    //       $status->save();
    //     return redirect()->back();
          
    //     }
    //   }

      //order Details start from here
public function show(){
  $order_by_show= DB::table('orders')
      ->join('users', 'orders.customer_id', '=', 'users.id')
      ->join('payments', 'orders.id', '=', 'payments.order_id')
      ->select('orders.*','users.name','payments.payment_status','payments.payment_type')
      // ->where('order_details.user_id','=','users.id') 
      ->get();	
  $Order_by_post_id=Order_details::where('order_details.user_id','=','users.id')->get();         
      return view('admin.Order.order',[
        'order_by_show'=> $order_by_show,
        'Order_by_post_id'=> $Order_by_post_id
        ]);

        
}
public function ordershow($id){
      $order=Orders::find($id);
      $customer=User::find($order->customer_id);
      $shipping=Shipping::find($order->shipping_id);
      $payment=Payments::where('order_id',$order->id)->first();
      $orderdetails=Order_details::where('order_id',$order->id)->get();
return view('admin.Order.ordershow',[
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
     
return view('admin.Order.invoice',[
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
}
