@extends('admin.master')
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
                                <th>Date</th>
                                <th>Order No.</th>
                                <th>Name</th>
                             
                                <th>Quantity</th>

                                <th>Total</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <?php $id=1;?>
                        <tbody>
                        @foreach($order_by_show as $order)
                        {{-- @foreach($order_by_show as $order) --}}
                            <tr>
                         <td>{{$id++}}</td>
                         <td>{{$order->order_date}}</td>
                         <td>LS{{$order->id}}</td>
                         <td>{{$order->name}}</td>
                         {{-- <td>{{$order->Phone}}</td> --}}
                         <td>{{$order->order_qty}}</td>
                         <td>{{$order->order_total}}</td>

                         <td>
                            @if($order->order_status==0)
                            <?php echo "Pending"?>
                            @elseif($order->order_status==1)
                            <?php echo "Delivery"?>
                            @endif
                        </td>
                         <td>{{$order->payment_type}}</td>
                           <td class="text-center">
                                     <!-- @if($order->order_status==0)
                                        <a href="{{route('admin_orderstatus',['id'=>$order->id])}}" class="btn btn-danger" title="Pending">
                                                <span class="fa fa-arrow-up"></span>
                                        </a>
                                        @elseif($order->order_status==1)
                                        <a href="{{route('admin_orderstatus',['id'=>$order->id])}}" class="btn btn-success" title="Delivery">
                                                <span class="fa fa-arrow-down"></span>
                                            </a>
                                        @endif -->

                                   <button  class="btn btn-success" ><a href="{{ url('/admin/order/show/'.$order->id) }}" target="_blank"><i class="fa fa-eye font-14"></i></a></button> 

                                  {{-- <button class="btn btn-warning" ><a href="{{ url('/order/invoice/'.$order->id) }}"target="_blank" ><i class="fa fa-print font-14"></i></a></button>              --}}
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