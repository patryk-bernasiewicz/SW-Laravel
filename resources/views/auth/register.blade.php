@extends('layouts.app')

@section('content')
    {!! Form::open(['method' => 'POST', 'url' => route('register')]) !!}
        <div class="form mx-auto container px-2">
            @csrf

            <div class="form__group @error('name') is-invalid @enderror">
                {{ Form::label('name', __('Name'), ['class' => 'w-24']) }}
                {{ Form::text('name', old('name'), ['id' => 'name', 'class' => 'textfield', 'required' => true, 'autocomplete' => 'name', 'autofocus' => true]) }}
            </div>

            <div class="form__group @error('email') is-invalid @enderror">
                {{ Form::label('email', __('Email'), ['class' => 'w-24']) }}
                {{ Form::email('email', old('email'), ['id' => 'email', 'class' => 'textfield', 'required' => true, 'autocomplete' => 'email']) }}
            </div>

            <div class="form__group @error('password') is-invalid @enderror">
                {{ Form::label('password', __('Password'), ['class' => 'w-24']) }}
                {{ Form::password('password', ['id' => 'password', 'class' => 'textfield', 'required' => true, 'autocomplete' => 'new-password']) }}
            </div>
            @error('password')
                <div class="form__error">
                    {{ $message }}
                </div>
            @enderror

            <div class="form__group">
                {{ Form::label('password-confirm', __('Confirm Password'), ['class' => 'w-24']) }}
                {{ Form::password('password_confirmation', ['id' => 'password-confirm', 'class' => 'textfield', 'required' => true, 'autocomplete' => 'new-password']) }}
            </div>

            <div class="form__group">
                <button type="submit" class="btn">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    {!! Form::close() !!}
@endsection
