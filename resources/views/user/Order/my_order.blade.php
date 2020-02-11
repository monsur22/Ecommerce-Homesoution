@extends('user.master')
@section('content')
         
    <div class="ibox">
            <div class="ibox-head">
                    <div class="ibox-title"> Customer Order</div>
                </div>
            <div class="ibox-body">
                    <table  class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                {{-- <th>Date</th> --}}
                                <th>Date</th>
                                <th>Order No.</th>
                                
                             
                                <th>Shiping ID</th>

                                <th>Order Quantity</th>
                                <th>Total Cost</th>
                                {{-- <th>Status</th> --}}
                                
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <?php $id=1;?>
                        <tbody>
                        @foreach($dowanloadphotos as $order)
            
                            <tr>
                         <td>{{$id++}}</td>
                         <td>{{$order->order_date}}</td>
                         <td>LS{{$order->id}}</td>
                         {{-- <td>{{$order->order_date}}</td> --}}
                         <td>{{$order->shipping_id}}</td>
                         <td>{{$order->order_qty}}</td>
                         <td>{{$order->order_total}}</td>

                         {{-- <td>
                            @if($order->order_status==0)
                            ?php echo "Pending"?>
                            @elseif($order->order_status==1)
                            ?php echo "Delivery"?>
                            @endif
                        </td> --}}
                         {{-- <td>{{$order->payment_type}}</td> --}}
                           <td class="text-center">
                                     {{-- @if($order->order_status==0)
                                        <a href="{{route('orderstatus',['id'=>$order->id])}}" class="btn btn-danger" title="Pending">
                                                <span class="fa fa-arrow-up"></span>
                                        </a>
                                        @elseif($order->order_status==1)
                                        <a href="{{route('orderstatus',['id'=>$order->id])}}" class="btn btn-success" title="Delivery">
                                                <span class="fa fa-arrow-down"></span>
                                            </a>
                                        @endif --}}
                                      
                                        <a href="{{asset($order->product_url)}}" download class="btn btn-info" title="Download">
                                            <span class="fa fa-download"></span>
                                        </a>
                                      
                                   
                                        {{-- <i class="fa fa-download" aria-hidden="true"></i> --}}
                                   <button  class="btn btn-success" ><a href="{{ url('/order/show/'.$order->id) }}" target="_blank"><i class="fa fa-eye font-14"></i></a></button> 

                              </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
</div>   

{{-- <script type="text/javascript">
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
</script> --}}
    @endsection