@extends('master')
@section('content')
<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div  class="bannercontainer" >
					    <div class="banner" >
								<ul>
									@foreach($slide as $sl)
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{$sl->link}}" data-src="{{$sl->link}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{$sl->link}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						        </li>
								@endforeach
								
								</ul>
							</div>

						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tất cả sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tổng số sản phẩm mới:{{count($new_product)}}</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_product as $pr)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{ route('chi-tiet-san-pham', $pr->id) }}"><img src="{{ $pr->image }}" alt="">
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $pr->name }}</p>
											<p class="single-item-price">
												<span>{{ $pr->unit_price }}</span>
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
							<div class="space40">&nbsp;</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm bán chạy nhất</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tổng số sản phẩm: {{count($product)}}</p>
								<div class="clearfix"></div>
							</div>
							<div class="row" >
							@foreach($product as $pr)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{ route('chi-tiet-san-pham', $pr->id) }}"><img src="{{ $pr->image }}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $pr->name }}</p>
											<p class="single-item-price">
												<span>{{ $pr->unit_price }}</span>
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
							<div style="text-align:center;" class="row d-flex justify-content-center">
									{{ $product->links('pagination::bootstrap-4') }}
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
	</div> <!-- #content -->

	

 
@endsection