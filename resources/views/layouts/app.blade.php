@include('layouts._header')

<main class="container mx-auto py-4">
    @include('components/_messages')
    @yield('content')
</main>

@include('layouts._footer')
