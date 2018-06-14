@extends('layouts.app')
@include('layouts.navbar-min')
@section('contents')
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<div class="container pb-5">
    <div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">GET STARTED WITH US</div>

						<form action="{{url('/register')}}" method="POST">
                            {{csrf_field()}}
                            <div class="row">
                                @if ($errors->has('name'))
                                    <span class="alert alert-danger text-center container-fluid">
                                        <a>{{ $errors->first('name') }}</a>
                                    </span>
                                @endif
                                @if ($errors->has('email'))
                                    <span class="alert alert-danger text-center container-fluid">
                                        <a>{{ $errors->first('email') }}</a>
                                    </span>
                                @endif
                                @if ($errors->has('password'))
                                    <span class="alert alert-danger text-center container-fluid">
                                        <a>{{ $errors->first('password') }}</a>
                                    </span>
                                @endif
                                @if ($errors->has('password_confirmation'))
                                    <span class="alert alert-danger text-center container-fluid">
                                        <a>{{ $errors->first('password_confirmation') }}</a>
                                    </span>
                                @endif
                                
                                <input id="name" type="text" class="input_field col-lg-5" name="name" placeholder="Your Fullname" value="{{ old('name') }}" required />

                                
                                <input id="email" type="email" class="input_field col-lg-7" placeholder="Your Email Address" name="email" value="{{ old('email') }}" required />
                                
                            </div>
							<div class="row">
                                <select name="role_id" class="col-lg-4 m-0 bg-white pl-4 input_field" required >
                                    <option value="">Account Type</option>
                                    @if($roles = App\Role::all())
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->title}}</option>
                                        @endforeach
                                    @endif
                                    <!-- <option value="1">Account</option>
                                    <option value="2">Marchant</option>
                                    <option value="3">G-Marchant</option>
                                    <option value="4">Customer</option> -->
                                </select>
                                <input id="password" type="password" class="input_field col-lg-4" placeholder="Your Password" name="password" required />
    
								
                                <input id="password-confirm" type="password" class="input_field col-lg-4" placeholder="Confirm Password" name="password_confirmation" required />

                                
								<button type="submit" class="button form-control contact_submit_button">REGISTER ACCOUNT</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<!-- <div class="panel"></div> -->
	</div>
</div>
@include('layouts.footer')
@endsection
