@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="{{$product ->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$product -> name}}</h2></p>
								<p class="single-item-price">
									<span>{{$product -> until_price}}</span>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$product -> description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số lượng:</p>
							<div class="single-item-options">
								<select class="wc-select" name="color">
									<option>Số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart"  href="{{route('add-to-cart',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
							<li><a href="#tab-reviews">Bình luận ({{count($product->comments)}})</a></li>
						</ul>
						

						<div class="panel" id="tab-description">
							<p>{{$product -> description}}</p>
						</div>
					</div>
					
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm liên quan</h4>

						<div class="row">
							@foreach($product_relate as $pr)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{ route('chi-tiet-san-pham', $pr->id) }}"><img src="{{$pr -> image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$pr -> name}}</p>
										<p class="single-item-price">
											<span>{{$pr->until_price}}</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('add-to-cart',$pr->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('chi-tiet-san-pham', $pr->id) }}">Chi tiết sản phẩm  <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div style="text-align:center;" class="row d-flex justify-content-center">
								{{ $product_relate->appends(['product_new' => request('product_new')])->links('pagination::bootstrap-4') }}
							</div>
					</div> <!-- .beta-products-list -->
					
				</div>


				
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Bán chạy nhất</h3>
						<div class="widget-body">
							
							<div class="beta-sales beta-lists">
							@foreach($product_best as $pr)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{ route('chi-tiet-san-pham', $pr->id) }}"><img src="{{$pr -> image}}" alt=""></a>
									<div class="media-body">
										{{$pr -> name}}
										<span class="beta-sales-price">{{$pr -> unti_price}}</span>
									</div>
								</div>
								@endforeach
							</div>
					
						</div>
					</div> 
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới nhất</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							@foreach($product_new as $pr)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{ route('chi-tiet-san-pham', $pr->id) }}"><img src="{{$pr -> image}}" alt=""></a>
									<div class="media-body">
										{{$pr -> name}}
										<span class="beta-sales-price">{{$pr -> until_price}}</span>
									</div>
								</div>
							@endforeach
								<div style="text-align:center;"class="row d-flex justify-content-center">
									@if ($product_new->hasMorePages())
										<a href="{{ $product_new->nextPageUrl() }}" class="btn btn-primary">
											Sản phẩm khác >>>>
										</a>
									@endif
								</div>
							</div>
						</div>
					</div>

				</div>
				
			</div>
			<div class="panel" id="tab-reviews">
				<h3 class="widget-title">Viết đánh giá {{$product -> name}}</h3>
				<br>
				<br>
				<div class="card mb-4 shadow-sm">

				<div class="comments-section">


						<div class="comment-list">
							@if($product->comments->isEmpty())
								<p class="text-muted">Chưa có bình luận nào. Hãy là người đầu tiên bình luận!</p>
							@else
								@foreach($product->comments as $comment)
									<div class="comment-box">
										<strong>{{ $comment->user->full_name ?? 'Ẩn danh' }}</strong>
										@if($comment->user->id === 1)
											<span class="badge bg-warning text-dark">ADMINISTRATOR</span>
										@else
											<span class="badge bg-warning text-dark">USER</span>
										@endif
										<p class="text-muted small">{{ $comment->created_at->diffForHumans() }}</p>
										<p>{{ $comment->content }}</p>

										<!-- Nút trả lời -->
										<div class="comment-actions">
											<a href="#" class="text-primary reply-btn" data-comment-id="{{ $comment->id }}">Trả lời</a>

											@if(Auth::check() && Auth::id() === $comment->user_id)
												<form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
													@csrf
													@method('DELETE')
													<button type="submit" class="btn btn-sm btn-danger">Xóa</button>
												</form>
											@endif
										</div>

										<!-- Form trả lời bình luận -->
										<div class="reply-form" id="reply-form-{{ $comment->id }}" style="display: none; margin-top: 10px;">
											<form action="{{ route('comment_reps.store') }}" method="POST">
												@csrf
												<input type="hidden" name="comment_id" value="{{ $comment->id }}">
												<div class="mb-3">
													<textarea name="content" class="form-control" rows="2" placeholder="Nhập câu trả lời..." required></textarea>
												</div>
												<br>
												<button style="background-color:red; border: 1px solid red;" type="submit" class="btn btn-sm btn-primary">Gửi</button>
											</form>

										</div>

										<!-- Hiển thị danh sách trả lời -->
										<div class="reply-list" style="margin-left: 30px;">
											@foreach($comment->replies as $reply)
												<div class="reply-box">
													<strong>{{ $reply->user->full_name ?? 'Người dùng ẩn danh' }}</strong>
													@if($reply->user->id === 1)
														<span class="badge bg-warning text-dark">ADMINISTRATOR</span>
													@else
														<span class="badge bg-warning text-dark">USER</span>
													@endif
													<p class="text-muted small">{{ $reply->created_at->diffForHumans() }}</p>
													<p>{{ $reply->content }}</p>

													@if(Auth::check() && Auth::id() === $reply->user_id)
														<form action="{{ route('comment_reps.destroy', $reply->id) }}" method="POST" class="d-inline">
															@csrf
															@method('DELETE')
															<button type="submit" class="btn btn-sm btn-danger">Xóa</button>
														</form>
													@endif
												</div>
											@endforeach
										</div>
									</div>
								@endforeach
							@endif
						</div>

						<br>
						<div class="comment-form">
							<form action="{{ route('comments.store') }}" method="POST">
								@csrf
								<input type="hidden" name="product_id" value="{{ $product->id }}">
								<div class="mb-3">
									<textarea name="content" class="form-control" rows="3" placeholder="Nhập bình luận..." required></textarea>
								</div>
								<br>
								<button style="background-color:red; border:1px solid red" type="submit" class="btn btn-primary">Gửi</button>
							</form>
						</div>

						
					</div>

				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
	

	<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".reply-btn").forEach(function (btn) {
            btn.addEventListener("click", function (event) {
                event.preventDefault(); // Ngăn chặn link nhảy trang

                let commentId = this.getAttribute("data-comment-id");
                let replyForm = document.getElementById("reply-form-" + commentId);

                if (replyForm.style.display === "none" || replyForm.style.display === "") {
                    replyForm.style.display = "block";
                } else {
                    replyForm.style.display = "none";
                }
            });
        });
    });
</script>


@endsection