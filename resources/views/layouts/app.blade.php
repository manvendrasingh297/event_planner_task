<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Event Planner</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('public/assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/plugins.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css') }}" />
        <script src="{{ asset('public/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
        <style>
            .mt-10{ margin-top:5% !important; }
            .s_btn1{ margin: 5px !important; min-width: 30px;height: 28px;border-radius: 8px; border: none; }
            .btn-default{ background-color: #7e7676; }
            .btn-danger{ background-color: red; }
            .head_title { margin-bottom: 40px; }
        </style>
        @yield('style')
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="200">
        <div class='preloader'>
            <div class='loaded'>&nbsp;</div>
        </div>
        <div class="culmn">
            <header id="main_menu" class="header navbar-fixed-top">            
                <div class="main_menu_bg" style="background-color: #231f1975 !important;" >
                    <div class="container">
                        <div class="row">
                            @include('layouts.navigation')  
                        </div>
                    </div>
                </div>
            </header> 
            @yield('content')   
            <section class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="main_footer">
                                <div class="row"> 
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="copyright_text">
                                            <p class=" wow fadeInRight" data-wow-duration="1s">2022. All Rights Reserved</p>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="flowus">
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
        </div> 
        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>

        <script src="{{ asset('public/assets/js/vendor/jquery-1.11.2.min.js') }}" ></script>
        <script src="{{ asset('public/assets/js/vendor/bootstrap.min.js') }}" ></script>

        <script src="{{ asset('public/assets/js/jquery.magnific-popup.js') }}" ></script>
        <script src="{{ asset('public/assets/js/jquery.mixitup.min.js') }}" ></script>
        <script src="{{ asset('public/assets/js/jquery.easing.1.3.js') }}" ></script>
        <script src="{{ asset('public/assets/js/jquery.masonry.min.js') }}" ></script>
 

        @yield('script')
        <script src="{{ asset('public/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('public/assets/js/main.js') }}"></script>
    </body>
</html>
