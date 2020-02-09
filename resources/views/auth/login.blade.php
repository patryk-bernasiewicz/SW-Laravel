@extends('layouts.app')

@section('content')
    {!! Form::open(['method' => 'POST', 'url' => route('login')]) !!}
    
        @csrf

        <div class="form-group @error('name') is-invalid @enderror">
            {{ Form::label('email', __('Email'), ['class' => 'w-24']) }}
            {{ Form::email('email', old('email'), ['class' => 'textfield', 'required' => true, 'autocomplete' => 'email', 'autofocus' => true]) }}

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::label('password', __('Password'), ['class' => 'w-24']) }}
            {{ Form::password('password', ['class' => 'textfield', 'required' => true, 'autocomplete' => 'current-password']) }}

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::checkbox('remember', 'remember', old('remember'), ['id' => 'remember']) }}
            {{ Form::label('remember', __('Remember Me')) }}
        </div>

        <div class="form-group justify-between">
            {{ Form::submit(__('Login'), ['class' => 'btn']) }}

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="btn mt-2">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    
    {!! Form::close() !!}
@endsection
