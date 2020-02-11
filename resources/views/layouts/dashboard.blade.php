@include('layouts._header')

<main class="container mx-auto py-4">
    @include('components/_messages')

    <h1 class="heading">{{ $title ?? 'Dashboard' }}</h1>
    
    <div class="w-full flex flex-col flex-grow sm:flex-row">
        <div class="border border-gray-300 w-full sm:w-1/4 sm:mr-1">
            <ul class="dashboard__menu">
                <li>
                    <a href="/dashboard">Dashboard</a>
                </li>

                @if (Auth::user()->is('admin'))
                    <li>
                        <a href="/dashboard/swapi">Star Wars characters</a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="border border-gray-300 w-full py-1 px-2 sm:w-3/2 sm:ml-1">
            @yield('content')
        </div>
    </div>
</main>

@include('layouts._footer')