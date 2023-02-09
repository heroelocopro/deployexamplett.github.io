<h6 class="navbar-heading text-muted text-center">Navegacion</h6>
<ul class="navbar-nav text-white">
    <li class="nav-item  @if (Route::currentRouteName() == "home")
    active
    @endif ">
      <a class="nav-link  @if (Route::currentRouteName() == "home")
      active
      @endif " href="{{ route('home') }}">
        <i class="fas fa-home text-success"></i> Inicio
      </a>
    </li>
    <li class="nav-item @if (Route::currentRouteName() == "eventos-index")
    active
    @endif">
      <a class="nav-link @if (Route::currentRouteName() == "eventos-index")
      active
      @endif " href="{{ route('eventos-index') }}">
        <i class="	far fa-calendar-alt text-blue"></i> Eventos
      </a>
    </li>
    <li class="nav-item @if (Route::currentRouteName() == "lugares-index")
    active
    @endif">
      <a class="nav-link @if (Route::currentRouteName() == "lugares-index")
      active
      @endif " href="{{ route('lugares-index') }}">
        <i class="ni ni-pin-3 text-orange"></i> Lugares
      </a>
    </li>
</ul>
      <!-- Divider -->
      @if (auth()->check())

      @if (auth()->user()->rol_id == 2)
      <hr class="my-3">
      <ul class="navbar-nav">
  
          <li class="nav-item @if (Route::currentRouteName() == "eventos-gestion")
          active
          @endif">
              <a class="nav-link @if (Route::currentRouteName() == "eventos-gestion")
              active
              @endif " href="{{ route('eventos-gestion') }}">
                  <i class="	fas fa-cogs text-dark"></i> <i class="far fa-calendar-alt text-blue"></i> Gestionar Eventos
              </a>
          </li>
          
          <li class="nav-item @if (Route::currentRouteName() == "lugares-gestion")
          active
          @endif">
              <a class="nav-link @if (Route::currentRouteName() == "lugares-gestion")
              active
              @endif " href="{{ route('lugares-gestion') }}">
                  <i class="	fas fa-cogs text-dark"></i> <i class="ni ni-pin-3 text-orange"></i> Gestionar Lugares
              </a>
          </li>
      </ul>
      @else


      @endif

      @else
        
      @endif
  

  <!-- Divider -->
  @if (auth()->check())
  <hr class="my-3">
  <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
          <i class="fas fa-sign-in-alt"></i> Cerrar sesion
        </a >
        <form action="{{ route('logout') }}" method="POST" style="display: none" id="formLogout">
      @csrf
      </form>
      </li>
  </ul>
@else
<hr class="my-3">
<ul class="navbar-nav">
  <li class="nav-item">
    <a  href="{{ route('login') }}" class="nav-link"> <i class="	fas fa-user-shield"></i> Iniciar Sesion</a>
  </li>
</ul>
  @endif
  