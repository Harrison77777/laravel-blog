@extends('layouts.backendLayout')
@section('title', 'Admin-user-profile')
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
                            <img width="90" height="90" src="{{asset('storage/admin/'.Auth::user('admin')->image)}}" alt="AdminBSB - Profile Image" />
                        </div>
                        <div class="content-area">
                            <h3>{{Auth::user('admin')->username}}</h3>
                            <p>{{Auth::user('admin')->email}}</p>
                            <p>
                                @if (Auth::user('admin')->role == 1)
                                    Super-Admin
                                    
                                @elseif (Auth::user('admin')->role == 2)
                                    Admin 
                                @elseif (Auth::user('admin')->role == 3)
                                    Checker    
                                @endif
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
                                {{--  <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>  --}}
                                {{--  <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>  --}}
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    <div class="panel panel-default panel-post">
                                        <div class="panel-heading">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img src="{{asset('storage/admin/'.Auth::user('admin')->image)}}" />
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <a href="#">{{Auth::user('admin')->username}}</a>
                                                    </h4>
                                                    Joined Date - {{Auth::user('admin')->created_at}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="post">
                                                <div class="post-heading">
                                                    <p>{{Auth::user('admin')->description ? Auth::user('admin')->description : 'Not description is written yet'}}</p>
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
                                
                                {{--  <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-danger">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>  --}}
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
<script src="{{asset('backend/js/pages/examples/profile.js')}}"></script>
@endpush