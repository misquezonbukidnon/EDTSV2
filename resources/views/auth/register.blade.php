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
                <form class="js-validate" method="POST" action="{{ route('register') }}" autocomplete="off">
                    @csrf
                    <div class="text-center">
                    <div class="mb-5">
                        <h1 class="display-4">Register</h1>
                    </div>
                    </div>
    
                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                    <label class="input-label" for="signinSrEmail">Select Account Type</label>
                    <select name="roles_id" id="roles_id" class="form-control">
                        <option value="1">Guest</option>
                        {{-- to remove --}}
                        <option value="2">Standard</option>
                        <option value="3">Administrator</option>
                    </select>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                        <label class="input-label" for="signinSrEmail">Select Office</label>
                        <select name="offices_id" id="offices_id" class="form-control">
                            @foreach($offices as $office)
                                <option value="{{ $office->id }}">{{ $office->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                        <label class="input-label" for="signinSrEmail">Full Name</label>
                        <input type="text" class="form-control form-control-lg" name="name" id="name" tabindex="1" placeholder="Your Name" aria-label="name" value="{{ old('name') }}" required data-msg="Please enter a name.">
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <!-- End Form Group -->
    
                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                        <label class="input-label" for="signinSrEmail">Your email</label>
                        <input type="email" class="form-control form-control-lg" name="email" id="signinSrEmail" tabindex="1" placeholder="office@lguquezon.com" aria-label="email@lguquezon.com" value="{{ old('email') }}" required data-msg="Please enter a valid email address.">
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

                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                        <label class="input-label" for="signupSrPassword" tabindex="0">
                            <span class="d-flex justify-content-between align-items-center">
                            Confirm Password
                            </span>
                        </label>
        
                        <div class="input-group input-group-merge">
                            <input type="password" class="js-toggle-password form-control form-control-lg" name="password_confirmation" id="signupSrPassword" placeholder="Please confirm your password" aria-label="8+ characters required" required
                                    data-msg="Your password is invalid. Please try again."
                                    data-hs-toggle-password-options='{
                                    "target": "#changePassTarget",
                                    "defaultClass": "tio-hidden-outlined",
                                    "showClass": "tio-visible-outlined",
                                    "classChangeTarget": "#changePassIcon"
                                    }'>
                            <div id="changePassTarget" class="input-group-append">
                            </div>
                            @error('password')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        </div>
                        <!-- End Form Group -->
    
                    <button type="submit" class="btn btn-lg btn-block btn-primary">Register</button>
                </form>
                <!-- End Form -->
                </div>
            </div>
            </div>
        </div>
    </div>
        <!-- End Content -->
@endsection
