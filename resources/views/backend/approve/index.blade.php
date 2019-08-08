@extends('layouts.backendLayout')
@push('css')
<link href="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush
@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    APPROVAL NEED
                </h2>
            </div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">               
                <h2>ALL NOT APPROVED POST</h2>               
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Author</th>
                                <th>Title</th>                              
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Approval</th>
                                <th>Created at</th>                              
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Serial</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Approval</th>
                                <th>Created at</th>
                                
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($notApprovalPosts as $notApprovalPost)
                            <tr>
                                <td><h5 style="margin-top:15px;">{{$loop->index + 1}}</h5></td>
                                <td>
                                    @if ($notApprovalPost->user_id)
                                    <h5 style="margin-top:15px;">{{$notApprovalPost->user->username}}</h5>  
                                        @elseif ($notApprovalPost->admin_id)
                                        <h5 style="margin-top:15px;"> {{$notApprovalPost->admin->username}}</h5>
                                        @endif
                                </td>
                                <td><h5 style="margin-top:15px;">{{str_limit($notApprovalPost->title, 25)}}</h5></td>
                                <td class="text-center"><img width="70" height="45" src="{{asset('storage/post/'.$notApprovalPost->image)}}" alt=""></td>
                                <td><span style="margin-top:13px; padding:5px;" class="badge {{$notApprovalPost->status ? 'bg-cyan' : 'bg-red'}} ">{{$notApprovalPost->status ? 'Published' : 'Not-Published'}}</span></td>
                                <td><span style="margin-top:13px; padding:5px;" class="badge {{$notApprovalPost->is_approved ? 'bg-cyan' : 'bg-red'}} ">{{$notApprovalPost->is_approved ? 'Approved' : 'Not-Approved'}}</span></td>

                                <td><h5 style="margin-top:15px;">{{$notApprovalPost->created_at}}</h5></td>
                            
                                <td class="text-center">
                                    <a style="margin-top:5px;" class="btn btn-sm btn-primary waves-effect" href="{{route('approval.check', $notApprovalPost->id)}}"><i class=" material-icons">visibility</i></a>
                                    <a
                                        onclick=
                                        "
                                        event.preventDefault();
                                        document.getElementById('approvalAction-{{$notApprovalPost->id}}').submit();
                                        "
                                    style="margin-top:5px;" class="btn btn-sm btn-info waves-effect" href=""><i class=" material-icons">done</i></a>
                                    <a 
                                    style="margin-top:5px;"
                                    onclick=
                                        "
                                        event.preventDefault();
                                        document.getElementById('deleteNotApprovedPost-{{$notApprovalPost->id}}').submit();
                                        " 
                                        class="btn btn-sm btn-danger waves-effect" 
                                        href="#">
                                        <i class=" material-icons">delete</i>
                                    </a>
                                    <form id="deleteNotApprovedPost-{{$notApprovalPost->id}}" action="{{route('approval.delete', $notApprovalPost->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <form id="approvalAction-{{$notApprovalPost->id}}" action="{{route('approval.action',   $notApprovalPost->id)}}" method="POST">
                                        @csrf
                                        @method('PATCH')
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