@extends('Home.master')
@section('maincontent')
 <SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
    <div class="row">
        <div class="col-md-9 well">
           <!-- <form action="{{url('/checkout/order')}}" method="post">
              @csrf
          <table class="table table-bordered">
               <p style="text-align: center;"><b> Dear {{Session::get('customerName')}} Please Payment {{Session::get('orderTotal')}} Tk By  Only one Method</b></p><br>
             <tr>
             <td colspan="2"><input type="radio" data-toggle="collapse" data-target="#democash" name="payment_type" value="Cash"><b>Payment Method</b></td>
             <td style="text-align: right;"  colspan="2" id="democash" class="collapse"> <button type="submit" name="btn" value="Confirm Order" class="btn btn-success">Confirm</button></td>
            </tr>
          </table>
        </form> -->
 
             <form action="{{url('/checkout/order')}}" method="post">
              @csrf
                <table class="table table-bordered">  
                <p style="text-align: center;"><b> Dear {{Session::get('customerName')}} Please Payment {{Session::get('orderTotal')}} Tk By  Only one Method</b></p><br>  
                     <tr>
                        <td><input type="radio" name="payment_type" value="Roket"><b>Roket</b></td>
                      <td rowspan="2">
                      <br>
                      <input style="height: 30px;" required="" type="text" placeholder="Transaction No"  name="Transactionno"size="20" >
                      <!-- <input style="height: 30px; text-align: center;" type="text" id="txtChar" onkeypress="return isNumberKey(event)" name="amount"  required="" placeholder="Amount"   size="20"> -->
                    </td>
                     <td rowspan="2" style="text-align: right;"> <br><button type="submit" name="btn" value="Confirm Order" class="btn btn-success">Confirm</button></td>
                     
                    </tr>
                      <tr>
                        <td><input type="radio" name="payment_type" value="Bkash"><b>Bkash</b></td>
                      </tr>
                      <tr>
                          
                    </tr>

                </table>
            </form> 
            
            {{-- <div class="row">
                <div class="col-sm-4">
                    <button data-toggle="collapse" data-target="#demo" class="btn btn-warning">How To Pay Bkash</button>
                    <div>
                        <div colspan="2" id="demo" class="collapse" style="background:#7fd193;">
                            <img src="{{asset('public/corporate/') }}/assets/images/bkash.png" height="50px;" width="130px;">
                            <div style=" color: white; margin-left: 30px;" >
                                <h3 >Bkash Payment</h3>
                                <h4>How To Pay</h4>
                                <ol style="font-size: 15px;">
                                    <li>Dial *247# .</li>
                                    <li>Select Payment option 1 .</li>
                                    <li>Select Bill pay option 1 .</li>
                                    <li>Write Biller ID "506" .</li>
                                    <li>Write Cart ID in Bill Number Box 2958218 </li>
                                    <li>Write Your Amount 250 .</li>
                                    <li>Write your Secret PIN (XXXX) .</li>
                                    <li>You will get a confirmation SMS .</li>
                                </ol>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <button data-toggle="collapse" data-target="#demo2" class="btn btn-warning">How To Pay Roket</button>
                    <div colspan="2" id="demo2" class="collapse" style="background:#7fd193;">
                        <img src="{{asset('public/corporate/') }}/assets/images/dbblp.png" height="50px;" width="130px;">
                        <div style=" color: white; margin-left: 30px;" >
                            <h3 >Roket Payment</h3>
                            <h4>How To Pay</h4>
                            <ol style="font-size: 15px;">
                                <li>Dial *322# .</li>
                                <li>Select Payment option 1 .</li>
                                <li>Select Bill pay option 1 .</li>
                                <li>Write Biller ID "506" .</li>
                                <li>Write Cart ID in Bill Number Box 2958218 </li>
                                <li>Write Your Amount 250 .</li>
                                <li>Write your Secret PIN (XXXX) .</li>
                                <li>You will get a confirmation SMS .</li>
                            </ol>
                            <br>
                        </div>
                    </div>
            </div>
                  <div class="col-sm-4">
                    <button data-toggle="collapse" data-target="#demo3" class="btn btn-warning">How To Pay Cash</button>
                    <div>
                        <div colspan="2" id="demo3" class="collapse" style="background:#7fd193;">
        
                            <div style=" color: white; margin-left: 30px;" >
                                <h3 >Delivery On Cash Payment</h3>
                                <h4>How To Pay</h4>
                                <p>Click on "Confirm Order" .<br>
                      You will get the parcel of happiness within 3-5 working days(in Dhaka).<br>
                       After receiving the parcel, pay to the delivery man</p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
        </div> --}}

      </div>

    </div>








   
@endsection