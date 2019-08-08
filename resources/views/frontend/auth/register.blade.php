@extends('layouts.frontendLayout')
@section('title', 'Register-Form')
@push('css')
	
@endpush
@section('frontend_content')
	<section class="blog-area section">
		<div class="container">
			
			<div class="row">
				<div class="col-md-7 offset-2">
					<div class="card">
						@if (Session::has('successMsg'))
						<div class="alert alert-success"><strong>{{session('successMsg')}}</strong></div>
						@endif
						
						<div class="card-header">Register</div>
						
						<div style="margin-top:10px;" class="card-body">
							<form action="{{url('register')}}" method="POST">
								@csrf
								<div class="form-group row">
									<label class="col-lg-2 form-control-label" for="name"><strong>Name</strong></label>
									<input id="name" value="{{old('name')}}" name="name" class="form-control form-control-sm col-lg-8" type="text">
									<small class="col-lg-12 text-danger">
											<strong>{{$errors->first('name')}}</strong>
									</small>
								</div>
								<div class="form-group row">
									<label class="col-lg-2 form-control-label" for="username"><strong>Username</strong> </label>
									<input id="username" value="{{old('username')}}" name="username" class="form-control form-control-sm col-lg-8" type="text">
									<small class="col-lg-12 text-danger">
											<strong>{{$errors->first('username')}}</strong>
									</small>
								</div>
								<div class="form-group row">
									<label class="col-lg-2 form-control-label" for="email"><strong>E-mail</strong> </label>
									<input id="email" value="{{old('email')}}" name="email" class="form-control form-control-sm col-lg-8" type="text">
									<small  class="col-lg-12 text-danger">
											<strong>{{$errors->first('email')}}</strong>
									</small>
								</div>
								<div class="form-group row">
									<label class="col-lg-2 form-control-label" for="password"><strong>Password</strong> </label>
									<input id="password" name="password" class="form-control form-control-sm col-lg-8" type="password">
									<small style="text-center" class="col-lg-12 text-danger">
											<strong>{{$errors->first('password')}}</strong>
									</small>
								</div>

								<div class="form-group row">
									<label class="col-lg-2 form-control-label" for="confirm_password"><strong>Confirm password</strong> </label>
									<input id="confirm_password" name="password_confirmation" class="form-control form-control-sm col-lg-8" type="password">
								</div>
								
								
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
					</div>
					</div>

					</div>
		
			</div><!-- row -->

		</div><!-- container -->
	</section><!-- section -->


	@endsection
	@push('js')
		
	@endpush