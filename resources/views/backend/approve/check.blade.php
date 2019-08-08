@extends('layouts.backendLayout')
@section('title', 'post details')
@push('css')
<style>
    .custom {
        margin-top: -41px;
    }
    .custom2 {
        display: flex;
        justify-content: flex-end;
    }
</style>
@endpush

@section('content')

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <a class="btn btn-info waves-effect btn-sm" href="{{route('approval.index')}}">BACK</a>
                </h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-lg-6">
                                        <h2>
                                            <small><strong>NOT APPROVAL POST DETAILS</strong></small>
                                        </h2>
                                </div>
                                <div class="col-lg-6 custom2">
                                    <a
                                        onclick=
                                        "
                                        event.preventDefault();
                                        document.getElementById('approvalAction').submit();
                                        "
                                         class="btn btn-sm btn-info waves-effect" href=""> 
                                        APPROVED
                                    </a>
                                    <form style="display:none;" id="approvalAction" action="{{route('approval.action', $notApprovalPost->id)}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                </div>  
                            </div>    
                        </div>
                        <div class="body custom">
                            <div class="row">
                                <div class="col-lg-6"><h2>
                                        <small><strong>Created at:</strong>  {{$notApprovalPost->created_at->toFormattedDateString()}}</small>
                                        <small><strong>Updated at:</strong>  {{$notApprovalPost->updated_at->toFormattedDateString()}}</small>
                                    </h2>
                                    
                                    <p>- <strong>Post author:</strong>
                                        @if ($notApprovalPost->user_id)
                                            {{$notApprovalPost->user->username}}
                                            @elseif ($notApprovalPost->admin_id)
                                            {{$notApprovalPost->admin->username}}
                                        @endif
                                        </p>
                                    <p>- <strong>Post title:</strong>  {{$notApprovalPost->title}}</p>
                                    <p>- <strong>Post slug:</strong>  {{ $notApprovalPost->slug}}</p>
                                    <p>- <strong>Post description:</strong></p></div>
                                <div class="col-lg-6">
                                      <h4 style="margin-top:35px;">Related categories</h4>
                                      @foreach ($notApprovalPost->categories as $category)
                                         <p style="margin:0px!important;">{{$category->name}}</p> 
                                      @endforeach
                                      <h4 style="margin-top:10px;">Related tags</h4>
                                      @foreach ($notApprovalPost->tags as $tag)
                                         <p style="margin:0px!important;">{{$tag->name}}</p> 
                                      @endforeach
                                </div>
                            </div>
                            
                            <hr>
                            
                            <div>

                                {!!$notApprovalPost->description!!} 
                            </div>
                            
                            <hr>
                            <p>- <strong>Featured photo:</p>
                                <div class="card-image">
                                    <img style="width:200;height:250px;" src="{{asset('storage/post/'.$notApprovalPost->image)}}" alt="">
                                </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
@push('js')


@endpush