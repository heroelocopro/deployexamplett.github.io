
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    TravelTime>@yield('titulo')
  </title>
  <!-- Favicon -->
  <link href="{{asset('img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
  <link href="{{ asset('js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white " id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="{{ route('home') }}">
        <img src="{{ asset('img/brand/TravelTimeTexto.png') }}" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">

        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                @if (auth()->check())
                <img alt="Image placeholder" src="/storage/images/users/{{ auth()->user()->perfil }}">
                @else
                <img alt="Image placeholder" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png">
                @endif
                
">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0 text-center">¡Bienvenido!</h6>
            </div>
            
            {{-- <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a> --}}
            @if (auth()->check())
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>Mi Perfil</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
              <i class="ni ni-user-run"></i>
              <span>Cerrar Sesion</span>
            </a>
            <form action="{{ route('logout') }}" method="POST" style="display: none" id="formLogout">
              @csrf
              </form>
@else

            @endif
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse  " id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand bg-gradient-primary font-weight-800">
              <a href="./index.html">
                <img class="bg-danger" src="{{ asset('img/brand/TravelTimeTexto.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>

        <!-- Navigation -->

    @include('includes.panel.menu')
      </div>
    </div>
  </nav>
  <div class="main-content bg-dark">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">@yield('titulo')</a>
        <!-- Form -->
        {{-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form> --}}
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span  class="avatar avatar-sm rounded-circle">
                  @if (auth()->check())
                  <img class="rounded-circle" style="height: 100%;width:100%;" alt="Image placeholder" src="{{ asset('storage/images/users/'.auth()->user()->perfil) }}">
                  @else
                  <img alt="Image placeholder" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png">
                  @endif
                 
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  @if (auth()->check())
                  <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>

                  @else
                  <span class="mb-0 text-sm  font-weight-bold">Anonimo</span>

                  @endif
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow text-center m-0">Bienvenido!</h6>
              </div>
              @if (auth()->check())
              <a  href="{{ route('perfil',auth()->user()->id) }}" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Mi perfil</span>
              </a>

              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
                <i class="ni ni-user-run"></i>
                <span>Cerrar Sesion</span>
              </a>
              <form action="{{ route('logout') }}" method="POST" style="display: none" id="formLogout">
                @csrf
                </form>
@else


              @endif
 
              {{-- <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a> --}}

            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-4 pt-md-6">

    </div>
    <div class="container-fluid mt--7 ">
      <div class="container">

        @yield('content')
      </div>
      <!-- Footer -->
      <footer class="footer bg-dark ">
        <div class="row align-items-center justify-content-xl-between ">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted ">
              &copy; 2022 <a href="{{ route('home') }}" class="font-weight-bold ml-1 " target="_blank">{{ env('APP_TITLE') }}</a>
            </div>
          </div>
          <div class="col-xl-6">
            {{-- <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul> --}}
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core   -->
  <script src="{{ asset('js/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!--   Optional JS   -->
  <script src="{{ asset('js/plugins/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
  <!--   Argon JS   -->
  <script src="{{ asset('js/argon-dashboard.min.js?v=1.1.2') }}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script src="{{ asset('js/eventos-create.js') }}"></script>
  <script src="{{ asset('js/lugares-update.js') }}"></script>
  <script src="{{ asset('js/eventos-update.js') }}"></script>
  <script src="{{ asset('js/usuarios-update.js') }}"></script>
  <script src="{{ asset('js/eventos-delete.js') }}"></script>
  <script src="{{ asset('js/lugares-delete.js') }}"></script>

  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>
@include('sweetalert::alert')