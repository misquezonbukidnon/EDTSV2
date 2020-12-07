<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('fonts/css2.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'laravel') }}</title>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/icon-set/style.css') }}">
    {{-- end css --}}

</head>
<body>
    {{-- nav start --}}
    <!-- Header -->

    <!-- Header -->
    <header class="navbar navbar-expand-lg navbar-spacer-y navbar-dark">
      <div class="container">
        <div class="navbar-nav-wrap">
          <div class="navbar-brand-wrapper">
            <!-- Logo -->
            <a class="navbar-brand" href="/home" aria-label="Front">
              {{-- <img class="navbar-brand-logo" src="{{ asset('svg/logos/logo.svg') }}" alt="Logo"> --}}
              <h3 style="color: white;">Electronic Document Tracking System</h3>
            </a>
            <!-- End Logo -->
          </div>

          <!-- Toggle -->
          <button type="button" class="navbar-toggler btn btn-ghost-secondary rounded-circle ml-auto" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarNavMenuDarkEg" data-toggle="collapse" data-target="#navbarNavMenuDarkEg">
            <i class="tio-menu-hamburger"></i>
          </button>
          <!-- End Toggle -->

          <nav class="collapse navbar-collapse" id="navbarNavMenuDarkEg">
          
            {{-- <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
              </li>

             
              <li class="dropdown">
                <a class="nav-link nav-link-toggle" href="javascript:;" id="dropdownSubMenuDarkEg" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>

                <div class="dropdown-menu" aria-labelledby="dropdownSubMenuDarkEg" style="min-width: 230px;">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              

              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
            </ul> --}}
           <ul class="navbar-nav ml-auto">
              @guest
                <li class="nav-item">
                  <a class="nav-link active" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
              @elseif(auth()->user()->roles_id == 3)

                {{-- New Document --}}
                <li class="dropdown">
                  <a class="nav-link nav-link-toggle" href="javascript:;" id="dropdownSubMenuDarkEg" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Document</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownSubMenuDarkEg" style="min-width: 230px;">
                    <a class="dropdown-item" href="#">Create Document</a>
                  </div>
                </li>

                {{-- Endorsement --}}
                <li class="dropdown">
                  <a class="nav-link nav-link-toggle" href="javascript:;" id="dropdownSubMenuDarkEg" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Endorsement</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownSubMenuDarkEg" style="min-width: 230px;">
                    <a class="dropdown-item" href="#">Endorse Document</a>
                    <a class="dropdown-item" href="#">History</a>
                  </div>
                </li>

                {{-- Track Document --}}
                <li class="dropdown">
                  <a class="nav-link nav-link-toggle" href="javascript:;" id="dropdownSubMenuDarkEg" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Track Document</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownSubMenuDarkEg" style="min-width: 230px;">
                    <a class="dropdown-item" href="#">Find Records</a>
                  </div>
                </li>

                {{-- Reports --}}
                <li class="dropdown">
                  <a class="nav-link nav-link-toggle" href="javascript:;" id="dropdownSubMenuDarkEg" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownSubMenuDarkEg" style="min-width: 230px;">
                    <a class="dropdown-item" href="#">Summary</a>
                  </div>
                </li>

                {{-- Account --}}
                <li class="dropdown">
                  <a class="nav-link nav-link-toggle" href="javascript:;" id="dropdownSubMenuDarkEg" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
  
                  <div class="dropdown-menu" aria-labelledby="dropdownSubMenuDarkEg" style="min-width: 230px;">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Account Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  </div>
                </li>
              @else
                standard user
              @endguest
           </ul>
          </nav>
        </div>
      </div>
    </header>
<!-- End Header -->
    {{-- nav end --}}
    @yield('content')
    {{-- scripts --}}
    <!-- JS Global Compulsory -->
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('vendor/hs-toggle-password/dist/js/hs-toggle-password.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>

    <!-- JS Front -->
    <script src="{{ asset('js/theme.min.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
      $(document).on('ready', function () {
        // initialization of Show Password
        $('.js-toggle-password').each(function () {
          new HSTogglePassword(this).init()
        });

        // initialization of form validation
        $('.js-validate').each(function() {
          $.HSCore.components.HSValidation.init($(this));
        });
      });
    </script>


    <!-- JS Front -->
    {{-- end scripts --}}
    @yield('script')

    <script>
      $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
    <!-- endbuild -->
</body>
</html>
