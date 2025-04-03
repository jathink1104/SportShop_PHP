@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($list_category as $lct)
							<li><a href="{{ route('san-pham-theo-loai', $lct->id) }}">{{$lct->name}}</a></li>
							@endforeach

						</ul>
						<br> 
						<ul class="aside-menu">
							@foreach($list_video as $vd)
							<iframe width="100%" height="200px" src="{{$vd->url}}" title="{{$vd->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
							@endforeach
							<div style="text-align:center;" class="row d-flex justify-content-center">
								{{ $list_video->appends(['another_product' => request('another_product')])->links('pagination::bootstrap-4') }}
							</div>
						</ul>
					</div>
					<div class="col-sm-9">

						<div class="beta-products-list">
								<h4>Sản phẩm</h4>
								<div class="beta-products-details">
									<p class="pull-left">Tổng số sản phẩm: {{count($list_product)}}</p>
									<div class="clearfix"></div>
								</div>
								@if(count($list_product) >0)
								<div class="row">
								@foreach($list_product as $pr)
									<div class="col-sm-4">
										<div class="single-item">
											<div class="single-item-header">
												<a href="{{ route('chi-tiet-san-pham', $pr->id) }}"><img src="{{$pr->image}}" alt=""></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$pr->name}}</p>
												<p class="single-item-price">
													<span>Giá:{{$pr->unit_price}}$</span>
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{route('add-to-cart',$pr->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{ route('chi-tiet-san-pham', $pr->id) }}">Chi tiết sản phẩm <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									@endforeach

								</div>
						
								@else
									<p class="text-center text-danger">Không có sản phẩm nào thuộc loại này.</p>
								@endif
						</div> <!-- .beta-products-list -->
						
						<div class="beta-products-list">
								<h4>Sản phẩm khác</h4>
								<div class="beta-products-details">
									<p class="pull-left">Tổng số sản phẩm: {{count($another_product)}}</p>
									<div class="clearfix"></div>
								</div>
								<div class="row">
								@foreach($another_product as $pr)
									<div class="col-sm-4">
										<div class="single-item">
											<div class="single-item-header">
												<a href="{{ route('chi-tiet-san-pham', $pr->id) }}"><img src="{{$pr->image}}" alt=""></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$pr->name}}</p>
												<p class="single-item-price">
													<span>Giá:{{$pr->unit_price}}$</span>
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{route('add-to-cart',$pr->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{ route('chi-tiet-san-pham', $pr->id) }}">Chi tiết sản phẩm <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									@endforeach

								</div>
								<br>
								<div style="text-align:center;" class="row d-flex justify-content-center">
									{{ $another_product->appends(['list_video' => request('list_video')])->links('pagination::bootstrap-4') }}
								</div>
								</div>
						
							</div> <!-- .beta-products-list -->
						</div>
						
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection