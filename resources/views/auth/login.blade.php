{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities." />
    <meta name="keywords"
        content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app" />
    <meta name="author" content="pixelstrap" />
    <link rel="icon" href="https://laravel.pixelstrap.com/viho/assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="https://laravel.pixelstrap.com/viho/assets/images/favicon.png"
        type="image/x-icon" />
    <title>Login Page
    </title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet" />
    <!-- Font Awesome-->
     <link rel="stylesheet" type="text/css" href="{{asset('build/template/assets/css/fontawesome.css')}}" />
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('build/template/assets/css/icofont.css')}}" />
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('build/template/assets/css/themify.css')}}" />
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('build/template/assets/css/flag-icon.css')}}" />
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('build/template/assets/css/feather-icon.css')}}" /> 
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('build/template/assets/css/bootstrap.css')}}" /> 
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('build/template/assets/css/style.css')}}" />


    <link id="color" rel="stylesheet" href="{{asset('build/template/assets/css/color-1.css')}}"
        media="screen" />
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('build/template/assets/css/responsive.css')}}" /> 
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- error page start //-->
    <section>
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5"><img class="bg-img-cover bg-center"
                        src="{{asset('build/template/assets/images/login/3.jpg')}}" alt="looginpage" /></div>
                <div class="col-xl-7 p-0">
                    <div class="login-card">
                        <form class="theme-form login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <h4>Login</h4>
                            <h6>Welcome back! Log in to your account.</h6>
                            <div class="form-group">
                                <label>Email / Username / Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i data-feather="user"></i></span>
                                    <input class="form-control" type="text" name="auth" required=""
                                        placeholder="Email, Username, Or Phone Number" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i data-feather="lock"></i></span>
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="*********" />
                                    <div class="show-hide"><span class="show"> </span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox" />
                                    <label class="text-muted" for="checkbox1">Remember password</label>
                                </div>
                                <a class="link" href="{{ route('password.request') }}">Forgot
                                    password?</a>
                            </div>
                            <div class="form-group"><button class="btn btn-primary btn-block"
                                    href="https://laravel.pixelstrap.com/viho/dashboard" type="submit">Sign in</button>
                            </div>
                            {{-- <div class="login-social-title">
                                <h5>Sign in with</h5>
                            </div>
                            <div class="form-group">
                                <ul class="login-social">
                                    <li>
                                        <a href="https://www.linkedin.com/login" target="_blank"><i
                                                data-feather="linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/login" target="_blank"><i
                                                data-feather="twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/login" target="_blank"><i
                                                data-feather="facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/login" target="_blank"><i
                                                data-feather="instagram"> </i></a>
                                    </li>
                                </ul>
                            </div> --}}
                            {{-- <p>Don't have account?<a class="ms-2"
                                    href={{ route('register') }}>Create Account</a></p> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- error page end //-->
    <!-- latest jquery-->
    <script src="{{asset('build/template/assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('build/template/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('build/template/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('build/template/assets/js/config.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('build/template/assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('build/template/assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('build/template/assets/js/script.js')}}"></script>
    <!-- Plugin used-->
</body>

</html>
