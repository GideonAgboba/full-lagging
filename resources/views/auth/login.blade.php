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
						<div class="contact_form_title text-center">LOGIN WITH US</div>

						<form action="{{url('/login')}}" method="POST">
                            {{csrf_field()}}
							<div class="row">
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
                                <input id="email" type="email" class="input_field col-lg-7" placeholder="Your Email Address" name="email" value="{{ old('email') }}" required />
                               
                                <input id="password" type="password" class="input_field col-lg-5" placeholder="Your Password" name="password" required />
                            
								<button type="submit" class="button form-control contact_submit_button">LOGIN ACCOUNT</button>
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