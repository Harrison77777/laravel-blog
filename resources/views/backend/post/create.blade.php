@extends('layouts.backendLayout')
@section('title', 'Create new post')
@push('css')
<!-- Bootstrap Select Css -->
<link href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
@section('content')

<section class="content">
        <div class="container-fluid">
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    ADD POST
                </h2>
            </div>
            <div class="body h-100">
                <form class="col-lg-12 w-100" method='post' action="{{route('post.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="header">
                                    <h5>ADD NEW POST</h5>
                                </div>
                                <div class="body">
                                    <label for="name">Title</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="{{old('title')}}" type="text" name="title" id="name" class="form-control" placeholder="Enter title here">
                                        </div>
                                        <small class="text-danger">{{$errors->first('title')}}</small>
                                    </div>
                                    <label for="image">Featured photo</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="{{old('image')}}" type="file" name="image" id="name" class="form-control">
                                        </div>
                                            <small class="text-danger">{{$errors->first('image')}}</small> 
                                    </div>
                                    <div class="form-group">
                                        <input value="1" type="checkbox" name="publish" id="Publish" class="filled-in" >
                                        <label for="Publish">Publish</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="header">
                                    <h5>CATEGORIES AND TAGS</h5>
                                </div>
                                <div class="body">
                                    <label for="category">Select Categories</label>
                                    <div class="form-group">
                                            <select class="form-control show-tick" data-live-search='ture'  name="category_id[]" id="category" multiple>
                                                @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option> 
                                                @endforeach
                                            </select>
                                        <small class="text-danger">{{$errors->first('category_id')}}</small> 
                                    </div>
                                    <label for="tag">Select Tags</label>
                                    <div class="form-group">
                                            <select class="form-control show-tick" data-live-search='ture'  name="tag_id[]" id="tag" multiple>
                                                @foreach ($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                        <small class="text-danger">{{$errors->first('tag_id')}}</small> 
                                    </div>
                                    <a class="btn btn-danger m-t-15 waves-effect" href="{{route('post.index')}}">BACK</a>
                                    <button type="submin" class="btn btn-primary m-t-15 waves-effect">SAVE</button>
                                </div>     
                            </div>   
                        </div>
                    </div>

                    <div class="row crearfix">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="header">
                                   <h5>POST BODY</h5> 
                                </div>
                                <div class="body">
                                    <small class="text-danger">{{$errors->first('description')}}</small>  
                                    <textarea name="description" id="tinymce">{{old('description')}}
                                            
                                    </textarea> 
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</section>

@endsection
@push('js')

 {{-- Multi Select Plugin Js  --}}
    <script src="{{asset('backend/plugins/multi-select/js/jquery.multi-select.js')}}"></script>

<script src="{{asset('backend/plugins/tinymce/tinymce.js')}}"></script>
<script>
    @if ($errors->any())
       @foreach ($errors->all() as $error)
           toastr.error('{{$error}}', 'error', {
               closeButton:true,
               progressBar:true,
               positionClass:'toast-bottom-right',
               
           });
       @endforeach 
    @endif
    $(function () {
        //TinyMCE
        tinymce.init({
            selector: "textarea#tinymce",
            theme: "modern",
            height: 300,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true
        });
        tinymce.suffix = ".min";
        tinyMCE.baseURL = "{{asset('backend/plugins/tinymce')}}";
    });
</script>
@endpush