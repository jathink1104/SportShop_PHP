@extends('master')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tất cả sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tổng số sản phẩm mới:{{count($list_product)}}</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($list_product as $pr)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{ route('chi-tiet-san-pham', $pr->id) }}"><img src="{{ $pr->image }}" alt="">
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $pr->name }}</p>
											<p class="single-item-price">
												<span>Giá:{{ $pr->unit_price}}$</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('add-to-cart',$pr->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('chi-tiet-san-pham', $pr->id) }}">Chi tiết sản phẩm <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<br>
								<br>
								<br>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

					
					</div>
				</div> <!-- end section with sidebar and main content -->

				<div style="text-align:center;" class="row d-flex justify-content-center">
									{{ $list_product->links('pagination::bootstrap-4') }}
								</div>
			</div> <!-- .main-content -->
	</div> <!-- #content -->


@endsection