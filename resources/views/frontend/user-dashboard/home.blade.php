@extends('layouts.userDashboardLayout')
@section('title')
   User {{Auth::user()->username}} Dashboard 
@endsection
@push('css')
    
@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD OF {{strtoupper(Auth::user('web')->username) }}</h2>
        </div>
        {{-- user-dashboard-top-cart--}}
        @include('frontend.partial.user-dashboard-home-card')
        {{-- user-dashboard-top-cart--}}
        
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>YOU TOP 10 POPULAR POST WHICH IS CREATED BY YOU</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th class="text-center">Rank list</th>
                                        <th class="text-left">Title</th>
                                        <th class="text-center">View</th>
                                        <th class="text-center">Favorites</th>
                                        <th class="text-center">Comments</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($popularPosts as $post)
                                    <tr class="text-center">
                                        <td>{{$loop->index + 1 }}</td>
                                        <td class="text-left">{{str_limit($post->title, 30)}}</td>
                                        
                                        <td>{{$post->view_count}}</td>
                                        <td>{{$post->favorite_to_users_count}}</td>
                                        <td>{{$post->comments_count}}</td>
                                        <td>
                                            @if ($post->status == 1)
                                            <span class="label bg-green">Published</span> 
                                            @else
                                            <span class="label bg-red">Not-Published</span>    
                                            @endif
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('js')
    
@endpush
   

