<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>{{$title}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
        <meta name="description" content="ArchitectUI HTML Bootstrap 5 Dashboard Template">
        <!-- Disable tap highlight on IE -->
        <link href="{{asset('./imginterface/graph.ico')}}" rel="icon">
        <link href="{{asset('./imginterface/graph.ico')}}" rel="apple-touch-icon">
        <meta name="msapplication-tap-highlight" content="no">
        <link rel="stylesheet" href="{{asset('vendors/@fortawesome/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/ionicons-npm/css/ionicons.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/linearicons-master/dist/web-font/style.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/pixeden-stroke-7-icon-master/pe-icon-7-stroke/dist/pe-icon-7-stroke.css')}}">
        <link href="{{asset('styles/css/base.css')}}" rel="stylesheet">
        <link href="{{asset('Auth/css/sweetalert2.min.css')}}" rel="stylesheet">
    </head>
    <body>
        <div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100 bg-plum-plate bg-animation">
                    <div class="d-flex h-100 justify-content-center align-items-center">
                        <div class="mx-auto app-login-box col-md-8">
                            <div class="app-logo-inverse mx-auto mb-3"></div>

                            @yield('content-login')

                            <div class="text-center text-white opacity-8 mt-3">CashOne version 4.0</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <script type="text/javascript" src="{{asset('Auth/js/sweetalert2.all.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
            @if (Route::is(['Auth.forget']))
            <script type="text/javascript" src="{{asset('vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('Auth/js/forget_password.js')}}"></script>
            @endif
    </body>
    </html>

