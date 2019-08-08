@extends('layouts.backendLayout')
@section('title', 'New category create')
@push('css')
@endpush
@section('content')

<section class="content">
        <div class="container-fluid">
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    ADD CATEGORY
                </h2>
            </div>
            <div class="body">
                <form method='post' action="{{route('category.store')}}" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Category name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="{{old('name')}}" type="text" name="name" id="name" class="form-control" placeholder="Category name">
                        </div>
                        <small class="text-danger">{{$errors->first('name')}}</small>
                    </div>
                    <label for="image">Category photo</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="{{old('image')}}" type="file" name="image" id="name" class="form-control">
                        </div>
                         <small class="text-danger">{{$errors->first('image')}}</small> 
                    </div>
                    <br>
                    <a class="btn btn-danger m-t-15 waves-effect" href="{{route('category.index')}}">BACK</a>
                    <button type="submin" class="btn btn-primary m-t-15 waves-effect">SAVE</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</section>

@endsection
@push('js')
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
</script>
@endpush