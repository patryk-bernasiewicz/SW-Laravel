@extends('layouts.dashboard')

@section('content')
  @if ($characters > 0)
    There's {{ $characters }} imported characters in our database.
  @else
    There are no characters in our database! Import some now!
  @endif

  <div class="mt-4 flex items-start">
    <button type="button" class="btn" id="swapi_refresh">Load characters from swapi.co</button>
  </div>
@endsection

@push('head-scripts')
  <script type="text/javascript" src="{{ asset('js/dashboard-swapi.js') }}"></script>
@endpush