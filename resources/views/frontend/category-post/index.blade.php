@extends('layouts.frontendLayout')
@section('title', $category->slug)
@push('css')
<link href="{{asset('frontend/single-post-1/css/styles.css')}}" rel="stylesheet">
<link href="{{asset('frontend/single-post-1/css/responsive.css')}}" rel="stylesheet">
<style>
	.favorite-post{
		color:blue;
    }
    .pagination{
        margin-left: 13px;
    }
    .slider{ height: 400px; width: 100%; 
        //background-size: cover; 
        background-size: contain;
        margin: 0;background-image: url({{asset('storage/category/'.$category->image)}});
         background-attachment: fixed;
    //background-position: center;
    backface-visibility: visible;
    background-clip: content-box;
    background-repeat: no-repeat;
    }
</style>
@endpush
@section('frontend_content')
    <div class="slider">
        
            <div class="display-table  ">
                <h3 class="title display-table-cell"><b>{{$category->name}}</b></h3>
            
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
        {{Auth::user('web')->favorite_posts->where('pivot.post_id', $post->id)->count() > 0 ? 'favorite-post' : ''}}
                                            "
                                            onclick="document.getElementById('addFavoritePost-{{$post->id}}').submit();"  

                                            href="javaScript:void(0);"

                                            >
                                            <i class="ion-heart"></i>
                                            {{$post->favorite_to_users->count()}}
                                        </a>
                                    </li>
                                    <form method="POST" id="addFavoritePost-{{$post->id}}" action="{{route('add.favorite.post', $post->id)}}">
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