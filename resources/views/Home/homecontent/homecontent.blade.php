@extends('Home.master')
@section('maincontent')

<div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            @foreach ($category as $item)
            <div class="col-lg-4">
                <div class="single-banner">
                    {{-- <img src="{{asset('public/home')}}/img/banner-1.jpg" alt=""> --}}
                  
                    <img src="{{ asset($item->image) }}" alt="" height="300px"width="480px">
                    <div class="inner-text">
                        <a href="{{url('/Product-by-menu/'.$item->id)}}">
                            <h4>{{$item->category_name}}</h4>

                        </a>
                    </div>
                </div>
            </div>  
            @endforeach
         

        </div>
    </div>
</div>
<!-- Banner Section End -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
         
            <div class="col-lg-12 order-1 order-lg-2">
                <div class="filter-control">
                    <ul>
                        <li class="active">All  Product</li>
                  
                    </ul>
                </div>
                <div class="product-list">
                    <div class="row">
                        @foreach ($data as $item)
                            <div class="col-lg-3 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <a href="{{url('/details/'.$item->id)}}">
                                            <img src="{{ asset($item->image) }}" alt="" height="303px"width="270px">

                                        </a>
                                        
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <form action="{{ route('add-to-cart') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id"value="{{ $item->id }}"/>
                                                <input type="hidden" name="qty"value="1"min="1" />
                                     
                                                <button type="submit" class=" w-icon active">
                                                    <i class="fa fa-shopping-cart"></i>
                                                 Add to cart
                                                </button>
                        
                                            <li class="w-icon active"><a href="{{url('/details/'.$item->id)}}"> View<i class="icon_bag_alt"></i></a></li>

                                            {{-- <li class="quick-view"><a href="{{url('/details/'.$item->id)}}">+ Quick View</a></li> --}}

                                       </form>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        {{-- <div class="catagory-name">{{ asset($item->image) }}</div> --}}
                                        <a href="#">
                                            <h5>{{ $item->Name }}</h5>
                                        </a>
                                        <div class="product-price">
                                            ${{ $item->Price }}
                                            {{-- <span>$35.00</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                
                    </div>
                </div>

                {{-- <div class="loading-more">
                    <i class="icon_loading"></i>
                    <a href="#">
                        Loading More
                    </a>
                </div> --}}

            </div>
        </div>
    </div>
</section>
<!-- Women Banner Section Begin -->

<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="{{asset('public/home')}}/img/products/photo-1572357280636-1a2c2c26acdc.jpg">
                    <h2>Newest Item</h2>
                    <a href="#">Discover New</a>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                        <li class="active">Newest Product</li>
                  
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    @foreach ($Newest_item as $item)
                        <div class="product-item">
                            <div class="pi-pic">
                                <a href="{{url('/details/'.$item->id)}}">
                                    <img src="{{ asset($item->image) }}" alt="" height="303px"width="270px">

                                </a>
                                
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <form action="{{ route('add-to-cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id"value="{{ $item->id }}"/>
                                        <input type="hidden" name="qty"value="1"min="1" />
                             
                                        <button type="submit" class=" w-icon active">
                                            <i class="fa fa-shopping-cart"></i>
                                         Add to cart
                                        </button>
                
                                    <li class="w-icon active"><a href="{{url('/details/'.$item->id)}}"> View<i class="icon_bag_alt"></i></a></li>

                                    {{-- <li class="quick-view"><a href="{{url('/details/'.$item->id)}}">+ Quick View</a></li> --}}

                               </form>
                                </ul>
                            </div>
                            <div class="pi-text">
                                {{-- <div class="catagory-name">{{ asset($item->image) }}</div> --}}
                                <a href="#">
                                    <h5>{{ $item->Name }}</h5>
                                </a>
                                <div class="product-price">
                                    ${{ $item->Price }}
                                    {{-- <span>$35.00</span> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
               
                 
                 
                  
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Women Banner Section End -->

<!-- Partner Logo Section Begin -->
<div class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{asset('public/home')}}/img/logo-carousel/logo-1.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{asset('public/home')}}/img/logo-carousel/logo-2.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{asset('public/home')}}/img/logo-carousel/logo-3.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{asset('public/home')}}/img/logo-carousel/logo-4.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{asset('public/home')}}/img/logo-carousel/logo-5.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection