<!DOCTYPE html>
<html lang="zxx">


<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="HTML5 Template Markup Multi-Purpose themeforest">
    <meta name="description" content="Markup - Multi-Purpose HTML5 Template">
    <meta name="author" content="">

    <!-- Title  -->
    <title>Markup</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/front/assets/imgs/favicon.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&amp;display=swap" rel="stylesheet">

    <!-- Font -->
    <link rel="stylesheet" href="{{ asset('/front/assets/css/satoshi.css') }}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('/front/assets/css/plugins.css') }}">

    <!-- Core Style Css -->
    <link rel="stylesheet" href="{{ asset('/front/assets/css/style.css') }}">

</head>

<body>



    <!-- ==================== Start Loading ==================== -->

    <div class="loader-wrap">
        <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
            <path id="svg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
        </svg>

        <div class="loader-wrap-heading">
            <div class="load-text">
                <span>L</span>
                <span>o</span>
                <span>a</span>
                <span>d</span>
                <span>i</span>
                <span>n</span>
                <span>g</span>
            </div>
        </div>
    </div>

    <!-- ==================== End Loading ==================== -->


    <div class="cursor"></div>


    <!-- ==================== Start progress-scroll-button ==================== -->

    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- ==================== End progress-scroll-button ==================== -->



    <div id="smooth-wrapper">



        <!-- ==================== Start Navbar ==================== -->

    <nav class="navbar navbar-expand-lg change blur">
            <div class="container">
    
                <!-- Logo -->
               <a class="logo icon-img-100" href="index.html">
                    <img src="/public/{{  $main->header_logo }}" alt="logo222">
                </a>
    
                <!-- navbar links -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="index.html" role="button"
                                aria-haspopup="true" aria-expanded="false"><span class="rolling-text">Ana Səhifə</span></a>
                        </li>




                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false"><span class="rolling-text">Haqqımızda</span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a href="page-about2.html">Biz Kimik ?</a></li>
                                <li class="dropdown-item"><a href="">Referanslar</a></li>
                                <li class="dropdown-item"><a href="references.html">Müştərilər</a></li>
                                <li><a class="dropdown-item" href="page-team.html">Our Team</a></li>
                                <li><a class="dropdown-item" href="page-FAQS.html">FAQS</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="portfolio.html" role="button"
                                aria-haspopup="true" aria-expanded="false"><span class="rolling-text">Portfolio</span></a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="page-services.html" role="button"
                                aria-haspopup="true" aria-expanded="false"><span class="rolling-text">Xidmətlər</span></a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="blog-classic.html" role="button"
                                aria-haspopup="true" aria-expanded="false"><span class="rolling-text">Bloglar</span></a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="page-contact3.html"><span class="rolling-text">Əlaqə</span></a>
                        </li>
                    </ul>
                </div>
    
                <div class="topnav">
                    <div class="menu-icon cursor-pointer">
                        <span class="icon ti-align-right"></span>
                    </div>
                </div>
            </div>
        </nav>
    
        <div class="hamenu">

            <a class="logo icon-img-100" href="index.html">
                <img src="assets/imgs/logo-light.png" alt="logo">
            </a>


            <div class="close-menu cursor-pointer ti-close"></div>


            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="menu-text">
                            <div class="text">
                                <h2>Menu</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="menu-links">
                            <ul class="main-menu rest">
                                
                                <li>
                                    <div class="o-hidden">
                                        <a href="index.html" class="link"><span class="fill-text"
                                                data-text="Ana Səhifə">Ana Səhifə</span></a>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="o-hidden">
                                        <div class="link cursor-pointer dmenu"><span class="fill-text"
                                                data-text="Haqqımızda">Haqqımızda</span> <i></i>
                                        </div>
                                    </div>
                                    <div class="sub-menu no-bord">
                                        <ul>
                                            <li>
                                                <div class="o-hidden">
                                                    <a href="index.html" class="link"><span class="fill-text"
                                                            data-text="Biz Kimik?">Biz Kimik?</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="o-hidden">
                                                    <a href="index.html" class="link"><span class="fill-text"
                                                            data-text="Referanslar">Referanslar</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="o-hidden">
                                                    <a href="index.html" class="link"><span class="fill-text"
                                                            data-text="Müştərilər">Müştərilər</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="o-hidden">
                                                    <a href="index.html" class="link"><span class="fill-text"
                                                            data-text="Our Team">Our Team</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="o-hidden">
                                                    <a href="index.html" class="link"><span class="fill-text"
                                                            data-text="FAQ">FAQ</span></a>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                </li>

                                <li>
                                    <div class="o-hidden">
                                        <a href="portfolio.html" class="link"><span class="fill-text"
                                                data-text="Portfolio">Portfolio</span></a>
                                    </div>
                                </li>

                                <li>
                                    <div class="o-hidden">
                                        <a href="page-services.html" class="link"><span class="fill-text"
                                                data-text="Xidmətlər">Xidmətlər</span></a>
                                    </div>
                                </li>

                                <li>
                                    <div class="o-hidden">
                                        <a href="blog-classic.html" class="link"><span class="fill-text"
                                                data-text="Bloglar">Bloglar</span></a>
                                    </div>
                                </li>
                                
                                

                                <li>
                                    <div class="o-hidden">
                                        <a href="page-contact3.html" class="link"><span class="fill-text"
                                                data-text="Contact Us">Contact Us</span></a>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="cont-info">
                            <div class="item mb-50">
                                <h6 class="sub-title mb-15 opacity-7">Address</h6>
                                <h5>541 Melville Geek, <br> Palo Alto, CA 94301</h5>
                            </div>
                            <div class="item mb-50">
                                <h6 class="sub-title mb-15 opacity-7">Social Media</h6>
                                <ul class="rest social-text">
                                    <li class="mb-10">
                                        <a href="#0" class="hover-this"><span class="hover-anim">Facebook</span></a>
                                    </li>
                                    <li class="mb-10">
                                        <a href="#0" class="hover-this"><span class="hover-anim">Twitter</span></a>
                                    </li>
                                    <li class="mb-10">
                                        <a href="#0" class="hover-this"><span class="hover-anim">LinkedIn</span></a>
                                    </li>
                                    <li>
                                        <a href="#0" class="hover-this"><span class="hover-anim">Instagram</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="item mb-40">
                                <h6 class="sub-title mb-15 opacity-7">Contact Us</h6>
                                <h5><a href="#0">Hello@email.com</a></h5>
                                <h5 class="underline mt-10"><a href="#0">+1 840 841 25 69</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==================== End Navbar ==================== -->



        <div id="smooth-content">

            <main class="main-bg">

