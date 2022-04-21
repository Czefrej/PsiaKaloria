<!-- Navigation starts -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-md">
          <a class="navbar-brand" href="#">
              <img src="{{ asset('images/logo.svg') }}" alt="">
          </a>
          <button class="navbar-toggler" type="button" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="mobile-nav">
            <ul class="navbar-nav d-flex flex-row gap-4 pe-2">
                <li class="nav-item">
                    <a class="nav-link icon-link" href="{{route('account.settings')}}"><img src="{{ asset('images/user-icon.svg') }}" alt=""></a>
                </li>
{{--                <li class="nav-item btn-group cart-dropdown">--}}
{{--                    <a href="{{route('cart')}}" class="nav-link icon-link position-relative" id="dropdown-toggle-mobile"  data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">--}}
{{--                        @livewire('cart-counter')--}}
{{--                    </a>--}}
{{--                    @livewire('added-to-cart-modal',['dropdown_id'=>'dropdown-toggle-mobile'])--}}
{{--                </li>--}}
            </ul>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav left-nav me-auto mb-2 mb-lg-0 ps-5">
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link @if(Route::current()->getName() == 'home') active @endif"  @if(Route::current()->getName() == 'home') aria-current="page" @endif href="{{route('home')}}">Główna</a>--}}
{{--              </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link @if(Route::current()->getName() == 'products') active @endif"  @if(Route::current()->getName() == 'products') aria-current="page" @endif href="{{route('products')}}">Produkty</a>--}}
{{--                </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link @if(Route::current()->getName() == 'faq') active @endif" @if(Route::current()->getName() == 'faq') aria-current="page" @endif href="{{route('faq')}}">FAQ</a>--}}
{{--              </li>--}}
            </ul>
            <ul class="navbar-nav">
{{--                @if (Auth::check())--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link punkty-link" href="#">--}}
{{--                            <span class="d-block fw-normal">Punkty:</span>--}}
{{--                            <span class="d-block text-primary">25</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endif--}}
                <li class="nav-item">
                    <a class="nav-link icon-link" href="{{route('account.settings')}}"><img src="{{ asset('images/user-icon.svg') }}" alt=""></a>
                </li>
{{--                <li class="nav-item btn-group cart-dropdown">--}}
{{--                    <a href="#" class="nav-link icon-link position-relative" id="dropdown-toggle-desktop"  data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">--}}
{{--                        @livewire('cart-counter')--}}
{{--                    </a>--}}
{{--                    @livewire('added-to-cart-modal',['dropdown_id'=>'dropdown-toggle-desktop'])--}}
{{--                </li>--}}
                @if (Auth::check())
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link border-0">
                                Wyloguj się
                            </button>
                        </form>
                    </li>
                @endif
            </ul>
          </div>
        </div>
    </nav>
    <div class="mobile-nav-list py-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="#" class="close-mobile-nav-list">
                        <img src="{{ asset('images/close_icon.svg') }}" alt="">
                    </a>
                    <nav class="mt-3">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link @if(Route::current()->getName() == 'home') active @endif"  @if(Route::current()->getName() == 'home') aria-current="page" @endif href="/jak-to-dziala">Jak to działa?</a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link @if(Route::current()->getName() == 'home') active @endif"  @if(Route::current()->getName() == 'home') aria-current="page" @endif href="{{route('home')}}">Główna</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link @if(Route::current()->getName() == 'products') active @endif" @if(Route::current()->getName() == 'products') aria-current="page" @endif href="{{route('products')}}">Produkty</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link @if(Route::current()->getName() == 'faq') active @endif"  @if(Route::current()->getName() == 'faq') aria-current="page" @endif href="{{route('faq')}}">FAQ</a>--}}
{{--                            </li>--}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Navigation ends -->
