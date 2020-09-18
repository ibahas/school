

<html dir="rtl">

<head>
    @include('layouts.header')

    <script>
        $(document).ready(function () {
      $(".sweet-overlay").fadeTo(2000, 500).slideUp(500, function () {
          $(".sweet-overlay").slideUp(500);
      });
      $(".sweet-alert").fadeTo(2000, 500).slideUp(500, function () {
          $(".sweet-alert").slideUp(500);
      });
     
  });

    </script>

<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>


</head>


    <body dir="rtl">
     
        <div class="wrapper ">
          <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('assets/img/sidebar-1.jpg')}}">
            <!--
              Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
      
              Tip 2: you can also add an image using data-image tag
          -->
            <div class="logo">
              <a href="{{Route('home')}}" class="simple-text logo-normal">مدرسة الإتقان </a>
            </div>
            <div class="sidebar-wrapper">
              <ul class="nav">
                @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                <li class="nav-item  {{ Request::is('students*') ? 'active' : '' }}  ">
                  <a class="nav-link " href="{{url('students')}}">
                    <i class="material-icons">people</i>
                    <p>{{ _('الطلاب')}}</p>
                  </a>
                </li> 
                <li class="nav-item  {{ Request::is('programs*') ? 'active' : '' }}  ">
                  <a class="nav-link " href="{{url('programs')}}">
                    <i class="material-icons">perm_data_setting</i>
                    <p>{{ _('البرامج')}}</p>
                  </a>
                </li>
                <li class="nav-item  {{ Request::is('stafftime*') ? 'active' : '' }}  ">
                  <a class="nav-link " href="{{url('stafftime')}}">
                    <i class="material-icons">perm_data_setting</i>
                    <p>{{ _('حضور المحفظين')}}</p>
                  </a>
                </li>
                
                    @endif
                    @if(Auth::user()->role == 3)
                    <li class="nav-item  {{ Request::is('teacherstudents*') ? 'active' : '' }}  ">
                      <a class="nav-link " href="{{url('teacherstudents')}}">
                        <i class="material-icons">people</i>
                        <p>{{ _('طلابي')}}</p>
                      </a>
                    </li>
                    @endif

                    @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3 )
                    <li class="nav-item  {{ Request::is('presencestudents*') ? 'active' : '' }}  ">
                      <a class="nav-link " href="{{url('presencestudents')}}">
                        <i class="material-icons">perm_data_setting</i>
                        <p>{{ _('حضور الطلاب')}}</p>
                      </a>
                    </li>
                    @endif
                    
                </ul>
           
              </ul>
            </div>
          </div>
          <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
              <div class="container-fluid">
                <div class="navbar-wrapper">
                  <a class="navbar-brand">لوحة التحكم</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collae" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                  <ul class="navbar-nav">
                    <li class="nav-item" title="لوحة التحكم">
                    <a class="nav-link" href="{{url('/')}}">
                        <i class="material-icons">dashboard</i>
                        <p class="d-lg-none d-md-block">
                          لوحة التحكم
                        </p>
                      </a>
                    </li>
                    <li class="nav-link  dropdown">
                        <a class="nav-link"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                          <i class="material-icons">person</i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" style=" position: absolute; right: -172%; ">
                         
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="material-icons">logout</i>{{ __('تسجيل الخروج') }}</a>
                          <div class="dropdown-menu">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>

                        </div>
                        <a class="dropdown-item" href="{{action('user\UsersController@show')}}">
                            <i class="material-icons">settings</i>{{ __('الإعدادات')}}</a>
                        </div>
                      </li>
                  </ul>
                </div>
              </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')

                </div>

                <footer class="footer">
                @yield('footer')
                @include('layouts.footer')
              </footer>
            </div>
          </div>
       
          <!--   Core JS Files   -->
          <script src="{{ asset('assets/js/core/jquery.min.js')}}" type="text/javascript')}}"></script>
          <script src="{{ asset('assets/js/core/popper.min.js')}}" type="text/javascript')}}"></script>
          <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
          <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
          <!--  Google Maps Plugin    -->
          <!-- Place this tag in your head or just before your close body tag. -->
          <script async defer src="https://buttons.github.io/buttons.js"></script>
          <!-- Chartist JS -->
          <script src="{{ asset('assets/js/plugins/chartist.min.js')}}"></script>
          <!--  Notifications Plugin    -->
          <script src="{{ asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
          <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
          <script src="{{ asset('assets/js/material-dashboard.min.js?v=2.1.2')}}" type="text/javascript"></script>
          <!-- Material Dashboard DEMO methods, don't include it in your project! -->
          <script src="{{ asset('assets/demo/demo.js')}}"></script>




  <!-- Plugin for the momentJs  -->
  <script src="{{ asset('assets/js/plugins/moment.min.js')}}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{ asset('assets/js/plugins/sweetalert2.js')}}"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{ asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ asset('assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js')}}"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.js')}}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ asset('assets/js/plugins/jasny-bootstrap.min.js')}}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{ asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{ asset('assets/js/plugins/jquery-jvectormap.js')}}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('assets/js/plugins/nouislider.min.js')}}"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{ asset('assets/js/plugins/arrive.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/chartist.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/material-dashboard.js?v=2.1.2')}}" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        
          <!-- Sharrre libray -->
        <script>
            $(document).ready(function () {
              //
              $( window ).scroll(function() {
              $('.ps-scrollbar-x-rail').remove('.ps-scrollbar-x-rail');
                
              });
            });
        </script>
      </body>
    

</body>

</html>
