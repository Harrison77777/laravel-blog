@extends('layouts.userDashboardLayout')
@section('title', 'user-post details')
@push('css')
<style>
    .custom {
        margin-top: -41px;
    }
</style>
@endpush
@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <a class="btn btn-info waves-effect btn-sm" href="{{route('favorite.post.list')}}">BACK</a>
                </h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <small><strong>DETAILS THE FAVORITE POST</strong></small>
                            </h2>
                        </div>
                        <div class="body custom">
                            <div class="row">
                                <div class="col-lg-6"><h2>
                                        <small><strong>Created at:</strong>  {{$post->created_at->toFormattedDateString()}}</small>
                                        <small><strong>Updated at:</strong>  {{$post->updated_at->toFormattedDateString()}}</small>
                                    </h2>
                                    <p>- <strong>Post author:</strong>
                                        @if ($post->user_id)
                                            {{$post->user->username}}
                                            @elseif ($post->admin_id)
                                            {{$post->admin->username}}
                                        @endif
                                        </p>
                                    <p>- <strong>Post title:</strong>  {{$post->title}}</p>
                                    <p>- <strong>Post slug:</strong>  {{ $post->slug}}</p>
                                    <p>- <strong>Post description:</strong></p></div>
                                <div class="col-lg-6">
                                      <h4 style="margin-top:35px;">Related categories</h4>
                                      @foreach ($post->categories as $category)
                                         <p style="margin:0px!important;">{{$category->name}}</p> 
                                      @endforeach
                                      <h4 style="margin-top:10px;">Related tags</h4>
                                      @foreach ($post->tags as $tag)
                                         <p style="margin:0px!important;">{{$tag->name}}</p> 
                                      @endforeach
                                </div>
                            </div>
                            <hr>
                            <div>
                                {!!$post->description!!} 
                            </div>
                            <hr>
                            <p>- <strong>Featured photo:</p>
                            <div class="card-image">
                                <img style="width:200;height:250px;" src="{{asset('storage/post/'.$post->image)}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
@push('js')

@endpush