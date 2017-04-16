@extends('frontEnd.master')
@section('title')
Cart View
@endsection
@section('body')
<div class="page-head">
	<div class="container">
		<h3>Check Out</h3>
	</div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Item Total</th>
					</tr>
				</thead>
                                <?php $total=0;?>
                                @foreach($cartProducts as $cartProduct)
					<tr class="rem1">
						<td class="invert-closeb">
                                                    <a href='{{url('cart/delete/'.$cartProduct->rowId)}}' class="btn btn-danger">
                                                        <span class='glyphicon glyphicon-trash'></span>
                                                    </a>
						</td>
						<td class="invert-image">
                                                   {{$cartProduct->name}}
                                                </td>
						<td class="invert">
							Tk.{{$cartProduct->price}}
						</td>
                                                <td class="invert">
                                                    <form action='{{url('/cart/update/'.$cartProduct->rowId)}}' method="POST">
                                                        {{csrf_field()}}
                                                        <div class="input-group">
                                                            <input type='number' min='1' class="form-control" value='{{$cartProduct->qty}}' name='qty'>
                                                            <span class="input-group-btn">
                                                                <button type='submit' name='btn' class="btn btn-primary">
                                                                    <span class="glyphicon glyphicon-upload"></span>
                                                                </button>
                                                            </span>
                                                          
                                                        </div>
                                                    </form>
                                                </td>
                                                <td class="invert">
                                                   Tk. {{$itemTotal=$cartProduct->price*$cartProduct->qty}}
                                                </td>
					</tr>
                                        <?php $total=$total+$itemTotal;?>
                                        @endforeach
					
					
								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
			</table>
		</div>
		<div class="checkout-left">	
				
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
				</div>
				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					<h4>Total Price</h4>
					<ul>
						<li>Total <i>-</i> <span>Tk.{{$total}}</span></li>
                                                <?php 
                                                Session::put('orderTotal',$total);
                                                ?>
					</ul>
				</div>
				<div class="clearfix"> </div>
                                <hr>
                                <?php
                               $customerId= Session::get('customerId');
                               $shippingId= Session::get('shippingId');
                               if($customerId != null && $shippingId!= null ){?>
                                      <a href='{{url('/payment-info')}}' class="btn btn-primary pull-right">Checkout</a>
                               <?php } else if($customerId != null){ ?>
                                      <a href='{{url('/shipping-info')}}' class="btn btn-primary pull-right">Checkout</a>
                               <?php } else {?>
                                      <a href='{{url('/checkout/index')}}' class="btn btn-primary pull-right">Checkout</a>
                               <?php } ?>
                                
			</div>
	</div>
</div>	
@endsection
