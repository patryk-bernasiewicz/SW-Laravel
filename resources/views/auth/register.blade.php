@extends('layouts.app')

@section('content')
    {!! Form::open(['method' => 'POST', 'url' => route('register')]) !!}
        @csrf

        <div class="form-group @error('name') is-invalid @enderror">
            {{ Form::label('name', __('Name'), ['class' => 'w-24']) }}
            {{ Form::text('name', old('name'), ['id' => 'name', 'class' => 'textfield', 'required' => true, 'autocomplete' => 'name', 'autofocus' => true]) }}
        </div>

        <div class="form-group @error('email') is-invalid @enderror">
            {{ Form::label('email', __('Email'), ['class' => 'w-24']) }}
            {{ Form::email('email', old('email'), ['id' => 'email', 'class' => 'textfield', 'required' => true, 'autocomplete' => 'email']) }}
        </div>

        <div class="form-group @error('password') is-invalid @enderror">
            {{ Form::label('password', __('Password'), ['class' => 'w-24']) }}
            {{ Form::password('password', ['id' => 'password', 'class' => 'textfield', 'required' => true, 'autocomplete' => 'new-password']) }}
        </div>

        <div class="form-group">
            {{ Form::label('password-confirm', __('Confirm Password'), ['class' => 'w-24']) }}
            {{ Form::password('password_confirmation', ['id' => 'password-confirm', 'class' => 'textfield', 'required' => true, 'autocomplete' => 'new-password']) }}
        </div>

        <div class="form-group">
            <button type="submit" class="btn">
                {{ __('Register') }}
            </button>
        </div>
    {!! Form::close() !!}
@endsection
