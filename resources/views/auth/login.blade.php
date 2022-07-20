@extends('layouts.authLayout')

@section('title')
    WQMS - Login
@endsection

@section('content')
    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="loader-wrapper">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="card card-authentication1 mx-auto my-5">
            <div class="card-body">
                <div class="card-content p-2">
                    <div class="text-center">
                        <img class="mx-auto h-12 w-auto" src="images/logo-icon.png" alt="logo icon">
                    </div>
                    <div class="card-title text-uppercase text-center py-3">Sign In</div>

                    <form action="/login" method="POST">
                        @if (session('status'))
                            <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                                {{ session('status') }}
                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <div class="position-relative has-icon-right">
                                <input type="email" id="email" name="email"
                                    class="form-control input-shadow @error('name') border-red-500 @enderror"
                                    value="{{ old('email') }}" placeholder="Enter Email" required>
                                @error('email')
                                    <div class="text-red-500 mt-2 ml-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-control-position">
                                    <i class="icon-envelope-open"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" id="password" name="password"
                                    class="form-control input-shadow @error('name') border-red-500 @enderror"
                                    value="{{ old('password') }}" placeholder="Enter Password" required>
                                @error('password')
                                    <div class="text-red-500 mt-2 ml-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <div class="icheck-material-white">
                                    <input type="checkbox" id="remember" name="remember" />
                                    <label for="remember">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group col-6 text-right">
                                <a href="{{ route('reset-password') }}">Reset Password</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-light btn-block">Sign In</button>
                        {{-- <div class="text-center mt-3">Sign In With</div>

                        <div class="form-row mt-4">
                            <div class="form-group mb-0 col-6">
                                <button type="button" class="btn btn-light btn-block"><i class="fa fa-facebook-square"></i>
                                    Facebook</button>
                            </div>
                            <div class="form-group mb-0 col-6 text-right">
                                <button type="button" class="btn btn-light btn-block"><i class="fa fa-twitter-square"></i>
                                    Twitter</button>
                            </div>
                        </div> --}}

                    </form>
                </div>
            </div>
            <div class="card-footer text-center py-3">
                <p class="text-warning mb-0">Do not have an account? <a href="{{ route('register') }}" class="text-white"> Sign Up
                        here</a></p>
            </div>
        </div>

    </div>
    <!--wrapper-->
@endsection
