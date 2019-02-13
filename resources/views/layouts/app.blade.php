<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/medino/assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="/medino/assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="/medino/assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="/medino/assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="/medino/assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="/medino/assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="/medino/assets/css/linearicons.css">
    <link rel="stylesheet" href="/medino/assets/css/style.css">
    
    @yield('css')
</head>
<body>

    <div class="preloader">
        <div class="spinner"></div>
    </div>

    <header class="header-area">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 d-md-flex">
                        <h6 class="mr-3"><span class="mr-2"><i class="fa fa-mobile"></i></span> call us now! +1 305 708 2563</h6>
                        <h6 class="mr-3"><span class="mr-2"><i class="fa fa-envelope-o"></i></span> medical@example.com</h6>
                        <h6><span class="mr-2"><i class="fa fa-map-marker"></i></span> Find our Location</h6>
                    </div>
                    <div class="col-lg-3">
                        <div class="social-links">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header" id="home">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.html"><img src="/medino/assets/images/logo/logo.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <?php
                            $menus = App\Menu::where('active',1)->get();
                        ?>
                        @foreach($menus->where('parent_id',0) as $topMenu)
                        <?php
                            $subMenus = $menus->where('parent_id',$topMenu->id);
                        ?>

                        @if(count($subMenus)>0)
                        <li class="menu-has-children"><a href="">{{$topMenu->title}}</a>
                            <ul>
                                @foreach($subMenus as $subMenu)
                                <li><a href="{{$subMenu->url}}">{{$subMenu->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @else
                        <li class="menu-active"><a href="{{$topMenu->url}}">{{$topMenu->title}}</a></li>
                        @endif

                        @endforeach
                         @guest
                            <li>
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">Patient Register</a>
                                </li>
                                <li>
                                    <a href="{{ route('doctor-register') }}">Doctor Register</a>
                                </li>
                            @endif
                        @else
                            <li class="menu-has-children">
                            <a href="blog-home.html">{{ Auth::user()->name }} - {{ Auth::user()->type }} <span class="caret"></span></a>
                                <ul>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </nav><!-- #nav-menu-container -->		    		
                </div>
            </div>
        </div>
    </header>
    
    @yield('content')




    
    <!-- Footer Area Starts -->
    <footer class="footer-area section-padding">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-3">
                        <div class="single-widget-home mb-5 mb-lg-0">
                            <h3 class="mb-4">top products</h3>
                            <ul>
                                <li class="mb-2"><a href="#">managed website</a></li>
                                <li class="mb-2"><a href="#">managed reputation</a></li>
                                <li class="mb-2"><a href="#">power tools</a></li>
                                <li><a href="#">marketing service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-5 offset-xl-1 col-lg-6">
                        <div class="single-widget-home mb-5 mb-lg-0">
                            <h3 class="mb-4">newsletter</h3>
                            <p class="mb-4">You can trust us. we only send promo offers, not a single.</p>  
                            <form action="#">
                                <input type="email" placeholder="Your email here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email here'" required>
                                <button type="submit" class="template-btn">subscribe now</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 offset-xl-1 col-lg-3">
                        <div class="single-widge-home">
                            <h3 class="mb-4">instagram feed</h3>
                            <div class="feed">
                                <img src="/medino/assets/images/feed1.jpg" alt="feed">
                                <img src="/medino/assets/images/feed2.jpg" alt="feed">
                                <img src="/medino/assets/images/feed3.jpg" alt="feed">
                                <img src="/medino/assets/images/feed4.jpg" alt="feed">
                                <img src="/medino/assets/images/feed5.jpg" alt="feed">
                                <img src="/medino/assets/images/feed6.jpg" alt="feed">
                                <img src="/medino/assets/images/feed7.jpg" alt="feed">
                                <img src="/medino/assets/images/feed8.jpg" alt="feed">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <span>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="social-icons">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="/medino/assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="/medino/assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="/medino/assets/js/vendor/wow.min.js"></script>
    <script src="/medino/assets/js/vendor/owl-carousel.min.js"></script>
    <script src="/medino/assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="/medino/assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="/medino/assets/js/vendor/superfish.min.js"></script>
    <script src="/medino/assets/js/main.js"></script>
    
    @yield('js')
</body>
</html>
