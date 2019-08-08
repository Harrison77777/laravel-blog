@extends('layouts.userDashboardLayout')
@section('title', 'user-profile')
@push('css')
<style>
        .custom {
            display: flex;
            justify-content: flex-end;
            margin: 0px;
            padding: 0px!important;
            margin-top: 0px;
        }
</style>
@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="card">
                <div class="body">
                    <div class="header custom">
                        <a style="margin-right:30px; margin-bottom:3px;" class="btn btn-info waves-effect" href="{{route('user.profile.reset.form')}}">Reset password</a>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                        <form class="form-horizontal" action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="form-group">
                                <label for="NameSurname" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="NameSurname" name="username" placeholder="Name Surname" value="{{Auth::user('web')->username}}">
                                    </div>
                                    <small class="text-danger">{{$errors->first('username')}}</small>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="{{Auth::user('web')->email}}" disabled readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputExperience" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <textarea {{ (Auth::user('web')->description == false) ? "placeholder='Write some of your descriptions here'" : '' }}  class="form-control" id="InputExperience" name="description" rows="3">{{Auth::user('web')->description}}
                                            {{--  {{Auth::user('admin')->description ? Auth::user('admin')->description : ''}}  --}}
                                        {{--  @if (Auth::user('admin')->description)
                                        {{Auth::user('admin')->description}}
                                        @endif  --}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2">Current porfile photo</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                       <img class=" img-rounded" height="120" width="170" src="{{asset('storage/user/'.Auth::user('web')->image)}}" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image" class="col-sm-2 control-label">Skills</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="file" class="form-control" id="image" name="image" >
                                    </div>
                                </div>
                                <small class="text-danger">{{$errors->first('image')}}</small>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class=" waves-effect btn btn-danger">SUBMIT</button>
                                    
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
