@extends('layouts.frontendLayout')
@section('title', 'Login')
@push('css')
	
@endpush
@section('frontend_content')
	<section class="blog-area section">
		<div class="container">

			<div class="row">
				<div class="col-md-6 offset-3">
					<div class="card">
						@if (Session::has('successMsg'))
						<div class="alert alert-success"><strong>{{session('successMsg')}}</strong></div>
						@endif
						@if (Session::has('errorMsg'))
						<div class="alert alert-success"><strong>{{session('errorMsg')}}</strong></div>
						@endif
						<div class="card-header">{{ __('Login') }}</div>
		
						<div style="margin-top:10px;" class="card-body">
							<form class="col-md-12" method="POST" action="{{ route('login') }}">
								@csrf
		
								<div class="form-group row">
									<label for="email" class=" col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
		
									<div class="col-md-9">
										<input id="email" type="email" class="form-control w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
		
										@error('email')
											<span class="text-danger invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
		
								<div class="form-group row">
									<label for="password" class="col-md-3 col-form-label text-md-right">Password</label>
		
									<div class="col-md-9">
										<input id="password" type="password" class="w-100 form-control @error('password') is-invalid @enderror" name="password"  >
		
										@error('password')
											<span class=" text-danger invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
		
								<div style="margin-bottom: 2px!important;" class="form-group row mb-0">
									<div style="margin-bottom: 2px!important;" class="col-md-8">
										<button type="submit" class="btn btn-primary">
											{{ __('Login') }}
										</button>
		
										@if (Route::has('password.request'))
											<a class="btn btn-link" href="{{ route('password.request') }}">
												{{ __('Forgot Your Password?') }}
											</a>
										@endif
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div><!-- row -->

		</div><!-- container -->
	</section><!-- section -->


	@endsection
	@push('js')
		
	@endpush