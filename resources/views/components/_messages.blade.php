@if (session('message'))
  <div class="message bg-green-100 border border-solid border-green-200 p-2 mb-2">
    {{ session('message') }}
  </div>
@endif

@if (session('error'))
  <div class="message bg-red-100 border border-solid border-red-200 p-2 mb-2">
    {{ session('error') }}
  </div>
@endif