@extends('layouts.frontendLayout')
@section('title','All-Post')
@push('css')
<style>
	.favorite-post{
		color:blue;
    }
    .pagination{
        margin-left: 13px;
    }
    .slider{ height: 10px; width: 100%; margin: 0;} 
</style>
@endpush
@section('frontend_content')
    <div class="slider">
        <div class="container">
            <div class="display-table  ">
                <h3 class="title display-table-cell"><b>ALL POSTS</b></h3>
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
                                            onclick="document.getElementById('addFavoritePost-{{$post->id}}').submit();" 
                                            class="
                                            {{Auth::user()->favorite_posts->where('pivot.post_id', $post->id)->count() > 0 ? 'favorite-post' : ''}}
                                            " 
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
            <div class="row">
                <div>
                    {{$posts->links()}}
                </div>  
            </div>
		</div><!-- container -->
	</section><!-- section -->
@endsection
@push('js')
@endpush	