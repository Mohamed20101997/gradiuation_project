<!DOCTYPE html>
<html lang="en">
<head>
    <!-- all meta -->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Page Title -->
    <title>Domar - Education HTML Template</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{asset('front')}}/assets/images/favicon.ico" type="image/png">
    <!-- All css here -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('front')}}/assets/plugin/bootstrap/css/bootstrap.min.css">
    <!-- fontaweosme css -->
    <link rel="stylesheet" href="{{asset('front')}}/assets/fonts/fontawesome/css/all.css">
    <!-- Flaticon css -->
    <link rel="stylesheet" href="{{asset('front')}}/assets/fonts/flaticon/flaticon.css">
    <!-- slick slider css -->
    <link rel="stylesheet" href="{{asset('front')}}/assets/plugin/slick/slick.css">
    <link rel="stylesheet" href="{{asset('front')}}/assets/plugin/slick/slick-theme.css">
    <!-- magnific css -->
    <link rel="stylesheet" href="{{asset('front')}}/assets/plugin/magnific/magnific-popup.css">
    <!-- jquery-ui css -->
    <link rel="stylesheet" href="{{asset('front')}}/assets/plugin/jquery_ui/jquery-ui.css">
    <!-- nice_select css -->
    <link rel="stylesheet" href="{{asset('front')}}/assets/plugin/nice_select/nice-select.css">
    <!-- nice_select css -->
    <link rel="stylesheet" href="{{asset('front')}}/assets/plugin/sidebar_menu/sidebar-menu.css">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/animate.css">
    <!-- Style css -->
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/responsive.css">
</head>
<body>
<!-- Start search wrapper -->
<div class="search_wrapper">
    <a href="#" class="close_link"><i class="fas fa-times"></i></a>
    <form>
        <input type="text" class="form_control" placeholder="search here">
    </form>
</div>
<!-- End search wrapper -->
<!-- Start preloader area -->
<div class="preloader_area">
    <div class="spinner">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
        <div class="line4"></div>
        <div class="line5"></div>
        <div class="line6"></div>
        <div class="line7"></div>
    </div>
</div>
<!-- End preloader area -->
<div class="header_top_bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="top_left">
                    <a><i class="fas fa-user"></i> {{ auth()->guard('student')->user()->name}} </a>
                    <a><i class="fas fa-envelope"></i>{{ auth()->guard('student')->user()->email}} </a>
                    <a><i class="fas fa-building"></i>{{ auth()->guard('student')->user()->college->name}} </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="top_right">
                    <p><a href="{{route('front.logout')}}">logout</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Header area -->
<header class="header_area header_v1">
    <div class="container">
        <div class="site_menu">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="site_logo">
                        <a href="{{route('front.home')}}"><img src="{{asset('front')}}/img/download-removebg-preview.png" alt="" height="100px"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="primary_menu">
                        <nav class="main_menu">
                            <ul>
                                <li><a href="{{route('front.home')}}">Home</a></li>

                                <li><a href="{{route('front.home')}}">Semester</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Home v1</a></li>
                                        <li><a href="home_v2.html">Home v2</a></li>
                                        <li><a href="home_v3.html">Home v3</a></li>
                                    </ul>
                                </li>

                                <li><a href="{{route('front.home')}}">Subject</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Home v1</a></li>
                                        <li><a href="home_v2.html">Home v2</a></li>
                                        <li><a href="home_v3.html">Home v3</a></li>
                                    </ul>
                                </li>

                                <li><a href="{{route('front.home')}}">Doctors</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Home v1</a></li>
                                        <li><a href="home_v2.html">Home v2</a></li>
                                        <li><a href="home_v3.html">Home v3</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile_wrapper -->
        <div class="mobile_wrapper" >
            <div class="row align-items-center">
                <div class="col-lg-6 col-6">
                    <div class="brand_logo">
                        <a href="{{route('front.home')}}"><img src="{{asset('front')}}/img/download-removebg-preview.png" alt="" class="img-fluid" width="50px"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <div class="mobile_menu">
                        <ul>
                            <li><a href="#" class="menu_icon"><i class="fas fa-bars"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="sidenav_menu">
                <div class="close_icon">
                    <a href="#" class="close_btn"><i class="fas fa-times"></i></a>
                </div>
                 <ul class="sidebar-menu">
                            <li><a href="{{route('front.home')}}">Home</a></li>

                            <li><a href="{{route('front.home')}}">Semester</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home v1</a></li>
                                    <li><a href="home_v2.html">Home v2</a></li>
                                    <li><a href="home_v3.html">Home v3</a></li>
                                </ul>
                            </li>

                            <li><a href="{{route('front.home')}}">Subject</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home v1</a></li>
                                    <li><a href="home_v2.html">Home v2</a></li>
                                    <li><a href="home_v3.html">Home v3</a></li>
                                </ul>
                            </li>

                            <li><a href="{{route('front.home')}}">Doctors</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home v1</a></li>
                                    <li><a href="home_v2.html">Home v2</a></li>
                                    <li><a href="home_v3.html">Home v3</a></li>
                                </ul>
                            </li>

                        </ul>
            </div>
        </div><!-- mobile_wrapper -->
    </div>
</header><!-- End Header area -->



<section class="categories_style_v1 section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section_title text-center">
                    <h2>choose the Semester</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="#" class="categorie_box bg_image wow slideInUp" style="background-image: url(assets/images/cat_1.jpg);">
                    <span class="bg_overlay"></span>
                    <div class="domar_content">
                        <h4>IT & Software</h4>
                        <h6>Over 752 Courses</h6>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>


<footer class="domar_footer footer_v1 bg_image">
    <div class="bg_overlay"></div>
    <div class="container">
        <div class="footer_copyright">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright_text">
                        <p>Copyright 2022, Information Technology  All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End domar_footer section -->
<!-- scroll_top -->
<a id="scroll_top"><i class="fas fa-angle-up"></i></a>
<!-- jquery  -->
<script src="{{asset('front')}}/assets/js/vendor/jquery-1.12.4.min.js"></script>
<!--modernizr js-->
<script src="{{asset('front')}}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<!-- bootstrap js -->
<script src="{{asset('front')}}/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
<!-- Popper js -->
<script src="{{asset('front')}}/assets/plugin/bootstrap/js/popper.min.js"></script>
<!-- slick slider js -->
<script src="{{asset('front')}}/assets/plugin/slick/slick.min.js"></script>
<!-- magnific popup js -->
<script src="{{asset('front')}}/assets/plugin/magnific/jquery.magnific-popup.min.js"></script>
<!-- countdown js -->
<script src="{{asset('front')}}/assets/plugin/countdown/jquery.countdown.min.js"></script>
<!-- jquery ui js -->
<script src="{{asset('front')}}/assets/plugin/jquery_ui/jquery-ui.min.js"></script>
<!-- nice_select js -->
<script src="{{asset('front')}}/assets/plugin/nice_select/jquery.nice-select.min.js"></script>
<!-- sidebar_menu js -->
<script src="{{asset('front')}}/assets/plugin/sidebar_menu/sidebar-menu.js"></script>
<!-- wow js -->
<script src="{{asset('front')}}/assets/js/wow.min.js"></script>
<!-- main js -->
<script src="{{asset('front')}}/assets/js/main.js"></script>
</body>
</html>
