@extends('layouts.userDashboardLayout')
@section('title', 'user-profile')
@push('css')


@endpush

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            <img width="90" height="90" src="{{asset('storage/user/'.Auth::user('web')->image)}}" alt="AdminBSB - Profile Image" />
                        </div>
                        <div class="content-area">
                            <h3>{{Auth::user('web')->username}}</h3>
                            <p>{{Auth::user('web')->email}}</p>
                            <p>
                               Author
                            </p>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>
                            <li>
                                <span>Total Post</span>
                                <span>{{$postCount}}</span>
                            </li>
                            {{--  <li>
                                <span>Following</span>
                                <span>1.201</span>
                            </li>
                            <li>
                                <span>Friends</span>
                                <span>14.252</span>
                            </li>  --}}
                        </ul>
                        <button class="btn btn-primary btn-lg waves-effect btn-block">PROFILE INFO</button>
                    </div>
                </div>

               
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">INFORMATION</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    <div class="panel panel-default panel-post">
                                        <div class="panel-heading">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img src="{{asset('storage/user/'.Auth::user('web')->image)}}" />
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <a href="#">{{Auth::user('web')->username}}</a>
                                                    </h4>
                                                    Joined Date - {{Auth::user('web')->created_at}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="post">
                                                <div class="post-heading">
                                                    <p>{{Auth::user('web')->description ? Auth::user('web')->description : 'Not description is written yet'}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="material-icons">thumb_up</i>
                                                        <span>12 Likes</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="material-icons">comment</i>
                                                        <span>5 Comments</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('js')
<script src="{{asset('frontend/userDashboard/js/pages/examples/profile.js')}}"></script>
@endpush