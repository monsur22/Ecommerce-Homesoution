@extends('user.master')
@section('content')

<div class="row">
    <div class="col-md-12">
<div class = "panel panel-default">
     
              <div class = "panel-body">
                <br>
           <h5 class="text-center">Customer Details</h5>
         </div>
         <table class = "table table-bordered">
          <tr>
               <td>Order ID</td>
               <td>LS{{$order->id}}</td>
            </tr>
            <tr>
               <td>Customer Name</td>
               <td>{{$customer->firstname}}</td>
            </tr>
            <tr>
               <td>Customer Phone</td>
               <td>{{$customer->Phone}}</td>
            </tr>
            <tr>
               <td>Customer Email</td>
               <td>{{$customer->email}}</td>
            </tr>
         </table>
      </div>   
  </div>

      <div class="col-md-12">
<div class = "panel panel-default">
     
              <div class = "panel-body">
                <br>
           <h5 class="text-center">Payment History</h5>
         </div>
         <table class = "table table-bordered">
            <tr>
               <td>Total Amount</td>
               <td>Tk. {{$order->order_total}}</td>
            </tr>
            <!--  <tr>
               <td>Pay Amount</td>
               <td>Tk. {{$payment->amount}}</td>
            </tr> -->
             <tr>
               <td>Pay Amount</td>
               <td>Tk. {{$order->order_total-$payment->amount}}</td>
            </tr>
         </table>
      </div>   
  </div>
       <div class="col-md-12">
<div class = "panel panel-default">
     
              <div class = "panel-body">
                <br>
           <h5 class="text-center">Customer Payment Info</h5>
         </div>
         <table class = "table table-bordered">
            <tr>
               <td>Payment Type</td>
               <td>{{$payment->payment_type}}</td>
            </tr>
            <tr>
               <td>Transaction NO.</td>
               <td>{{$payment->Transactionno}}</td>
            </tr>
            <tr>
               <td>Payment Amount.</td>
               <td>Tk.{{$payment->amount}}</td>
            </tr>
            <tr>
               <td>Pay Mobile No.</td>
               <td>{{$payment->phone}}</td>
            </tr>
            <tr>
               <td>Payment Status</td>
               <td>{{$payment->payment_status}}</td>
            </tr>
         </table>
      </div>   
  </div>
     <div class="col-md-12">
<div class = "panel panel-default">
     
              <div class = "panel-body">
                <br>
           <h5 class="text-center">Shipping Info</h5>
         </div>
         <table class = "table table-bordered">
            <tr>
               <td>Name</td>
               <td>{{$shipping->name}}</td>
            </tr>
            <tr>
               <td>Phone</td>
               <td>{{$shipping->phone}}</td>
            </tr>
            <tr>
               <td> Alternative Phone</td>
               <td>{{$shipping->altphone}}</td>
            </tr>
            <tr>
               <td>Town/City</td>
               <td>{{$shipping->town}}</td>
            </tr>
            <tr>
               <td>District</td>
               <td>{{$shipping->District}}</td>
            </tr>
            <tr>
               <td>Courier Name</td>
               <td>{{$shipping->cname}}</td>
            </tr>
            <tr>
               <td>Courier Address</td>
               <td>{{$shipping->zip}}</td>
            </tr>
             <tr>
               <td>Email</td>
               <td>{{$shipping->email}}</td>
            </tr>
             <tr>
               <td>Address</td>
               <td>{{$shipping->address}}</td>
            </tr>
         </table>
      </div>   
  </div>
     <div class="col-md-8">
<div class = "panel panel-default">
              <div class = "panel-body">
                <br>
           <h5 class="text-center">Order Details</h5>
         </div>
         <table class = "table table-bordered">
            <tr>
               <th>SL</th>
               <th>Product ID</th>
               <th>Product Name</th>
               <th>Product Price</th>
               <th>Product Quantity</th>
               <th>Total Price</th>
            </tr>
            <?php $sl=1;?>
            @foreach($orderdetails as $orderdetails)
            <tr>
                <td>{{$sl++}}</td>
                <td>{{$orderdetails->product_id}}</td>
                <td>{{$orderdetails->product_name}}</td>
                <td>{{$orderdetails->product_price}}</td>
                <td>{{$orderdetails->product_quantity}}</td>
                <td>{{$orderdetails->product_quantity*$orderdetails->product_price}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" style="text-align: center;">Total Amount</td>
                <td>Total.  {{$order->order_qty}}</td>
                <td>Tk. {{$order->order_total}}</td>
            </tr>
         </table>
      </div>
      <br>
  </div>
</div>
@endsection