@extends('layout')
@section('content')
	<div class="c1">
		<div class="c3">
			<div class="c2">
				<div class="holder">
					<div class="form-container login">
						<h1>Login to your Account</h1>
						{{ Form::open(['route' => 'sessions.store']) }}
							<div class="field-container">
								{{ Form::label('email') }}
								{{ Form::email('email') }}
							</div>
							<div class="password field-container">
								{{ Form::label('password') }}
								{{ Form::password('password') }}
								<a class="forgot-password-link" href="/password/remind">Forgot password?</a>
							</div>
							<div>
								{{ Form::submit('Login') }}
							</div>
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop