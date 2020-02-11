@extends('Home.master')
@section('maincontent')
<section class="shopping-cart spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="cart-table">
					<table>
						<thead>
							<tr>
								<th>Image</th>
								<th class="p-name">Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
								<th><i class="ti-close"></i></th>
							</tr>
						</thead>
						<?php $i=1?>
						@php($sum=0)
						@php($sumqty=0)
						@php($pake=0)
						@php($weight=0)
					@foreach($cartProduct as $CartProduct)
						<tbody>
							<tr>
								<td class="cart-pic first-row"><img src="{{ asset($CartProduct->options->image) }}" alt=""></td>
								<td class="cart-title first-row">
									<h5>{{ $CartProduct->name }}</h5>
								</td>
								<td class="p-price first-row">${{ $CartProduct->price }}</td>
								<td class="qua-col first-row">
									{{-- <div class="quantity">
										<div class="pro-qty"> --}}
											<form action="{{route('updatecart')}}">
												@csrf
												<input type="number" min="1"  name="qty" value="{{$CartProduct->qty}}"style="width:45px;" />
												<input type="hidden" name="rowId" value="{{$CartProduct->rowId}}" />
											<button class="btn btn-success btn-sm" type="submit" name="btn">Update</button> 
										</form>
           
										{{-- </div>
									</div> --}}
								</td>
								<td class="total-price first-row">${{$total=$CartProduct->price*$CartProduct->qty}}</td>
								<td class="close-td first-row">
									<a class="cart_quantity_delete btn-danger" href="{{ route('delete-cart-item',['rowId'=>$CartProduct->rowId]) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</td>
							</tr>
						
						</tbody>
						<?php $sum=$sum+$total ?>
						<?php $sumqty=$sumqty+$CartProduct->qty ?>
					@endforeach
				
					</table>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="cart-buttons">
						<a href="{{url('/')}}" class="primary-btn continue-shop">Continue shopping</a>
							{{-- <a href="#" class="primary-btn up-cart">Update cart</a> --}}
						</div>
						{{-- <div class="discount-coupon">
							<h6>Discount Codes</h6>
							<form action="#" class="coupon-form">
								<input type="text" placeholder="Enter your codes">
								<button type="submit" class="site-btn coupon-btn">Apply</button>
							</form>
						</div> --}}
					</div>
					<div class="col-lg-4 offset-lg-4">
						<div class="proceed-checkout">
							<ul>
								<li class="subtotal">Cart Item total <span>{{$sumqty}}</span></li>
								<li class="cart-total">Total <span>${{$sum}}</span></li>
								<?php 
								Session::put('sum',$sum);
							   ?>
								<?php 
								Session::put('sumqty',$sumqty);
							   ?>
							</ul>
							<a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection