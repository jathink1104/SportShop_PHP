@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt Hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dat-hang')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                @if(Session::has('thongbao'))
                    <div style="
                        background-color: #d4edda; 
                        color: #155724; 
                        padding: 10px; 
                        border: 1px solid #c3e6cb; 
                        border-radius: 5px; 
                        margin-top: 10px; 
                        font-weight: bold;
                    ">
                        {{ Session::get('thongbao') }}
                    </div>
                @endif

                </div>
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

                        <div class="form-block">
                            <label for="name">Họ tên*</label>
                            <input type="text" id="name" name="name" placeholder="Họ tên" required>
                        </div>

                        <div class="form-block">
                            <label>Giới tính</label>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%">
                            <span style="margin-right: 10%">Nam</span>

                            <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%">
                            <span>Nữ</span>
                        </div>
                        
						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required placeholder="Nhập email">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ giao hàng*</label>
							<input type="text" id="adress" name="address" placeholder="Nhập địa chỉ" required>
						</div>

						<div class="form-block">
							<label for="phone">Số điện thoại*</label>
							<input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Nội dung đặt hàng</label>
							<textarea id="notes" name="notes"></textarea>
						</div>
					</div>  
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn đặt hàng của bạn</h5></div>
							<div class="your-order-body">
								<div class="your-order-item">
									<div>
                                    @if(Session::has('cart') && !empty($product_cart))
                                        @foreach($product_cart as $cart)
                                            <!-- one item -->
                                            <div class="media">
                                                <img width="25%" src="{{ $cart['item']['image'] }}" alt="" class="pull-left">
                                                <div class="media-body">
                                                    <p class="font-large">{{ $cart['item']['name'] }}</p>
                                                    <span class="color-gray your-order-info">Đơn giá: {{ number_format($cart['price']) }} đồng</span>
                                                    <span class="color-gray your-order-info">Số lượng: {{ $cart['qty'] }}</span>
                                                </div>
                                            </div>
                                            <!-- end one item -->
                                        @endforeach
                                    @else
                                        <p class="text-center">🛒 Giỏ hàng trống!</p>
                                    @endif
									</div>
									<div class="clearfix"></div>
								</div>  
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									@if(Session::has('cart'))
                                        <div class="pull-right"><h5 class="color-black">{{ Session::get('cart')->totalPrice }} đồng</h5></div>
                                    @else
                                        <div class="pull-right"><h5 class="color-black">0</h5></div>
                                    @endif
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
                                    <li class="payment_method_bacs">
                                        <input id="payment_method_bacs" type="radio" class="input-radio" 
                                            name="payment_method" value="COD" checked="checked" 
                                            data-order_button_text="">
                                        <label for="payment_method_bacs">Thanh toán khi nhận hàng</label>
                                        
                                        <div class="payment_box payment_method_bacs" style="display: block;">
                                            Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi 
                                            thanh toán cho nhân viên giao hàng
                                        </div>
                                    </li>

									<li class="payment_method_cheque">
                                        <input id="payment_method_cheque" type="radio" class="input-radio" 
                                            name="payment_method" value="ATM" 
                                            data-order_button_text="">
                                        <label for="payment_method_cheque">Chuyển khoản</label>
                                        <div class="payment_box payment_method_cheque" style="display: none;">
                                            Chuyển tiền đến tài khoản sau:
                                            <br>- Số tài khoản: 123.456.789
                                            <br>- Chủ TK: Phan Dương Quốc
                                            <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                        </div>
                                    </li>

									
									<!-- <li class="payment_method_paypal">
										<input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal" data-order_button_text="Proceed to PayPal">
										<label for="payment_method_paypal">PayPal</label>
										<div class="payment_box payment_method_paypal" style="display: none;">
											Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account
										</div>						
									</li> -->
								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Thanh toán <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection