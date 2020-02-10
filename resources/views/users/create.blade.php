@extends('layouts.app')

@section('content')

  @if (count($errors) > 0)
    <div class="message border border-solid border-red-200 p-2">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  
  {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
      
    <div class="form-group">
      {{ Form::label('name', __('Name'), ['class' => 'w-24']) }}
      {{ Form::text('name', '', ['class' => 'textfield', 'required' => true, 'autocomplete' => 'new_name', 'autofocus' => 'true']) }}
    </div>

    <div class="form-group">
      {{ Form::label('email', __('Email'), ['class' => 'w-24']) }}
      {{ Form::email('email', '', ['class' => 'textfield', 'required' => true, 'autocomplete' => 'new_email']) }}
    </div>

    <div class="form-group">
      {{ Form::label('password', __('Password'), ['class' => 'w-24']) }}
      {{ Form::password('password', ['class' => 'textfield']) }}
    </div>

    <div class="form-group">
      {{ Form::label('password-confirm', __('Confirm Password'), ['class' => 'w-24']) }}
      {{ Form::password('confirm-password', ['class' => 'textfield', 'required' => true, 'autocomplete' => 'new-password']) }}
    </div>

  {!! Form::close() !!}
@endsection
