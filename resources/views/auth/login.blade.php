@extends('layouts.app')

@section('content')
<!-- ========== MAIN CONTENT ========== -->


    <!-- Content -->
    <div class="container py-5 py-sm-7">
    <a class="d-flex justify-content-center mb-5" href="index.html">
        <img class="z-index-2" src="{{ asset('/images/logo.png') }}" alt="Image Description" style="width: 8rem;">
    </a>

    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
        <!-- Card -->
        <div class="card card-lg mb-5">
            <div class="card-body">
            <!-- Form -->
            <form class="js-validate" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="text-center">
                <div class="mb-5">
                    <h1 class="display-4">Sign in</h1>
                </div>
                </div>

                <!-- Form Group -->
                <div class="js-form-message form-group">
                <label class="input-label" for="signinSrEmail">Your email</label>
                <input type="email" class="form-control form-control-lg" name="email" id="signinSrEmail" tabindex="1" placeholder="email@lguquezon.com" aria-label="email@lguquezon.com" value="{{ old('email') }}" required data-msg="Please enter a valid email address.">
                @error('email')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div class="js-form-message form-group">
                <label class="input-label" for="signupSrPassword" tabindex="0">
                    <span class="d-flex justify-content-between align-items-center">
                    Password
                    {{-- <a class="input-label-secondary" href="authentication-reset-password-basic.html">Forgot Password?</a> --}}
                    </span>
                </label>

                <div class="input-group input-group-merge">
                    <input type="password" class="js-toggle-password form-control form-control-lg" name="password" id="signupSrPassword" placeholder="8+ characters required" aria-label="8+ characters required" required
                            data-msg="Your password is invalid. Please try again."
                            data-hs-toggle-password-options='{
                            "target": "#changePassTarget",
                            "defaultClass": "tio-hidden-outlined",
                            "showClass": "tio-visible-outlined",
                            "classChangeTarget": "#changePassIcon"
                            }'>
                    <div id="changePassTarget" class="input-group-append">
                    <a class="input-group-text" href="javascript:;">
                        <i id="changePassIcon" class="tio-visible-outlined"></i>
                    </a>
                    </div>
                    @error('password')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                </div>
                <!-- End Form Group -->

                <!-- Checkbox -->
                <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="remember">
                    <label class="custom-control-label font-size-sm text-muted" for="termsCheckbox"> Remember me</label>
                </div>
                </div>
                <!-- End Checkbox -->

                <button type="submit" class="btn btn-lg btn-block btn-primary">Sign in</button>
            </form>
            <!-- End Form -->
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- End Content -->
@endsection
