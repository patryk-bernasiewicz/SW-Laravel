@extends('layouts.dashboard')

@section('content')

  ... some user dashboard content ...

  <div class="mt-4 border border-gray-100 p-2">
    @if (!empty($user_token))
      Your own API key: <strong class="display-block ml-2">{{ $user_token }}</strong><br />
      Use it wisely and don't show it to anyone!
    @else
      You haven't generated your API key yet.<br />
      <a href="/dashboard/generate_api_key" class="btn mt-2">Request one now</a>
    @endif
  </div>

@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush