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
                <form action="{{route('tag.update', $tag->id)}}" method='POST'>
                    @csrf
                    @method('PUT')
                    
                    <label for="name">Tag name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="{{$tag->name}}" type="text" name="name" id="name" class="form-control" placeholder="Tag name">
                        </div>
                        <small class="text-danger">{{$errors->first('name')}}</small>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="{{$tag->slug}}" type="text" name="slug" id="name" class="form-control" placeholder="Tag slug">
                        </div>
                        <small class="text-danger">{{$errors->first('slug')}}</small>
                    </div>
                    <br>
                    <a class="btn btn-danger m-t-15 waves-effect" href="{{route('tag.index')}}">BACK</a>
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