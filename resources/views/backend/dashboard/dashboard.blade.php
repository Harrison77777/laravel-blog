@extends('layouts.backendLayout')
@push('css')
@endpush
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>           
@include('backend.partial.admin-dashboard-home-card')
            <!-- #END# Widgets -->
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="info-box bg-green hover-expand-effect hover-zoom-effect">
                                <div class="icon text-center">
                                    <i style="margin-left:15px;" class="material-icons">comments</i>
                                </div>
                                <div class="content">
                                    <div class="text">TOTAL COMMENTS</div>
                                    <div class="number count-to text-center" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{$totalComments}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="info-box bg-blue-gray hover-expand-effect hover-zoom-effect">
                                <div class="icon">
                                    <i style="margin-left:5px;" class="material-icons">category</i>
                                </div>
                                <div class="content">
                                    <div class="text">TOTAL CATEGORIES</div>
                                    <div class="number count-to text-center" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{$countCategories}}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="info-box bg-purple hover-expand-effect hover-zoom-effect">
                                    <div class="icon">
                                        <i style="margin-left:5px;" class="material-icons">text_fields</i>
                                    </div>
                                    <div class="content">
                                        <div class="text">TOTAL TAGS</div>
                                        <div class="number count-to text-center" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{$countTags}}</div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card">
                        <div class="header">
                            <h2>TOP POST</h2>
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
                                <table class="table table-hover table-sm dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Rank</th>
                                            <th class="text-center">Post title</th>
                                            <th class="text-center">Author</th>
                                            <th class="text-center">View</th>
                                            <th class="text-center">Comments</th>
                                            <th class="text-center">Favorites</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($topPosts as $post)
                                        <tr>
                                                <td class="text-center">{{$loop->index + 1}}</td>
                                                <td class="text-center">{{str_limit($post->title, 30)}}</td>
                                                <td class="text-center">{{$post->user_id ?  $post->user->username : $post->admin->username}}</td>
                                                <td class="text-center">{{$post->view_count}}</td>
                                                <td class="text-center">{{$post->comments_count}}</td>
                                                <td class="text-center">{{$post->favorite_to_users_count}}</td>
                                                <td class="text-center">
                                                    <span 
                                                    class="label {{$post->status == 1 ? 'bg-green' : 'bg-red'}} bg-green">
                                                    {{$post->status == 1 ? 'Publishec' : 'Not-Published'}}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-info btn-sm waves-effect" href="{{route('post.show', $post->id)}}">View</a>
                                                </td>
                                                
                                                {{-- <td>

                                                    <div class="progress">
                                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                                    </div>
                                                </td> --}}
                                            </tr> 
                                        @endforeach
                                        </body>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
            <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h2>TOP POST</h2>
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
                                        <table id="data" class="table table-hover table-sm dataTable js-exportable dashboard-task-infos">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Rank</th>
                                                    <th class="text-center">username</th>
                                                    <th class="text-center">Email</th>
                                                    <th class="text-center">Total comments</th>
                                                    <th class="text-center">Favorites</th>
                                                    <th class="text-center">Total Posts</th>
                                                    <th class="text-center">User photo</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ActiveUsersList as $user)
                                                <tr>
                                                        <td class="text-center">{{$loop->index + 1}}</td>
                                                        <td class="text-center">{{$user->username}}</td>
                                                        <td class="text-center">{{$user->email}}</td>
        
                                                        <td class="text-center">{{$user->comments_count}}</td>
                                                        <td class="text-center">{{$user->favorite_posts_count}}</td>
                                                        <td class="text-center">{{$user->posts_count}}</td>
                                                        <td class="text-center">
                                                            <img src="{{asset('storage/user/'.$user->image)}}" width="50" height="30" class=" img-rounded" alt="">
                                                        </td>
                                                        <td class="text-center">
                                                            <a class="btn btn-info btn-sm waves-effect" href="javeScript:void(0);">Datails</a>
                                                        </td>
                                                        {{-- <td>
        
                                                            <div class="progress">
                                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                                            </div>
                                                        </td> --}}
                                                    </tr> 
                                                @endforeach
                                                </body>
                                        </table>
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
       