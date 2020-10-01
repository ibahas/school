<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    @yield('header')
    @include('layouts.header')

</head>

<body dir="rtl">
    <div class="wrapper ">
        <div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('assets/img/sidebar-1.jpg')}}">
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
                  <li class="nav-item  {{ Request::is('reportStudents*') ? 'active' : '' }}  ">
                    <a class="nav-link " href="{{url('reportStudents')}}">
                      <i class="material-icons">error_outline</i>
                      <p>{{ _('بلاغات الأبناء')}}</p>
                    </a>
                  </li>
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
                @if (Route::currentRouteName() !== 'home' )
                    @if (request()->is('*/create') || request()->is('*/create/*') || request()->is('*/edit/*') || request()->is('*/edit') || request()->is('*/*'))
                    @else
                    <input type="text" id="inputSearch" onkeyup="funSearch()" style="float: right">
                    @endif
                @endif
                <br>
                <br>
                  @yield('content')
              </div>
              <footer class="footer">
              @include('layouts.footer')
            </footer>
          </div>
        </div>
      </div>
      

    @yield('footer')
    @include('layouts.footer')

</body>

</html>
