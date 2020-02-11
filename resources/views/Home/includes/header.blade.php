
<?php 
use App\Controller;
use Illuminate\Http\Request;

use App\Category;
$category=Category::where('status','=',1)->get();
?>
<header class="header-section">
  <div class="header-top">
      <div class="container">
          <div class="ht-left">
              <div class="mail-service">
                  <i class=" fa fa-envelope"></i>
                  hello@gmail.com
              </div>
              <div class="phone-service">
                  <i class=" fa fa-phone"></i>
                  +65 11.188.888
              </div>
          </div>
          <div class="ht-right">
            @if (Session('user_role') == 'admin')
            <a href="{{url('/Logout')}}" class="login-panel">Logout</a>
            <a href="{{url('/admin')}}" class="login-panel"><i class="fa fa-user"></i>{{Session('firstname')}}</a>

            @elseif ( Session('user_role') == 'user')
            <a href="{{url('/Logout')}}" class="login-panel">Logout</a>
            <a href="{{url('/user')}}" class="login-panel"><i class="fa fa-user"></i>{{Session('firstname')}}</a>

            @else
              <a href="{{url('/login')}}" class="login-panel"><i class="fa fa-user"></i>Login</a>
            @endif
              <div class="top-social">
                  <a href="#"><i class="ti-facebook"></i></a>
                  <a href="#"><i class="ti-twitter-alt"></i></a>
                  <a href="#"><i class="ti-linkedin"></i></a>
                  <a href="#"><i class="ti-pinterest"></i></a>
              </div>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="inner-header">
          <div class="row">
              <div class="col-lg-2 col-md-2">
                  <div class="logo">
                      <a href="{{url('/')}}">
                          <img src="{{asset('public/home')}}/img/83934620_205368387258153_576673387544313856_n.png" alt="" height="50px"width="88px">
                      </a>
                  </div>
              </div>
              <div class="col-lg-7 col-md-7">
 
              </div>
              <div class="col-lg-3 text-right col-md-3">
                  <ul class="nav-right">
                      {{-- <li class="heart-icon">
                          <a href="#">
                              <i class="icon_heart_alt"></i>
                              <span>1</span>
                          </a>
                      </li> --}}
                      <li class="cart-icon">
                          <a href="#">
                              <i class="icon_bag_alt"></i>
                              <span>{{Cart::count()}}</span>
                          </a>
                          <div class="cart-hover">
                              {{-- <div class="select-items">
                                  <table>
                         
                                @foreach($cartProduct as $CartProduct)
                                      <tbody>
                                          <tr>
                                              <td class="si-pic"><img src="{{ asset($CartProduct->options->image) }}" alt=""></td>
                                              <td class="si-text">
                                                  <div class="product-selected">
                                                      <p>${{ $CartProduct->price }} x {{$CartProduct->qty}}</p>
                                                      <h6>{{ $CartProduct->name }}</h6>
                                                  </div>
                                              </td>
                                              <td class="si-close">
                                                  <i class="ti-close"></i>
                                              </td>
                                          </tr>
                                      
                                      </tbody>
                                @endforeach
                                  </table>
                              </div>
                              <div class="select-total">
                                  <span>total:</span>
                                  <h5>$120.00</h5>
                              </div> --}}
                              <div class="select-button">
                                  <a href="{{url('/cart')}}" class="primary-btn view-card">VIEW CARD</a>
                                  <a href="{{url('/checkout')}}" class="primary-btn checkout-btn">CHECK OUT</a>
                              </div>
                          </div>
                      </li>
                      <li class="cart-price">${{Session::get('sum')}}</li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
  <div class="nav-item">
      <div class="container">
          
          <div class="nav-depart">
              <div class="depart-btn">
                  <i class="ti-menu"></i>
                  <span>All departments</span>
                  <ul class="depart-hover">
                      @foreach ($category as $item)
                  <li><a href="{{url('/Product-by-menu/'.$item->id)}}">{{$item->category_name}}</a></li>
                          
                      @endforeach
                  
                  </ul>
              </div>
          </div>
          <nav class="nav-menu mobile-menu">
              <ul>
                  <li class="active"><a href="{{url('/')}}">Home</a></li>
                  {{-- <li><a href="./shop.html">Shop</a></li> --}}
                  {{-- <li><a href="#">Collection</a>
                      <ul class="dropdown">
                          <li><a href="#">Men's</a></li>
                          <li><a href="#">Women's</a></li>
                          <li><a href="#">Kid's</a></li>
                      </ul>
                  </li> --}}
                  {{-- <li><a href="./blog.html">Blog</a></li> --}}
                  <li><a href="{{url('/Faq')}}">FAQ</a></li>
                  <li><a href="{{url('/contact')}}">Contact</a></li>
                  <li><a href="{{url('/about')}}">About us</a></li>
                  {{-- <li><a href="#">Pages</a>
                      <ul class="dropdown">
                          <li><a href="./blog-details.html">Blog Details</a></li>
                          <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                          <li><a href="./check-out.html">Checkout</a></li>
                          <li><a href="./faq.html">Faq</a></li>
                          <li><a href="./register.html">Register</a></li>
                          <li><a href="./login.html">Login</a></li>
                      </ul>
                  </li> --}}
              </ul>
          </nav>
          <div id="mobile-menu-wrap"></div>
      </div>
  </div>
</header>