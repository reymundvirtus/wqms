@extends('layouts.authLayout')

@section('title')
    WQMS - Signup
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

        <div class="card card-authentication1 mx-auto my-4">
            <div class="card-body">
                <div class="card-content p-2">
                    <div class="text-center">
                        <img class="mx-auto h-12 w-auto" src="images/logo-icon.png" alt="logo icon">
                    </div>
                    <div class="card-title text-uppercase text-center py-3">Sign Up</div>

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" id="name" name="name"
                                    class="form-control input-shadow @error('name') border-red-500 @enderror"
                                    value="{{ old('name') }}" placeholder="Enter Your Name" required>
                                @error('name')
                                    <div class="text-red-500 mt-2 ml-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" id="email" name="email"
                                    class="form-control input-shadow @error('email') border-red-500 @enderror"
                                    value="{{ old('email') }}" placeholder="Enter Your Email" required>
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
                                    class="form-control input-shadow @error('password') border-red-500 @enderror"
                                    value="{{ old('password') }}" placeholder="Password" required>
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
                        <div class="form-group">
                            <label for="password_confirmation" class="sr-only">Confirm Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control input-shadow @error('password_confirmation') border-red-500 @enderror"
                                    value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required>
                                @error('password_confirmation')
                                    <div class="text-red-500 mt-2 ml-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <div class="icheck-material-white">
                                <input type="checkbox" id="user-checkbox" checked="" />
                                <label for="user-checkbox">I Agree With Terms & Conditions</label>
                            </div>
                        </div> --}}

                        <button type="submit" class="btn btn-light btn-block waves-effect waves-light">Sign Up</button>
                        {{-- <div class="text-center mt-3">Sign Up With</div> --}}

                        {{-- <div class="form-row mt-4">
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
                <p class="text-warning mb-0">Already have an account? <a href="{{ route('login') }}" class="text-white"> Sign In here</a>
                </p>
            </div>
        </div>
    @endsection
