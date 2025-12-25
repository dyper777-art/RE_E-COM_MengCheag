
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('frontend/assets/img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul class="d-flex">
                            <li class="flex-grow-1"></li>
                            <li class="@if(request()->routeIs('home*')) active @endif"><a href="{{ route('home') }}">Home</a></li>
                            <li class="@if(request()->routeIs('cart*')) active @endif"><a href="{{ route('cart.index') }}">Cart</a></li>
                            {{-- <li class="@if(request()->routeIs('dashboard*')) active @endif"><a href="{{ route('dashboard') }}">Login</a></li> --}}
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <div class="header__cart__price"><a href="{{ route('backend.dashboard.index') }}"><h5><i class="fa fa-user">&nbsp;Login</i></h5></a></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
