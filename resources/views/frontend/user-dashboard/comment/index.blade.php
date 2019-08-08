@extends('layouts.userDashboardLayout')
@push('css')
<link href="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush

@section('content')

<section class="content">
<div class="container-fluid">
            <div class="block-header">
                <h2>
                    <a class="btn btn-info waves-effect btn-sm" href="{{route('post.create')}}">ADD NEW POST</a>
                </h2>
            </div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>ALL POSTS</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th class="text-center">Serial</th>
                                <th class="text-center">Comment</th>
                                <th class="text-center">Post name</th>
                                <th class="text-center">By comment</th>
                                <th class="text-center">commenter pic</th>
                                <th class="text-center">Created at</th>                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-center">Serial</th>
                                <th class="text-center">Comment</th>
                                <th class="text-center">Post name</th>
                                <th class="text-center">By comment</th>
                                <th class="text-center">commenter pic</th>
                                <th class="text-center">Created at</th>                                
                            </tr>
                        </tfoot>
                        <tbody>
                      @foreach ($posts as $post)
                        @foreach ($post->comments as $comment)
                      <tr>
                        <td class="text-center"> {{$loop->index + 1}}</td>
                        <td class="text-center">{{$comment->comment}} </td>
                        <td class="text-center"> {{$comment->post->title}} </td>
                        <td>{{$comment->user->username}} </td>
                        <td class="text-center">
                            <img class=" img-rounded" width="70" height="45" src="{{asset('storage/user/'.$comment->user->image)}}" alt="">
                        </td>
                        <td class="text-center">{{$comment->created_at}}</td>
                      </tr>
                      @endforeach
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

<script src="{{asset('backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/js/pages/tables/jquery-datatable.js')}}"></script>

@endpush