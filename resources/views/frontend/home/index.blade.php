
@extends('layouts.frontendLayout')
@section('title', 'HR-Blog | Home')
@push('css')
<style>
	.favorite-post{
		color:blue;
	}
</style>
@endpush
@section('frontend_content')
@include('frontend.partial.category_slide')
<section class="blog-area section">
	<div class="container">
		<div class="row">
			@foreach ($posts as $post)
			<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">
							<div class="blog-image"><img src="{{asset('storage/post/'.$post->image)}}" alt="Blog Image"></div>
							@if ($post->user_id)
							<a class="avatar" href="javascript:void(0);"><img src="{{asset('storage/user/'.$post->user->image)}}" alt="Profile Image"></a>							
							@elseif ($post->admin_id)
							<a class="avatar" href="javascript:void(0);"><img src="{{asset('storage/admin/'.$post->admin->image)}}" alt="Profile Image"></a>
							@endif							
							<div class="blog-info">
								<h4 class="title"><a href="{{route('single.post', $post->slug)}}"><b>{{$post->title}}</b></a></h4>
								<ul class="post-footer">
									@auth
									<li>
										<a class="{{Auth::user('web')->favorite_posts->where('pivot.post_id', $post->id)->count() >= 1 ? 'favorite-post' : '' }}" onclick="document.getElementById('addFavorite-{{$post->id}}').submit();" href="javascript:void(0);"><i class="ion-heart"></i>{{$post->favorite_to_users->count()}}</a>
										<form id="addFavorite-{{$post->id}}" method="POST" action="{{route('add.favorite.post', $post->id)}}">
											@csrf
										</form>
									</li>		
									@endauth

									@guest
										<li>
											<a 
												onclick="toastr.info('To add this post favorite list, you need to login first.', 'Information', {
												closeButton:true,
												progressBar:true,
												positionClass:'toast-top-right'
											});" 
											href="javascript:void(0)"
											>
											<i class="ion-heart">
											</i>
											{{$post->favorite_to_users->count()}}
										</a>
										</li>
									@endguest

									<li><a href="#"><i class="ion-chatbubble"></i>{{$post->comments->count()}}</a></li>
									<li><a href="javascript:void(0);"><i class="ion-eye"></i>{{$post->view_count ? $post->view_count : 0}}</a></li>
								</ul>
							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->
			@endforeach
		</div><!-- row -->
		<a class="load-more-btn" href="{{route('all.post')}}"><b>LOAD MORE</b></a>
	</div><!-- container -->
</section><!-- section -->
@endsection
@push('js')
	<script>
			@if($errors->any())
			@foreach ($errors->all() as $error)
				toastr.error('{{$error}}', 'error', {
					closeButton:true,
					progressBar:true,
					positionClass:'toast-bottom-right',
				});
			@endforeach 
		 @endif
	</script>
@endpush	

