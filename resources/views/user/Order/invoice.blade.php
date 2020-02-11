@extends('user.master')

@section('content')
    <style>
        @media print{
            .header{
                display: none;
            }
            .page-sidebar{
                display: none;
            }
            .page-content{
                margin: 0px;
                padding: 0px;
            }
            .content-wrapper{
                margin: 0px;
                padding: 0px;
            }
            .page-footer{
                display: none;
            }

        }
    </style>
    <div class="container">
        <div class="page-content">
            <div class="ibox invoice">
                <div class="invoice-header" >
                    <div class="row">
                        <div class="col-12 text-center" style="font-size: 17px;">
                                  @foreach($company as $company)
                                <div class="m-b-5 font-bold">{{$company->companyname}}</div>
                                <h6>{{$company->companyaddress}}</h6>
                                <span>{{$company->companyemail}}</span>
                                <h6>{{$company->companyweb}}</h6>
                                <h6>{{$company->companymobile}} </h6>
                            </li>
                                 @endforeach
                        </div>
                        <br>
                        <div class="col-6">
                            <h6>
    
                                    <toppadding><strong>Invoice Date: </strong>{{$order->order_date}} &nbsp;
                                    </toppadding>
                                    <br><strong>Invoice No: </strong>LS{{$order->id}} &nbsp;</h6>
                     <div>Name: {{$customer->Username}}</div>
                     <div>Phone: {{$customer->Phone}}</div>
                     <div>Email: {{$customer->Email}}</div>
                        </div>
                        <div class="col-6 text-right">
                            <div>
                                <div class="m-b-5 font-bold">Invoice To</div>
                        
                                    <div>Name: {{$shipping->name}}</div>
                                    <ul class="list-unstyled m-t-10">
                                     <li class="m-b-5">Mobile: {{$shipping->phone}} {{$shipping->altphone}}</li>
                                    <li class="m-b-5">Email: {{$shipping->email}}</li>
                                    <li class="m-b-5">Courier Name: {{$shipping->cname}}</li>
                                    <li class="m-b-5">Courier Address: {{$shipping->zip}}</li>
                                    <li class="m-b-5">Address: {{$shipping->address}}</li>
                                    </ul>                              
                         </div>
                        </div>
                    </div>
                </div><br>
                <table class="table table-striped col-md-12" border="1">
                    <thead>

                    <tr>
                        <th>SL.</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Quantity</th>
                        <th class="text-right">Total Price</th>
                    </tr>
                    </thead>
                    <?php $i=1;?>
                    @php($qty=0)
                    @foreach($orderdetails as $orderdetails)
                    <tbody>
                        <tr style="text-align: center;">
                            <td>{{$i++}}</td>
                            <td>{{$orderdetails->product_name}}</td>
                            <td>{{$orderdetails->product_price}}</td>
                            <td>{{$orderdetails->product_quantity}}</td>
                            <td> Tk.{{$orderdetails->product_price*$orderdetails->product_quantity}}</td>
                        
                        </tr>
                      <?php  $qty=$qty+$orderdetails->product_quantity ?>
                    </tbody>
                    @endforeach
                     <tfoot>
                    <tr class="text-right">
                        <td class="font-bold font-15" colspan="3">Total:</td>
                        <td class="font-bold font-15">{{$qty}}</td>
                        <td class="font-bold font-15">Tk. {{$order->order_total}}</td>
                    </tr>
                    <tr class="text-right">
                        <td class="font-bold font-15" colspan="4">Total Pay Amount:</td>
                        <td class="font-bold font-15">{{$payment->amount}}</td>
                    </tr>
                    <tr class="text-right">
                        <td class="font-bold font-15" colspan="4">Total Due Amount:</td>
                        <td class="font-bold font-15">Tk. {{$order->order_total-$payment->amount}}</td>
                    </tr>
                    </tfoot>
                </table>
                <br>
                <br>
                <br>
                <div class="text-right">
                    <a class="btn btn-info printPage" type="button"  style="margin-bottom: 50px;"><i
                                class="fa fa-print" ></i> Print
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6"> 
                         <label><hr>Customer Signature</label><br>
                        {{--  <input type="" style="height: 40px;" name=""> --}} 
                    </div>
                      <div class="col-md-6" style="margin-left: 450px; margin-top: -55px;">  
                         <label><hr>Authorized Signature</label><br>
                        
                    </div>
                <br><br><br>
                </div>
               
                <!-- END PAGE CONTENT-->
                <br><br>
                <div class="col-md-12" style=" text-align: center;">
 <b style="font-size: 14px;"> Copyright &copy; <a href="https://www.rajshahishop.com">Rajshahi Shop</a>&nbsp; <?php echo date("Y") ?>.</b> <b style="font-size: 14px; ">Develop by <a href="https://www.creativesoftware.com.bd">Creative Software</a>.</b>
     </div>

            </div>
        </div>
        <style>
            .invoice {
                padding: 10px
            }
            .table-invoice tr td:last-child {
                text-align: right;
            }
        </style>
    </div>
    <script>
        $(document).ready(function () {
            $('.printPage').on('click',function () {
                $(this).hide();
                window.print();
                window.history.back();
            });
        });
    </script>
@endsection