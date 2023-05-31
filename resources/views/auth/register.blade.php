{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
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
    <link rel="icon" href="{{asset('build/template/assets/images/favicon.png')}}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{asset('build/template/assets/images/favicon.png')}}"
        type="image/x-icon" />
    <title>Sign Up
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
    <link rel="stylesheet" type="text/css" href="{{asset('build/template/assets/css/sweetalert2.css')}}">
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
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-xl-7 p-0"><img class="bg-img-cover bg-center"
                        src="{{asset('build/template/assets/images/login/1.jpg')}}" alt="looginpage" /></div>
                <div class="col-xl-5 p-0">
                    <div class="login-card">
                        <form class="theme-form login-form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <h4>Create your account</h4>
                            <h6>Enter your personal details to create account</h6>
                            <div class="form-group">
                                <label>Your Name</label>
                                <div class="small-group">
                                    <div class="input-group">
                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                        <input class="form-control" name="name" type="text" required=""
                                            placeholder="Username" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i data-feather="at-sign"></i></span>
                                    <input class="form-control" name="email" type="email" required=""
                                        placeholder="Test@gmail.com" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i data-feather="phone"></i></span>
                                    <input class="form-control" name="phone_number" type="text" required=""
                                        placeholder="08XXXXXXXXX" />
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
                                <label>Password Confirmation</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i data-feather="lock"></i></span>
                                    <input class="form-control" type="password" name="password_confirmation" required=""
                                        placeholder="*********" />
                                    <div class="show-hide"><span class="show"> </span></div>
                                </div>
                            </div>
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox" name="term" id="term" />
                                    <label class="text-muted" for="checkbox1">Agree with <span>Privacy Policy
                                        </span></label>
                                </div>
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                            @endif
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Create Account</button>
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
                            <p>Already have an account?<a class="ms-2"
                                    href="{{ route('login') }}">Sign in</a></p>
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
    <script src="{{asset('build/template/assets/js/sweet-alert/sweetalert.min.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('build/template/assets/js/script.js')}}"></script>
    <!-- Plugin used-->
</body>

</html>
