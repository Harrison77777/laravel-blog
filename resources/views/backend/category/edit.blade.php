@extends('layouts.backendLayout')
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
                    EDIT TAG
                </h2>
            </div>
            <div class="body">
                <form action="{{route('category.update', $categoryEdit->id)}}" method='POST' enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <label for="name">Tag name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="{{$categoryEdit->name}}" type="text" name="name" id="name" class="form-control" placeholder="Tag name">
                        </div>
                        <small class="text-danger">{{$errors->first('name')}}</small>
                    </div>
                    <label for="">Current photo</label>
                    <br>
                    <img height="200" width="400" src="{{asset('storage/category/'.$categoryEdit->image)}}" alt="">
                    <br>
                    <label for="image">Category photo</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <small class="text-danger">{{$errors->first('image')}}</small>
                    </div>
                    <br>
                    <a class="btn btn-danger m-t-15 waves-effect" href="{{route('category.index')}}">BACK</a>
                    <button type="submin" class="btn btn-primary m-t-15 waves-effect">SAVE CHANGE</button>
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
               progressBar:true
           });
       @endforeach 
    @endif
</script>
@endpush