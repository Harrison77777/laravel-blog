@extends('layouts.frontendLayout')
@section('title')
	{{$post->slug}}
@endsection
@push('css')
<link href="{{asset('frontend/single-post-1/css/styles.css')}}" rel="stylesheet">
<link href="{{asset('frontend/single-post-1/css/responsive.css')}}" rel="stylesheet">
<style>
	.favorite-post{
		color:blue;
	}
	.slider{ height: 500px; width: 100%;background-size: cover; margin: 0;background-image: url({{asset('storage/post/'.$post->image)}}); background-attachment: fixed;
	background-position: center;
	}  
</style>

@endpush
@section('frontend_content')
<div class="slider"></div><!-- slider -->
<section class="post-area section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12 no-right-padding">
				<div class="main-post">
					<div class="blog-post-inner">
						<div class="post-info">
							<div class="left-area">
							@if ($post->admin_id)
							<a class="avatar" href="#"><img src="{{asset('storage/admin/'.$post->admin->image)}}" alt="Profile Image"></a>
							@elseif ($post->user_id)
							<a class="avatar" href="#"><img src="{{asset('storage/user/'.$post->user->image)}}" alt="Profile Image"></a>
							@endif						  
							</div>
							<div class="middle-area">
								<a class="name" href="#">
									<b>
										@if ($post->user_id)
											{{$post->user->username}}
											@elseif ($post->admin_id)
											{{$post->admin->username}} (Admin)
										@endif
									</b>
								</a>
								<h6 class="date">{{$post->created_at->diffForHumans()}}</h6>
							</div>
						</div><!-- post-info -->
						<h3 class="title"><b>{{$post->title}}</b></h3>
						<div class="para">{!!$post->description!!}</div>
						<ul class="tags">
							@foreach ($post->tags as $tag)
								<li><a href="{{route('tag.post', $tag->slug)}}">{{$tag->name}}</a></li>
							@endforeach
						</ul>
					</div><!-- blog-post-inner -->
					
					<div class="post-icons-area">
						<ul class="post-icons">
								@auth
								<li><a onclick="document.getElementById('addFavorite-{{$post->id}}').submit();" class="{{Auth::user()->favorite_posts->where('pivot.post_id', $post->id)->count() >= 1 ? 'favorite-post' : ''}}" href="javaScript:void(0);"><i class="ion-heart"></i>{{$post->favorite_to_users->count()}}</a></li>
								<form style="display:none;" id="addFavorite-{{$post->id}}" method="POST" action="{{route('add.favorite.post',$post->id)}}">
										@csrf
									</form>
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
							<li><a href="javaScript:void(0);"><i class="ion-eye"></i>{{$post->view_count ? $post->view_count : 0}}</a></li>
						</ul>
						<ul class="icons">
							<li>SHARE : </li>
							<li><a href="#"><i class="ion-social-facebook"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter"></i></a></li>
							<li><a href="#"><i class="ion-social-pinterest"></i></a></li>
						</ul>
					</div>
				</div><!-- main-post -->

			</div><!-- col-lg-8 col-md-12 -->
			<div class="col-lg-4 col-md-12 no-left-padding">
				<div class="single-post info-area">
					<div class="sidebar-area about-area">
						<h6 class="title">
							<b>ABOUT OF THE POST WRITE :
								@if ($post->user_id)
									{{strtoupper($post->user->username)}}
									
									@elseif ($post->admin_id)
									{{strtoupper($post->admin->username)}}
								@endif
							</b>
						</h6>
						<p>
							@if ($post->user_id)
							{{$post->user->description}}							
							@elseif ($post->admin_id)
							{{$post->admin->description}}
							@endif
						</p>
					</div>

					<div class="tag-area">
						<h4 class="title"><b>CATEGORY</b></h4>
						<ul>
							@foreach ($post->categories as $category)
								<li><a href="{{route('category.post', $category->slug)}}">{{$category->name}}</a></li>
							@endforeach
						</ul>
					</div><!-- subscribe-area -->
				</div><!-- info-area -->
			</div><!-- col-lg-4 col-md-12 -->
		</div><!-- row -->
	</div><!-- container -->
</section><!-- post-area -->

<section class="recomended-area section">
	<div class="container">
		<div class="row">
			@foreach ($randomPosts as $randomPost)
			<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">
							<div class="blog-image"><img src="{{asset('storage/post/'.$randomPost->image)}}" alt="Blog Image"></div>
							@if ($randomPost->user_id)
							<a class="avatar" href="#"><img src="{{asset('storage/user/'.$randomPost->user->image)}}" alt="Profile Image"></a>	
							@elseif ($randomPost->admin_id)
							<a class="avatar" href="#">
								<img src="{{asset('storage/admin/'.$randomPost->admin->image)}}" alt="Profile Image">
							</a>
							@endif							
							<div class="blog-info">
								<h4 class="title"><a href="{{route('single.post', $randomPost->slug)}}"><b>{{$randomPost->title}}</b></a></h4>
								<ul class="post-footer">
									@auth
									<li>
										<a class="{{Auth::user('web')->favorite_posts->where('pivot.post_id', $randomPost->id)->count() >= 1 ? 'favorite-post' : '' }}" onclick="document.getElementById('addFavorite-{{$randomPost->id}}').submit();" href="javascript:void(0);"><i class="ion-heart"></i>{{$randomPost->favorite_to_users->count()}}</a>
										<form id="addFavorite-{{$randomPost->id}}" method="POST" action="{{route('add.favorite.post', $randomPost->id)}}">
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
											{{$randomPost->favorite_to_users->count()}}
										</a>
										</li>
									@endguest									
									<li><a href="#"><i class="ion-chatbubble"></i>{{$randomPost->comments->count()}}</a></li>
									<li><a href="javascript:void(0);"><i class="ion-eye"></i>{{$randomPost->view_count ? $randomPost->view_count : 0}}</a></li>
								</ul>
							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->
			@endforeach
		</div><!-- row -->	
	</div><!-- container -->
</section>

<section class="comment-section">
	<div class="container">
		<h4><b>POST COMMENT</b></h4>
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<div class="comment-form">
					@auth
					<form id="addComment" method="post" action="{{url('add/comment')}}">
						@csrf
						<input type="hidden" name="postId" value="{{$post->id}}" id="postId">
						<div class="row">
							<div class="col-sm-12">
								<small class="text-success successMsg"><b></b></small>
								<small class="text-danger errorMsg"></small>
								{{-- <small class="text-danger"><b>{{$errors->first('comment')}}</b></small> --}}
								<textarea name="comment" id="comment" rows="2" class="text-area-messge form-control"
									placeholder="Enter you comment" aria-required="true" aria-invalid="false"></textarea>								
							</div><!-- col-sm-12 -->
							<div class="col-sm-12">
								<button class="submit-btn" type="submit" id="form-submit"><b>COMMENT</b></button>
							</div><!-- col-sm-12 -->
						</div><!-- row -->
					</form>	
					@endauth
					@guest
					<form>
						<div class="row">
							<div class="col-sm-12">
								<textarea name="comment" rows="2" class="text-area-messge form-control"
									placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
							</div><!-- col-sm-12 -->
							<div class="col-sm-12">
								<a 
								  class="submit-btn" 
								  href="javascript:void(0);"
								  onclick="
								  toastr.info('If you want to add any comment on this post you need to login first', 'Information', {
									  closeButton:true,
									  progressBar:true,
									  positionClass:'toast-top-right'
								  })
								  "
								>
								<b>Comment</b>
								</a>
							</div><!-- col-sm-12 -->
						</div><!-- row -->
					</form>	
					@endguest
				</div><!-- comment-form -->

				<h4><b>COMMENTS (<span class="commentCount">{{$commentsCount}}</span>)</b></h4>
				<input type="hidden" id="commentShowUrl" value="{{url('comment/show/'. $post->id)}}">
				<input type="hidden" id="imageUrl" value="{{asset('storage/user/')}}">				
				<div class="commnets-area">

						
				</div><!-- commnets-area -->
			</div><!-- col-lg-8 col-md-12 -->
		</div><!-- row -->
	</div><!-- container -->
</section>

@endsection

@push('js')
	<script>

			$(document).ready(function(){
				$.ajaxSetup({
				  headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				  }
				});
				
			  });
			  
				$('#addComment').on('submit',function(event){
					event.preventDefault();
					var postId = $('#postId').val();
					var comment = $('#comment').val();
					var url = $(this).attr('action');
					$.ajax({
						url:url,
						type:'POST',
						data:{postId:postId,comment:comment},
						dataType: "json",
						success:function(data){
							if($.isEmptyObject(data.error)){
								comments = data.allComments;
								$('.successMsg').html('<b>'+data.success+'</b>');
								$('.commentCount').html(data.countComment);
								$('#comment').val('');
								$('.errorMsg').html('');
								showComment();	
							}else{
								
								$('.successMsg').html('');
									getError = data.error;
									$.each(getError,function(k,errorShow){
										$('.errorMsg').html('<b>'+errorShow+'</b>');
									});
							}
							
						}
					});
				 });

				 function showComment(){
					 url = $('#commentShowUrl').val();
					 imageUrl = $('#imageUrl').val();
					 $.ajax({
						 url:url,
						 type:'GET',
						 dataType:'json',
						 success:function(data){
							comments = data.showComment;
							showComments = '<div class="comment">';
							$.each(comments, function(k,value){
								showComments += '<div class="comment">';
								showComments+= '<div class="post-info">';
								showComments+= '<div class="left-area">';
								showComments+= '<a class="avatar" href="#">';
								showComments+= '<img src="'+imageUrl+'/'+value.user.image+'" alt="Profile Image">';
								showComments+='</a>';
								showComments+='</div>';
								showComments+='<div class="middle-area">';
								showComments+='<a class="name" href="#"><b>'+ value.user.username +' '+ '</b></a>';
								showComments+=' <h6 class="date"> '+' '+value.created_at+'</h6>';
								showComments+='</div>';
								showComments+='<div class="right-area">';
								showComments+='<h5 class="reply-btn" ><a href="#"><b>REPLY</b></a></h5>';
								showComments+='</div>';
								showComments+='</div>';
								showComments+='<p>'+value.comment+'</p>';
								showComments+='</div> ';
							}) 
							//console.log(showComments);
							$('.commnets-area').html(showComments);
						 }						 
					 });
				 }
				 showComment();
	</script>
@endpush	
