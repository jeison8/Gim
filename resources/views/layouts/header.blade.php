    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <div class="row">
            <a href="/"><img src="{{asset('images/bless.png')}}" width="100px"></a>
                  
              </div>
          </div>
          <div class="ml-auto">
            <div class="row">

              <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mr-auto">
                    <!-- <li><a href="#home-section" class="nav-link">Home</a></li>
                    <li><a href="#fit-section" class="nav-link">Consejos</a></li>
                    <li><a href="#classes-section" class="nav-link">Clases</a></li>
                    <li><a href="#trainer-section" class="nav-link">Entrenadores</a></li> -->
                  @guest
                          <a href="{{ route('login') }}" class="text-white"><strong style="font-weight: bold;">Ingresar</strong></a>
                      {{--@if (Route::has('register'))
                          <li class="nav-item">
                              <a href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif --}}
                  @else
                          <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              <strong style="font-weight: bold;">{{Auth::user()->name}}</strong>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('users.index') }}" style="color:Black;">
                                  <strong style="font-weight: bold;">Usuarios</strong>
                              </a>
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:#f23a2e;">
                                  <strong style="font-weight: bold;">Cerrar sesion</strong>
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </div>
                  @endguest
                </ul>
              </nav>
            </div>
          </div>

        </div>
      </div>

    </header>

                       
  
