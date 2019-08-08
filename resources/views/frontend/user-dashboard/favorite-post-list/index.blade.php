@extends('layouts.userDashboardLayout')
@section('title')
User {{Auth::user('web')->username}} - All favorite post list
@endsection
@push('css')
<link href="{{asset('frontend/userDashboard/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush

@section('content')
<section class="content">
<div class="container-fluid"> 
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>ALL FAVORITE POST</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr class="text-c">
                                <th class="text-center">Serial</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Title</th>                             
                                <th class="text-center">Photo</th>                        
                                <th class="text-center"><i class="material-icons">favorite</i></th>                        
                                <th class="text-center">Created at</th>                              
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-center">Serial</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center"><i class="material-icons">favorite</i></th>   
                                <th class="text-center">Created at</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                      @foreach ($favoritePosts as $favoritePost)
                      <tr>
                        <td class="text-center">{{$loop->index + 1}}</td>
                        <td class="text-center">
                            @if ($favoritePost->user_id)
                            <h5 style="margin-top:15px;">{{$favoritePost->user->username}}</h5> 
                            @elseif ($favoritePost->admin_id)
                            <h5 style="margin-top:15px;">{{$favoritePost->admin->username}}</h5> 
                            @endif
                        </td class="text-center">
                        <td class="text-center">
                            <h5 style="margin-top:15px;">{{str_limit($favoritePost->title, 25)}}</h5>
                        </td>
                        <td class="text-center"><img width="70" height="45" src="{{asset('storage/post/'.$favoritePost->image)}}" alt=""></td>
                        <td class="text-center">
                            <h5 style="margin-top:15px;">{{$favoritePost->favorite_to_users->count()}}</h5>
                        </td>
                        <td class="text-center">
                            <h5 style="margin-top:15px;">{{$favoritePost->created_at}}</h5>
                        </td>
                        
                     
                        <td class="text-center">

                            <a class="btn btn-sm btn-primary waves-effect" href="{{route('favorite.post.show', $favoritePost->id)}}"><i class="material-icons">description</i></a> 
                            <a 
                            onclick=
                                "
                                event.preventDefault();
                                document.getElementById('removeFavoritePost-{{$favoritePost->id}}').submit();
                                " 
                                class="btn btn-sm btn-danger waves-effect" 
                                href="javeScript:void(0);">
                                <i class=" material-icons">delete</i>
                            </a>

                            <form id="removeFavoritePost-{{$favoritePost->id}}" action="{{route('remove.favorite.post', $favoritePost->id)}}" method="POST">
                                @csrf
                            </form> 
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
</section>
@endsection
@push('js')
<script src="{{asset('frontend/userDashboard/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('frontend/userDashboard/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('frontend/userDashboard/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('frontend/userDashboard/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('frontend/userDashboard/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('frontend/userDashboard/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('frontend/userDashboard/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('frontend/userDashboard/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('frontend/userDashboard/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
<script src="{{asset('frontend/userDashboard/js/pages/tables/jquery-datatable.js')}}"></script>
@endpush