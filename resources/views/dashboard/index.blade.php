@extends('layouts.dashboard')

@section('content')

  ... some user dashboard content ...

@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush