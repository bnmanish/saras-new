<header class="th-header header-layout1">
        <div class="header-top">
            <div class="container th-container4">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-links">
                            <ul class="header-left-wrap">
                                <li>
                                    <div class="dropdown-link"><a class="dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                            aria-expanded="false">Studients</a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                            <li><a href="#">Scrollship</a> <a href="#">Forening</a> <a
                                                    href="#">Online</a> <a href="#">Bysexual</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="{{route('contact')}}">Staff</a></li>
                                <li><a href="alumni.html">Alumni</a></li>
                                <li><a href="faculty.html">Faculty</a></li>
                                <li><a href="{{route('contact')}}">Community</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-links">
                            <ul class="header-right-wrap">
                                <li><i class="fa-solid fa-user"></i><a href="#login-form" class="popup-content">Login /
                                        Register</a></li>
                                <li><i class="fas fa-comments"></i><a href="faq.html">FAQ</a></li>
                                <li>
                                    <div class="dropdown-link"><a class="dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false"><img
                                                src="{{url('assets/frontend')}}/img/icon/lang.svg" alt=""></a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                            <li><a href="#">German</a> <a href="#">French</a> <a href="#">Italian</a> <a
                                                    href="#">Latvian</a> <a href="#">Spanish</a> <a href="#">Greek</a>
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
        <div class="header-info d-none d-sm-block">
            <div class="container th-container2">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <div class="header-logo"><a href="{{route('home')}}"><img src="{{url('assets/frontend')}}/img/logo.svg"
                                    alt="Stadum"></a></div>
                    </div>
                    <div class="col-auto">
                        <div class="header-info-right">
                            <div class="header-info-item">
                                <div class="header-info-icon"><i class="fa-solid fa-location-dot"></i></div>
                                <div class="header-info-content"><span class="header-info-text">Address</span>
                                    <h3 class="header-info-title"><a href="#">{{getSetting()->primary_address}}</a></h3>
                                </div>
                            </div>
                            <div class="header-info-item">
                                <div class="header-info-icon"><i class="fa-solid fa-envelope"></i></div>
                                <div class="header-info-content"><span class="header-info-text">Email</span>
                                    <h3 class="header-info-title"><a
                                            href="tel:{{getSetting()->primary_email}}">{{getSetting()->primary_email}}</a></h3>
                                </div>
                            </div>
                            <div class="header-info-item">
                                <div class="header-info-icon"><i class="fa-solid fa-phone"></i></div>
                                <div class="header-info-content"><span class="header-info-text">Phone Number</span>
                                    <h3 class="header-info-title"><a href="tel:{{getSetting()->primary_contact}}">{{getSetting()->primary_contact}}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <div class="menu-area">
                <div class="container th-container2">
                    <div class="menu-wrapp">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="header-left d-flex align-items-center">
                                    <div class="header-logo d-block d-sm-none"><a href="{{route('home')}}"><img
                                                src="{{url('assets/frontend')}}/img/logo.svg" alt="Stadum"></a></div>
                                    <div class="header-button d-none d-sm-block"><a href="{{route('contact')}}"
                                            class="th-btn">Get More Info <img src="{{url('assets/frontend')}}/img/icon/right-icon.svg"
                                                class="th-arrow" alt="icon"></a></div>
                                    <nav class="main-menu d-none d-xl-block">
                                        <ul>
                                            <li><a href="{{route('home')}}">Home</a></li>
                                            <li class="menu-item-has-children">
                                                <a href="{{route('about.us')}}">About Us</a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{ route('chairman.message') }}">Chairman Message</a></li>
                                                    <li><a href="{{ route('md.message') }}">MD Message</a></li>
                                                    <li><a href="{{ route('awards') }}">Awards</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">Programs</a>
                                                <ul class="sub-menu">
                                                    <li><a href="program.html">Programs Style 1</a></li>
                                                    <li><a href="program-2.html">Programs Style 2</a></li>
                                                    <li><a href="program-details.html">Program Details</a></li>
                                                    <li><a href="program-details-sidebar.html">Program Details With
                                                            Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">Pages</a>
                                                <ul class="sub-menu">
                                                    <li class="menu-item-has-children"><a href="#">Shop</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="shop.html">Shop</a></li>
                                                            <li><a href="shop-details.html">Shop Details</a></li>
                                                            <li><a href="cart.html">Cart Page</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="wishlist.html">Wishlist</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children"><a href="#">Faculties</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="faculty.html">Faculty</a></li>
                                                            <li><a href="faculty-details.html">Faculty Details</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="alumni.html">Alumni Page</a></li>
                                                    <li class="menu-item-has-children"><a href="#">Researches</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="research.html">Research</a></li>
                                                            <li><a href="research-details.html">Research Details</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children"><a href="#">Teachers</a>
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
                                            <li class="menu-item-has-children"><a href="#">Events</a>
                                                <ul class="sub-menu">
                                                    <li><a href="event.html">Events Page</a></li>
                                                    <li><a href="event-details.html">Event Details</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">Blogs</a>
                                                <ul class="sub-menu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                    <li><a href="blog-details-sidebar.html">Blog Details With
                                                            Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-auto ms-lg-auto">
                                <div class="header-button">
                                    <form class="search-form"><input type="text" placeholder="Search..."> <button
                                            type="submit"><i class="fa-light fa-magnifying-glass"></i></button></form><a
                                        href="#" class="icon-btn sideMenuToggler d-none d-xl-block"><img
                                            src="{{url('assets/frontend')}}/img/icon/grid2.svg" alt=""></a><button type="button"
                                        class="th-menu-toggle d-inline-block d-xl-none"><i
                                            class="far fa-bars"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>