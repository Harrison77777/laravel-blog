@extends('layouts.frontendLayout')
@section('title', $tag->slug)
@push('css')
<link href="{{asset('frontend/single-post-1/css/styles.css')}}" rel="stylesheet">
<link href="{{asset('frontend/single-post-1/css/responsive.css')}}" rel="stylesheet">
<style>
	.favorite-post{
		color:blue;
    }
    .pagination{margin-left: 13px;}
    .slider{ height: 10px; width: 100%; margin: 0;} 
    .slider .title { color: #fff; text-shadow: 2px 2px 10px rgba(0,0,0,.3); background: royalblue; border-radius:                         6px; padding: 0px 12px; box-shadow: 4px 6px 6px grey; font-size: 27px;
    }
</style>
@endpush
@section('frontend_content')
    <div class="slider">
        <div style="margin-top:26px;" class="container">
            <div class="">
                <h3 style="color:lighgray;" class="title display-table-cell"><b>Tag name: {{$tag->name}}</b></h3>
            </div>
        </div>
	</div><!-- slider -->

	<section class="blog-area section">
		<div class="container">
			<div class="row">
                @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="single-post post-style-1">
                            <div class="blog-image"><img src="{{asset('storage/post/'.$post->image)}}" alt="Blog Image"></div>
                            @if ($post->user_id)
                            <a class="avatar" href="#"><img src="{{asset('storage/user/'.$post->user->image)}}" alt="Profile Image"></a>
                            @elseif ($post->admin_id)
                            <a class="avatar" href="#"><img src="{{asset('storage/admin/'.$post->admin->image)}}" alt="Profile Image"></a>
                            @endif
                            
                            <div class="blog-info">
                                <h4 class="title"><a href="{{route('single.post', $post->slug)}}"><b>{{$post->title}}</b></a></h4>
                                <ul class="post-footer">
                                    @auth
                                    <li><a 
                                        class="
                                            {{Auth::user()->favorite_posts->where('pivot.post_id', $post->id)->count() > 0 ? 'favorite-post' : ''}}
                                            "
                                            onclick="document.getElementById('addFavoritePost-{{$post->id}}').submit();"  
                                            href="javaScript:void(0);">
                                            <i class="ion-heart"></i>
                                            {{$post->favorite_to_users->count()}}
                                            
                                        </a>
                                    </li>
                                    <form id="addFavoritePost-{{$post->id}}" action="{{route('add.favorite.post', $post->id)}}">
                                    @csrf
                                    </form>
                                    @endauth
                                    @guest
                                    <li><a 
                                        onclick="toastr.info('To add this post favorite list, you need to ligin first', 'Information', {
                                            closeButton:true,
                                            progressBar:true,
                                            positionClass:'toast-top-right'
                                        })"  
                                        href="javaScript:void(0);">
                                        <i class="ion-heart"></i>
                                        {{$post->favorite_to_users->count()}}
                                    </a>
                                     </li>
                                    @endguest
                                    <li><a href="#"><i class="ion-chatbubble"></i>{{$post->comments->count()}}</a></li>
                                    <li><a href="#"><i class="ion-eye"></i>{{$post->view_count}}</a></li>
                                </ul>
                            </div><!-- blog-info -->
                        </div><!-- single-post -->
                    </div><!-- card -->
                </div><!-- col-lg-4 col-md-6 -->
                @endforeach
            </div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->
@endsection
@push('js')
@endpush	