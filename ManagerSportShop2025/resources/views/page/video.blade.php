@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Video</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Video</span>
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
                            <h4 class="text-primary">🔥 Tin Nổi Bật</h4>
                            <br>
                            <div class="newsletter-content p-3">
                                <p>Chào mừng bạn đến với bản tin tháng này! Chúng tôi sẽ cập nhật những thông tin quan trọng, xu hướng mới và các mẹo hữu ích.</p>

                                <h5>📌 Nội Dung</h5>
                                <ul class="list-group list-group-flush">
                                        @foreach($list_new as $new)
                                        <li class="list-group-item d-flex align-items-start">
                                            <img src="{{$new->image}}" alt="{{$new->title}}" class="img-thumbnail me-3">
                                            <div>
                                                <h5 class="mb-1">✅{{$new->title}} </h5>
                                                <p class="mb-1">{{$new->content}}</p>
                                                <p class="mb-1">Cập nhật:{{$new->update_at}}</p>
                                            </div>
                                        </li>
                                        @endforeach
                                        <div style="text-align:center;" class="row d-flex justify-content-center">
                                        {{ $list_new->appends(['list_video' => request('list_video')])->links('pagination::bootstrap-4') }}                                        </div>
                                </ul>
                            </div>
						</ul>
						<br> 
					</div>
					<div class="col-sm-9">

						<div class="beta-products-list">
								<h4>Video</h4>
								<div class="beta-products-details">
									<p class="pull-left">Tổng số video: {{count($list_video)}}</p>
									<div class="clearfix"></div>
								</div>
								<div class="row">
                                @foreach($list_video as $vd)
									<div class="col-sm-4">
										<div class="single-item">
                                            <iframe width="100%" height="200px" src="{{$vd->url}}" title="{{$vd->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
										</div>
									</div>
									@endforeach

								</div>
                                <div style="text-align:center;" class="row d-flex justify-content-center">
                                    {{ $list_video->appends(['list_new' => request('list_new')])->links('pagination::bootstrap-4') }}
                                </div>
						</div> <!-- .beta-products-list -->
					</div>	
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection