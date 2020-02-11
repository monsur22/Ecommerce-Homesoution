@extends('Home.master')
@section('maincontent')

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
               
             
                    <div class="product-list">
                        <div class="row">
                            @foreach ($Product_by_menu as $item)
                                <div class="col-lg-4 col-sm-6">
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
             
           
            </div>
        </div>
    </div>
</section>
@endsection