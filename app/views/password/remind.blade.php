@extends('layout')
@section('content')
    <div class="holder">

        <div class="form-container password-remind">
            <h1>Reset Password</h1>
            {{ Form::open() }}

            <div class="field-container email">
                {{ Form::label('email', 'Email Address') }}
                {{ Form::email('email') }}
            </div>

            {{ Form::submit('Send email') }}

            {{ Form::close() }}
        </div>

    </div>
@stop