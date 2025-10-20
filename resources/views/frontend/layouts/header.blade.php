<div class="sidemenu-wrapper ">
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
        <div class="widget footer-widget">
            <div class="th-widget-about">
                <div class="about-logo">
                    <a href="{{route('home')}}">
                        <img src="{{url('assets/frontend')}}/img/logo2.svg" alt="Stadum">
                    </a>
                </div>
                <p class="about-text">Since 1999, when the newly minted Stadum team embraced its mandate to breathe new life into the downtrodden neighbourhood, East Village’s transformation has been nothing short of remarkable. </p>
                <div class="footer-info">
                    <a href="#">
                        <span class="footer-info-icon"><i class="fa-solid fa-location-dot"></i></span> 45 New Eskaton Road, Austria
                    </a>
                    <a href="mailto:infomail@example.com">
                        <span class="footer-info-icon"><i class="fa-solid fa-envelope"></i></span> infomail@example.com
                    </a>
                </div>
            </div>
        </div>
        <div class="widget footer-widget">
            <h3 class="widget_title">Recent Posts</h3>
            <div class="recent-post-wrap">
                <div class="recent-post">
                    <div class="media-img">
                        <a href="blog-details.html"><img src="{{url('assets/frontend')}}/img/blog/recent-post-1-1.jpg" alt="Blog Image"></a>
                    </div>
                    <div class="media-body">
                        <h4 class="post-title">
                            <a class="text-inherit" href="blog-details.html">Trailblazers in Faculty Perspectives</a>
                        </h4>
                        <div class="recent-post-meta">
                            <a href="blog.html"><i class="far fa-calendar"></i>26/6/2025</a>
                        </div>
                    </div>
                </div>
                <div class="recent-post">
                    <div class="media-img">
                        <a href="blog-details.html"><img src="{{url('assets/frontend')}}/img/blog/recent-post-1-2.jpg" alt="Blog Image"></a>
                    </div>
                    <div class="media-body">
                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Future Focus Preparing for Tomorrow</a></h4>
                        <div class="recent-post-meta">
                            <a href="blog.html"><i class="far fa-calendar"></i>24/6/2025</a>
                        </div>
                    </div>
                </div>
                <div class="recent-post">
                    <div class="media-img">
                        <a href="blog-details.html"><img src="{{url('assets/frontend')}}/img/blog/recent-post-1-3.jpg" alt="Blog Image"></a>
                    </div>
                    <div class="media-body">
                        <h4 class="post-title">
                            <a class="text-inherit" href="blog-details.html">The Green Initiative Sustainability in Action</a>
                        </h4>
                        <div class="recent-post-meta">
                            <a href="blog.html"><i class="far fa-calendar"></i>24/6/2025</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget footer-widget">
            <h3 class="widget_title">Popular Tags</h3>
            <div class="th-social">
                <a href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                <a href="https://pinterest.com"><i class="fab fa-pinterest-p"></i></a>
                <a href="https://linkedin.com"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://linkedin.com"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="popup-search-box">
    <button class="searchClose"><i class="far fa-times"></i></button>
    <form action="#">
        <input type="text" placeholder="What are you looking for?">
        <button type="submit"><i class="fal fa-search"></i></button>
    </form>
</div><!--==============================
Mobile Menu
============================== -->
<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{route('home')}}"><img src="{{@url('uploads/setting/'.getSetting()->site_logo)}}" alt="Saras"></a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li class="menu-item-has-children">
                    <a href="{{route('home')}}">Home</a>
                    <ul class="sub-menu">
                        <li><a href="index.html">University Home</a></li>
                        <li><a href="home-admission.html">Admission Home</a></li>
                        <li><a href="home-courses.html">Course Home</a></li>
                    </ul>
                </li>
                <li><a href="about.html">About Us</a></li>
                <li class="menu-item-has-children">
                    <a href="#">Programs</a>
                    <ul class="sub-menu">
                        <li><a href="program.html">Programs Style 1</a></li>
                        <li><a href="program-2.html">Programs Style 2</a></li>
                        <li><a href="program-details.html">Program Details</a></li>
                        <li><a href="program-details-sidebar.html">Program Details With Sidebar</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li class="menu-item-has-children">
                            <a href="#">Shop</a>
                            <ul class="sub-menu">
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="shop-details.html">Shop Details</a></li>
                                <li><a href="cart.html">Cart Page</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children">
                            <a href="#">Faculties</a>
                            <ul class="sub-menu">
                                <li><a href="faculty.html">Faculty</a></li>
                                <li><a href="faculty-details.html">Faculty Details</a></li>
                            </ul>
                        </li>
                        <li><a href="alumni.html">Alumni Page</a></li>
                        <li class="menu-item-has-children">
                            <a href="#">Researches</a>
                            <ul class="sub-menu">
                                <li><a href="research.html">Research</a></li>
                                <li><a href="research-details.html">Research Details</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Teachers</a>
                            <ul class="sub-menu">
                                <li><a href="teacher.html">Teacher</a></li>
                                <li><a href="teacher-details.html">Teacher Details</a></li>
                            </ul>
                        </li>
                        <li><a href="campus.html">Campus Life</a></li>
                        <li><a href="pricing.html">Pricing Plan</a></li>
                        <li><a href="faq.html">Faqs Page</a></li>
                        <li><a href="error.html">Error Page</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Events</a>
                    <ul class="sub-menu">
                        <li><a href="event.html">Events Page</a></li>
                        <li><a href="event-details.html">Event Details</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Blogs</a>
                    <ul class="sub-menu">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                        <li><a href="blog-details-sidebar.html">Blog Details With Sidebar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</div><!--==============================
Header Area
==============================-->
<header class="th-header header-layout2">
    <div class="header-top">
        <div class="container th-container4">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto d-none d-lg-block">
                    <div class="header-links">
                        <ul class="header-left-wrap">
                            <li>
                                <div class="dropdown-link">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"> Studients</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li>
                                            <a href="#">Scrollship</a>
                                            <a href="#">Forening</a>
                                            <a href="#">Online</a>
                                            <a href="#">Bysexual</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="contact.html">Staff</a></li>
                            <li><a href="alumni.html">Alumni</a></li>
                            <li><a href="faculty.html">Faculty</a> </li>
                            <li><a href="contact.html">Community</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-links">
                        <ul class="header-right-wrap">
                            <li><i class="fa-solid fa-user"></i><a href="#login-form" class="popup-content">Login / Register</a></li>
                            <li><i class="fas fa-comments"></i><a href="faq.html">FAQ</a></li>
                            <li>
                                <div class="dropdown-link">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{url('assets/frontend')}}/img/icon/lang.svg" alt=""> </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                        <li>
                                            <a href="#">German</a>
                                            <a href="#">French</a>
                                            <a href="#">Italian</a>
                                            <a href="#">Latvian</a>
                                            <a href="#">Spanish</a>
                                            <a href="#">Greek</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <!-- Main Menu Area -->
        <div class="menu-area">
            <div class="container th-container4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="{{route('home')}}">
                                <img src="{{url('uploads/setting/'.getSetting()->site_logo)}}" alt="Saras" style="width: 136px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-auto d-none d-xl-block">
                        <nav class="main-menu">
                            <ul>
                                <li>
                                    <a href="{{route('home')}}">Home</a>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="{{route('about.us')}}">About Us</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('chairman.message') }}">Chairman Message</a></li>
                                        <li><a href="{{ route('md.message') }}">MD Message</a></li>
                                        <li><a href="{{ route('awards') }}">Awards</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Programs</a>
                                    <ul class="sub-menu">
                                        <li><a href="program.html">Programs Style 1</a></li>
                                        <li><a href="program-2.html">Programs Style 2</a></li>
                                        <li><a href="program-details.html">Program Details</a></li>
                                        <li><a href="program-details-sidebar.html">Program Details With Sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">Shop</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop.html">Shop</a></li>
                                                <li><a href="shop-details.html">Shop Details</a></li>
                                                <li><a href="cart.html">Cart Page</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="#">Faculties</a>
                                            <ul class="sub-menu">
                                                <li><a href="faculty.html">Faculty</a></li>
                                                <li><a href="faculty-details.html">Faculty Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="alumni.html">Alumni Page</a></li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Researches</a>
                                            <ul class="sub-menu">
                                                <li><a href="research.html">Research</a></li>
                                                <li><a href="research-details.html">Research Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Teachers</a>
                                            <ul class="sub-menu">
                                                <li><a href="teacher.html">Teacher</a></li>
                                                <li><a href="teacher-details.html">Teacher Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="campus.html">Campus Life</a></li>
                                        <li><a href="pricing.html">Pricing Plan</a></li>
                                        <li><a href="faq.html">Faqs Page</a></li>
                                        <li><a href="error.html">Error Page</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Events</a>
                                    <ul class="sub-menu">
                                        <li><a href="event.html">Events Page</a></li>
                                        <li><a href="event-details.html">Event Details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Blogs</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                        <li><a href="blog-details-sidebar.html">Blog Details With Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-auto">
                        <div class="header-right">
                            <button class="header-search searchBoxToggler">
                                <i class="fa-regular fa-magnifying-glass"></i>
                            </button>
                            <a href="#" class="icon-btn sideMenuToggler d-none d-xl-block"><img src="{{url('assets/frontend')}}/img/icon/grid.svg" alt=""></a>
                            <div class="header-action">
                                <a href="contact.html" class="th-btn th-icon"> Apply Now</a>
                            </div>
                            <button type="button" class="th-menu-toggle d-inline-block d-xl-none"><i class="far fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> 