<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- font --}}
    <link href="{{ asset('fonts/css2.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'laravel') }}</title>

    {{-- CSS Implementing Plugins --}}
    <link rel="stylesheet" href="{{ asset('vendor/icon-set/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/chart.js/dist/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net.extensions/fixedColumns.dataTables.min.css') }}">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">
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
                    <a class="dropdown-item" href="/create/transaction">Create Document</a>
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
    <main id="content" role="main" class="main">
      @yield('content')
      {{-- footer --}}
      <br><br><br>
      <div class="footer container">
        <div class="row justify-content-between align-items-center">
          <div class="col">
            <p class="font-size-sm mb-0">© Electronic Document Tracking System. <span class="d-none d-sm-inline-block">2019 Local Government Unit.</span></p>
          </div>
          <div class="col-auto">
            <div class="d-flex justify-content-end">
              <!-- List Dot -->
              <ul class="list-inline list-separator">
                <li class="list-inline-item">
                  <a class="list-separator-link" href="#">Quezon Bukidnon</a>
                </li>
  
                <li class="list-inline-item">
                  <a class="list-separator-link" href="#">8715 Philippines</a>
                </li>
              </ul>
              <!-- End List Dot -->
            </div>
          </div>
        </div>
      </div>
    </main>
		<!-- End Footer -->
    {{-- scripts --}}
    <!-- JS Global Compulsory -->
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('vendor/hs-toggle-password/dist/js/hs-toggle-password.js') }}"></script>
    <script src="{{ asset('vendor/hs-unfold/dist/hs-unfold.min.js') }}"></script>
    <script src="{{ asset('vendor/hs-form-search/dist/hs-form-search.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js.extensions/chartjs-extensions.js') }}"></script>
    <script src="{{ asset('vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net.extensions/select/select.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net.extensions/dataTables.fixedColumns.min.js') }}"></script>
    

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
