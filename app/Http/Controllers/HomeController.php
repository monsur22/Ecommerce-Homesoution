<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\AdaptPost;
use DB;
use App\User;
use App\RequestPost;
use App\Product;
use App\Singup;
use App\Order_details;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
    //   $this->middleware(['auth', 'verified'])->except('index');


    }
 
    public function index()
    {
        $data=Product::orderBy('id', 'desc')->where('status','=',1)->get();
        // $data=Product::orderBy('id', 'desc')->where('status','=',1)->where('user_id','!=',Session('id'))->take(9)->get();
        $Newest_item=Product::orderBy('id', 'desc')->where('status','=',1)->take(5)->get();
        $user=Singup::all();
        $order=Order_details::all();
        $category=Category::where('status','=',1)->take(3)->get();
        return view('Home.homecontent.homecontent',[
            'data'=>$data,
            'Newest_item'=>$Newest_item,
            'user'=>$user,
            'order'=>$order,
            'category'=>$category,
        ]);

    }
//  public function details(){
//     $data=Product::where('status','=',1)->get();
//     return view('Home.pages.details',[
//         // 'data'=>$data,
//         // 'Newest_item'=>$Newest_item,
//     ]);
//  }
 public function Product_by_menu($id){
    $category=Category::all();
    $data=Product::all();
    $user=Singup::all();
    $order=Order_details::all();
    $Product_by_menu= DB::table('products')
                        ->join('categories', 'products.category', '=', 'categories.id')
                        ->select('products.*', 'categories.category_name')  
                        ->where('products.category',$id)
                        ->where('products.status',1)
                        ->get();
    return view('Home.pages.Product_by_menu',[
        'data'=>$data,
        'Product_by_menu'=>$Product_by_menu,
        'category'=>$category,
        'user'=>$user,
        'order'=>$order,


    ]);

}


public function details_by_id($id){
    $category=Category::where('status','=',1)->get();
    $data = Product::find($id);
    // $user=User::all();
    $user=Singup::all();
    return view('Home.pages.details',[
        'data'=>$data,
        'category'=>$category,
        'user'=>$user,

    ]);
}
// public function details_by_id(){
//     // $category=Category::all();
//     // $data = Product::find();
//     // // $user=User::all();
//     // $user=Singup::all();
//     return view('Home.pages.details',[
//         // 'data'=>$data,
//         // 'category'=>$category,
//         // 'user'=>$user,

//     ]);
// }
public function contact(){
    return view('Home.pages.contact');
}
public function faq(){
    return view('Home.pages.faq');
}
public function about(){
    return view('Home.pages.about');
}


}
