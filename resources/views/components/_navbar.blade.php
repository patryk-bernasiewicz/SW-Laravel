<div class="navbar relative border-b border-gray-300 bg-white">
  <div class="navbar__wrapper h-12 container px-2 mx-auto flex items-center">
    <button type="button" class="navbar__toggle sm:hidden">
      m
    </button>
    
    <a href="/" class="navbar__brand ml-auto sm:mx-0">Zadanie</a>

    <div class="navbar__collapse absolute z-10 bg-white sm:static sm:bg-transparent sm:ml-auto sm:mr-0">
      <ul class="navbar__nav container mx-auto border-b border-gray-300 sm:flex sm:justify-end sm:border-0">
        @guest
          <li class="navbar__item">
            <a href="{{ route('login') }}" class="navbar__link">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
            <li class="navbar__item">
              <a href="{{ route('register') }}" class="navbar__link">{{ __('Register') }}</a>
            </li>
          @endif
        @else

          <li class="navbar__item">
            <a href="#" class="navbar__link">Logged in as {{ Auth::user()->name }}</a>
          </li>
          <li class="navbar__item">
            <a href="/dashboard" class="navbar__link">Dashboard</a>
          </li>

          <li class="navbar__item mt-3 sm:m-0">
            {{ Form::open(['method' => 'POST', 'url' => route('logout')], ['id' => 'logout-form']) }}
              @csrf
              <input type="submit" class="navbar__link" value="{{ __('Logout') }}">
            {{ Form::close() }}
          </li>
        @endguest
      </ul>
    </div>
  </div>
</div>