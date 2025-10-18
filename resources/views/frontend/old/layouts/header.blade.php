<header id="header-container" class="header head-tr">
    <div class="strip-top theme-bg">
        <div class="container container-header">
            <div class="strip-top d-none d-md-block">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-start strip-top-left">
                        <div><a href="tel:{{@getSetting()->primary_contact}}"><i class="fa fa-phone" aria-hidden="true"></i> {{@getSetting()->primary_contact}}</a></div>
                        <div><a href="mailto:{{@getSetting()->primary_email}}"><i class="fa fa-envelope" aria-hidden="true"></i> {{@getSetting()->primary_email}}</a></div>
                    </div>
                    <div class="col-md-6 d-flex text-end justify-content-end strip-top-right">
                        @if(getSetting()->facebook)
                        <div><a target="_blank" href="{{getSetting()->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                        @endif
                        @if(getSetting()->twitter)
                        <div><a target="_blank" href="{{getSetting()->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                        @endif
                        @if(getSetting()->instagram)
                        <div><a target="_blank" href="{{getSetting()->instagram}}"><i class="fab fa-instagram"></i></a></div>
                        @endif
                        @if(getSetting()->youtube)
                        <div><a target="_blank" href="{{getSetting()->youtube}}"><i class="fa fa-youtube" aria-hidden="true"></i></a></div>
                        @endif
                        @if(getSetting()->linkedin)
                        <div><a target="_blank" href="{{getSetting()->linkedin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="strip-top d-block d-md-none">
                <div class="row">
                    <div class="col-md-6 d-flex text-end strip-top-right">
                        <div><a href="tel:{{@getSetting()->primary_contact}}"><i class="fa fa-phone" aria-hidden="true"></i></a></div>
                        <div><a href="mailto:{{@getSetting()->primary_email}}"><i class="fa fa-envelope" aria-hidden="true"></i></a></div>
                        @if(getSetting()->facebook)
                        <div><a target="_blank" href="{{getSetting()->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                        @endif
                        @if(getSetting()->twitter)
                        <div><a target="_blank" href="{{getSetting()->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                        @endif
                        @if(getSetting()->instagram)
                        <div><a target="_blank" href="{{getSetting()->instagram}}"><i class="fab fa-instagram"></i></a></div>
                        @endif
                        @if(getSetting()->youtube)
                        <div><a target="_blank" href="{{getSetting()->youtube}}"><i class="fa fa-youtube" aria-hidden="true"></i></a></div>
                        @endif
                        @if(getSetting()->linkedin)
                        <div><a target="_blank" href="{{getSetting()->linkedin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header -->
    <div id="header" class="head-tr bottom">
        <div class="container container-header">
            <!-- Left Side Content -->
            <div class="left-side">
                <!-- Logo -->
                <div id="logo">
                    <a href="{{route('home')}}"><img src="{{@url('uploads/setting/'.getSetting()->site_logo)}}" data-sticky-logo="{{@url('uploads/setting/'.getSetting()->site_logo)}}" alt="River Edge"></a>
                </div>
                <!-- Mobile Navigation -->
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
					<span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
                <!-- Main Navigation -->
                <nav id="navigation" class="style-1 head-tr">
                    <ul id="responsive">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('about.us')}}">About us</a></li>
                        <li><a href="{{route('projects')}}">Projects</a></li>
                        

                        <li><a href="#">Cities</a>
                            <ul>
                                @foreach(citiesList() as $cityRow)
                                <li><a href="{{route('project.citywise',$cityRow->url)}}">{{$cityRow->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li><a href="#">Brands</a>
                            <ul>
                                @foreach(brandList() as $brandRow)
                                <li><a href="{{route('project.brandwise',$brandRow->url)}}">{{$brandRow->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li><a href="{{route('blog')}}">Blog</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                        
                    </ul>
                </nav>
                <!-- Main Navigation / End -->
            </div>
            <!-- Left Side Content / End -->

            <!-- Right Side Content / End -->
            <div class="right-side d-none d-none d-lg-none d-xl-flex">
                <!-- Header Widget -->
                <div class="header-widget">
                    <a href="javascript:;" class="button border show-reg-form modal-open">Schedule Visit</a>
                </div>
                <!-- Header Widget / End -->
            </div>
            <!-- Right Side Content / End -->


        </div>
    </div>
    <!-- Header / End -->

</header>