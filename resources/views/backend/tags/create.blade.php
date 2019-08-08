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
                    ADD TAG
                </h2>
            </div>
            <div class="body">
                <form method='post' action="{{route('tag.store')}}">
                    @csrf
                    <label for="name">Tag name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="{{old('name')}}" type="text" name="name" id="name" class="form-control" placeholder="Tag name">
                        </div>
                        <small class="text-danger">{{$errors->first('name')}}</small>
                    </div>
                    <br>
                    <a class="btn btn-danger m-t-15 waves-effect" href="{{route('tag.index')}}">BACK</a>
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
               progressBar:true
           });
       @endforeach 
    @endif
</script>
@endpush