
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

            <?php 
            use App\Category;
            $data=Category::all();
            ?>
            @foreach ($data as $item)
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="{{url('/Product-by-menu/'.$item->id)}}">{{$item->category_name}}</a></h4>
                    </div>
                </div> 
            @endforeach
           
           
        </div><!--/category-products-->
    
        
    
        
        {{-- <div class="shipping text-center"><!--shipping-->
            <img src="{{asset('public/home')}}/images/home/shipping.jpg" alt="" />
        </div><!--/shipping--> --}}
    
    </div>
