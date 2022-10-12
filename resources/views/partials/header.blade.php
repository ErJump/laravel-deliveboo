<header>
    <nav class="navbar navbar-dark navbar-expand-lg px-5">
        <div class="container-fluid d-flex">
            <a class="navbar-brand" href="#">
                <img class="d-none d-sm-none d-md-none d-lg-block d-xl-block" src="{{asset('assets/images/logo-white.png')}}" alt="logo">
                <img class="d-block d-sm-block d-md-block d-lg-none d-xl-none" src="{{asset('assets/images/logo-small.png')}}" alt="logo-small">
            </a>
            <div class="d-flex justify-content-between">
                <i class="fa-solid fa-cart-shopping text-white fa-2x justify-self-end me-4"></i>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav navbar-dark">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                        <a class="text-white nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Esci') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

