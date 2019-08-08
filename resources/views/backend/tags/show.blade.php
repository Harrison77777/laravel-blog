@extends('layouts.backendLayout')
@push('css')


@endpush

@section('content')

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <a class="btn btn-info waves-effect btn-sm" href="{{route('tag.index')}}">BACK</a>
                </h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <small><strong>TAG DETAILS</strong> </small>
                            </h2>
                        </div>
                        <div class="body">
                                <h2>
                                    <small><strong>Created at:</strong>  {{$tagDetails->created_at}}</small>
                                </h2>
                            <p>- <strong>Tag name:</strong>  {{$tagDetails->name}}</p>
                            <p>- <strong>Tag slug:</strong>  {{ $tagDetails->slug}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
@push('js')


@endpush