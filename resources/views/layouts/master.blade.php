<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo-01.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title> @yield('title') </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/now-ui-dashboard.css?v=1.5.0')}}" rel="stylesheet" />
  <link href="{{asset('assets/demo.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('assets/css/dataTables.min.css')}}">
    {{-- <style>
    .img-responsive {
                        height: auto;
                        width: auto;
                        max-height: 150px;
                        max-width: 100px;
                        margin-inline-start: 60px;
                        
                    }
    </style> --}}
</head>

<body class="">

  <div class="wrapper">
    <div class="sidebar" data-color="yrp"> <!-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"  -->
      <div class="logo">
        <a href="./dashboard">
        <img src="assets/img/immune.png" >
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li  class="{{'dashboard'== request()->path() ? 'active' : ''}}">
            <a href="./dashboard">
              <i class="now-ui-icons design_app"></i>
              <p><b>Dashboard</b></p>
            </a>
          </li>
          <li class="{{'registerHP'== request()->path() ? 'active' : ''}}">
            <a href="/registerHP">
              <i class="now-ui-icons users_single-02"></i>
              <p><b> Health Personnel</b></p>
            </a>
          </li>
          <li class="{{'child'== request()->path() ? 'active' : ''}}">
            <a href="/child">
              <i class="now-ui-icons emoticons_satisfied"></i>
              <p><b>Child Profile</b></p>
            </a>
          </li>
          <li class="{{'vaccine'== request()->path() ? 'active' : ''}}">
            <a href="/vaccine">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p><b>Vaccine Details</b></p>
            </a>
          </li>
          <li class="{{'admin'== request()->path() ? 'active' : ''}}">
            <a href="/admin">
              <i class="now-ui-icons tech_mobile"></i>
              <p><b>ADMIN</b></p>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-panel" id="main-panel">

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
           <h3> <a class="navbar-brand"style="margin-block-start:25px" href="#pablo">Digital Immunization System</a></h3>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              {{-- <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li> --}}

              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
              {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Logout</a>
                </div>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->


      

      <div class="panel-header panel-header-sm"> </div>

      <div class="content">

        @yield('content')

        </div>


      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="">
                  Immune
                </a>
              </li>
              <li>
                <a href="">
                  About Us
                </a>
              </li>
              <li>
                <a href="">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="" target="_blank">Team</a>. Coded by <a href="" target="_blank">Immune</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/dataTables.min.js')}}"></script>
  
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/js/now-ui-dashboard.min.js?v=1.5.0')}}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('assets/demo/demo.js')}}"></script>
@yield('scripts')
</body>

</html>