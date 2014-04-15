@extends('layout')
@section('content')

    <div class="holder">

        <div class="form-container password-reset">

            <h1>Reset your password</h1>

            {{ Form::open() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="field-container">
                    {{ Form::label('email', 'Email address:') }}
                    {{ Form::email('email') }}
                </div>

                <div class="field-container">

                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password') }}

                </div>

                <div class="field-container">

                    {{ Form::label('password_confirmation') }}
                    {{ Form::password('password_confirmation') }}

                </div>

                {{ Form::submit('Reset') }}

            {{ Form::close() }}

        </div>

    </div>

@stop