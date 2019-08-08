@extends('layouts.userDashboardLayout')
@section('title')
   User {{Auth::user('web')->username}} - All post 
@endsection
    

@push('css')
<link href="{{asset('frontend/userDashboard/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

@endpush

@section('content')

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <a class="btn btn-info waves-effect btn-sm" href="{{route('userPost.create')}}">ADD NEW POST</a>
                </h2>
            </div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                
                <h2>ALL TAGS</h2>
               
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th class="text-center">Serial</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">View</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Approval</th>
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
                                <th class="text-center">Total View</th>

                                <th class="text-center">Status</th>
                                <th class="text-center">Approval</th>
                                <th class="text-center">Created at</th>
                                
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                      @foreach ($posts as $post)
                      <tr>
                        <td class="text-center">{{$loop->index + 1}}</td>

                        <td class="text-center">
                            @if ($post->user_id)
                            <h5 style="margin-top:15px;">{{$post->user->username}}</h5> 
                            @endif
                        </td>
                        <td><h5 style="margin-top:15px;">{{str_limit($post->title, 25)}}</h5></td>
                        
                       
                        
                        <td class="text-center"><img width="70" height="45" src="{{asset('storage/post/'.$post->image)}}" alt=""></td>
                        <td class="text-center"><h5 style="margin-top:15px;">{{$post->view_count ? $post->view_count : 0 }}</h5></td>
                        <td class="text-center"><span style="margin-top:14px; padding:5px;" class="badge {{$post->status ? 'bg-cyan' : 'bg-red'}} ">{{$post->status ? 'Published' : 'Not-Published'}}</span></td>
                        <td class="text-center"><span style="margin-top:14px; padding:5px;" class="badge {{$post->is_approved ? 'bg-cyan' : 'bg-red'}} ">{{$post->is_approved ? 'Approved' : 'Not-Approved'}}</span></td>

                        <td class="text-center"><h5 style="margin-top:15px;">{{$post->created_at->diffForHumans()}}</h5></td>
                     
                        <td class="text-center">

                            <a class="btn btn-sm btn-primary waves-effect" href="{{route('userPost.show', $post->id)}}"><i class=" material-icons">description</i></a>

                            <a class="btn btn-sm btn-info waves-effect" href="{{route('userPost.edit', $post->id)}}"><i class=" material-icons">edit</i></a>
                            
                            <a 
                            onclick=
                                "
                                event.preventDefault();
                                document.getElementById('UserpostDelete-{{$post->id}}').submit();
                                " 
                                class="btn btn-sm btn-danger waves-effect" 
                                href="javeScript:void(0);">
                                <i class=" material-icons">delete</i>
                            </a>

                            <form id="UserpostDelete-{{$post->id}}" action="{{route('userPost.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
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