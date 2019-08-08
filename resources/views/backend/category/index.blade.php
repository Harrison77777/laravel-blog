@extends('layouts.backendLayout')
@section('title', 'All categories')
@push('css')
<link href="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

@endpush

@section('content')

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <a class="btn btn-info waves-effect btn-sm" href="{{route('category.create')}}">ADD NEW GATEGORY</a>
                </h2>
            </div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                
                <h2>ALL CATEGORIES</h2>
               
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th class="text-center">Serial</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Slug</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Created at</th>
                                <th class="text-center">Updated at</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-center">Serial</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Slug</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Created at</th>
                                <th class="text-center">Updated at</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                      @foreach ($categories as $category)
                      <tr>
                        <td class="text-center">{{$loop->index + 1}}</td>
                        <td class="text-center">{{$category->name}}</td>
                        <td class="text-center">{{$category->slug}}</td>
                        <td class="text-center">
                            <img width="70" height="45" src="{{asset('storage/category/'.$category->image)}}" alt="">
                        </td>
                        <td class="text-center">{{$category->created_at}}</td>
                        <td class="text-center">{{$category->updated_at}}</td>
                        <td class="text-center">

                            <a class="btn btn-sm btn-primary waves-effect" href="{{route('category.show', $category->id)}}"><i class=" material-icons">description</i></a>

                            <a class="btn btn-sm btn-info waves-effect" href="{{route('category.edit', $category->id)}}"><i class=" material-icons">edit</i></a>
                            
                            <a 
                            onclick=
                                "
                                event.preventDefault();
                                document.getElementById('categoryDelete-{{$category->id}}').submit();
                                " 
                                class="btn btn-sm btn-danger waves-effect" 
                                href="#">
                                <i class=" material-icons">delete</i>
                            </a>

                            <form id="categoryDelete-{{$category->id}}" action="{{route('category.destroy', $category->id)}}" method="POST">
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