@extends('layouts.app')

@section('content')
  {{ json_encode($user) }}
@endsection