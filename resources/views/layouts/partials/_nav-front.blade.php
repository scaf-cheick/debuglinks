<header>

    <!-- Dropdown Account Structure -->
    <ul id="account" class="dropdown-content">
      <li>
        <a href="{{route('account.home')}}">Dashbord<i class="material-icons green-text left">dashboard</i></a>
      </li>
      <li class="divider"></li>
      <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout<i class="material-icons green-text left">exit_to_app</i></a>
      </li>

        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
          @csrf
        </form>

    </ul>

    <div class="navbar-fixed">
      <nav class="white-text nav_style z-depth-3 back-color">
        <div class="marge">
          <div class="nav-wrapper">
            <a href="{{route('welcome')}}" class="brand-logo">DebugLinks</a>
            <a href="" data-target="side_nav" class="sidenav-trigger" >
              <i class="material-icons white-text">menu</i>
            </a>              
            <ul class="right hide-on-med-and-down">

              <li class="@if(Route::currentRouteName() == 'threads.index' || Route::currentRouteName() == 'threads.show') active @endif"><a href="{{route('threads.index')}}">Solutions</a></li>
              <li class="@if(Route::currentRouteName() == 'member.home' || Route::currentRouteName() == 'member.show') active @endif"><a href="{{route('member.home')}}">Members</a></li>

              @if(!Auth::check())

                <li class="@if(Route::currentRouteName() == 'login') active @endif"><a href="{{route('login')}}" class="">Login</a></li>
                <li class="@if(Route::currentRouteName() == 'register') active @endif"><a class="waves-effect waves-light btn red" href="{{route('register')}}">Join-us</a></li>

              @endif


              @if(Auth::check())
                    <li><a class="dropdown-trigger" href="#!" data-target="account">{{Auth::user()->name}}<i class="material-icons right">arrow_drop_down</i></a></li>
              @endif

            </ul>
          </div>
        </div>
      </nav>
    </div>

    <ul id="side_nav" class="sidenav back-color">
        <li class="@if(Route::currentRouteName() == 'welcome') active @endif"><a href="{{route('welcome')}}" class="white-text">Accueil</a></li>
        <li class="@if(Route::currentRouteName() == 'threads.index' || Route::currentRouteName() == 'threads.show') active @endif"><a href="{{route('threads.index')}}" class="white-text">Posts</a></li>
        <li class="@if(Route::currentRouteName() == 'member.home' || Route::currentRouteName() == 'member.show') active @endif"><a href="{{route('member.home')}}" class="white-text">Members</a></li>
        <li class="@if(Route::currentRouteName() == 'login') active @endif"><a href="{{route('login')}}" class="white-text">Login</a></li>
        <li class="@if(Route::currentRouteName() == 'register') active @endif"><a href="{{route('register')}}" class="white-text">Join-us</a></li>

    </ul>

    {{-- @include('layouts.partials._modal-login') --}}

</header>
