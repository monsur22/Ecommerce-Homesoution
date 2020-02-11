@extends('Home.master')
@section('maincontent')
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                            @foreach ($category as $item)
                        <li><a href="{{url('/Product-by-menu/'.$item->id)}}">{{$item->category_name}}</a></li>
                                
                            @endforeach
                          
                        </ul>
                    </div>
                  
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{asset($data->image)}}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                 
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    {{-- <span>{{$data->image}}</span> --}}
                                    <h3>{{$data->Name}}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="pd-desc">
                                    <p>{{$data->description}}</p>
                                    <h4>${{$data->Price}}</h4>
                                </div>
                      

                                 <form action="{{ route('add-to-cart') }}" method="post">
                                    @csrf
                                <input type="hidden" name="id"value="{{ $data->id }}"/>
                                <input type="number" name="qty"value="1"min="1" />
                                <button type="submit" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>
                                </form>
                                
                                <ul class="pd-tags">
                                    <li><span>CATEGORIES</span>: 
                                        @foreach ($category as $item)
                                            @if($data->category==$item->id)
                                            {{$item->category_name}}
                                            @endif
                                        @endforeach 
                                    {{-- {{$data->category}} --}}
                                </li>
                                    <li><span>Product By</span>: 
                                        @foreach ($user as $item)
                                            @if($data->user_id==$item->id)
                                            {{$item->firstname}}
                                            @endif
                                        @endforeach 
                                </li>
                                </ul>
                                <div class="pd-share">
                                    {{-- <div class="p-code">Sku : 00012</div> --}}
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->


@endsection