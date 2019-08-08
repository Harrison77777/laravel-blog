@extends('layouts.userDashboardLayout')
@section('title', 'user-profile')
@push('css')
<style>
        {{--  .custom {
            margin: 0px;
            padding: 0px!important;
            margin-top: 0px;
        }  --}}
        .custom2{
            display: flex;
            justify-content: flex-end;
        }
</style>
@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="card">
                    @if (Session::has('errorMsg'))
                    <div class="alert text-center alert-danger"><strong>{{session('errorMsg')}}</strong></div>
                    @endif
                <div class="header custom">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>RESET PASSWORD</h4> 
                        </div>
                        <div class="col-lg-6 custom2">
                            <a class=" btn btn-danger btn-sm waves-effect" href="{{route('user.profile.setting')}}">BACK</a>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                        <form class="form-horizontal" action="{{route('user.profile.reset.password')}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <div class="form-group">
                                <label for="old_passoword" class="col-sm-2 control-label">Old password</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old password">
                                    </div>
                                    <small class="text-danger">{{$errors->first('old_password')}}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">New password</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="New password">
                                    </div>
                                    <small class="text-danger">{{$errors->first('password')}}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="col-sm-2 control-label">Confirm password </label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter you new password again">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class=" waves-effect btn btn-info">SUBMIT</button>
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
<script src="{{asset('frontend/userDashboard/js/pages/examples/profile.js')}}"></script>
@endpush