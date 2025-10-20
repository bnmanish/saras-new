<!doctype html>
<html class="no-js " lang="zxx" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{$page->meta_title}}</title>
        <meta name="keywords" content="{{$page->meta_keywords}}">
        <meta name="description" content="{{$page->meta_description}}">
        <meta property="og:title" content="{{$page->meta_title}}">
        <meta property="og:description" content="{{$page->meta_description}}">
        <meta property="og:image" content="{{url('uploads/setting/'.getSetting()->favicon)}}">
        <link rel="canonical" href="{{route('home')}}">
        {!!getSetting()->head_content!!}
        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{url('uploads/setting/'.getSetting()->favicon)}}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{url('assets/frontend')}}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('assets/frontend')}}/css/fontawesome.min.css">
        <link rel="stylesheet" href="{{url('assets/frontend')}}/css/magnific-popup.min.css">
        <link rel="stylesheet" href="{{url('assets/frontend')}}/css/swiper-bundle.min.css">
        <link rel="stylesheet" href="{{url('assets/frontend')}}/css/style.css">
    </head>

    <body>

        @include('frontend.layouts.header')

        <div class="breadcumb-wrapper position-relative" data-bg-src="{{url('assets/frontend')}}/img/shape/breadcrumb-shep.png">
            <div class="breadcumb-banner">
                <img src="{{url('assets/frontend')}}/img/breadcrumb/breadcumb-banner.png" alt="bg-banner">
            </div>
            <div class="breadcumb-shape">
                <img src="{{url('assets/frontend')}}/img/shape/triangle-light.png" alt="shape" class="jump">
            </div>
            <div class="container th-container4">
                <div class="row">
                    <div class="col-xxl-5">
                        <div class="breadcumb-content">
                            <h1 class="breadcumb-title">{{$page->meta_title}}</h1>
                            <ul class="breadcumb-menu">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li>{{$page->meta_title}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about1-area position-relative overflow-hidden space overflow-hidden" id="about-sec">
            <div class="container th-container4">
                <div class="about-wrap1 position-relative z-index-2">
                    <div class="row gy-60 align-items-center justify-content-center">
                        @foreach($awards as $award)
                        <div class="col-xl-3 col-md-6">
                            <div class="swiper-slide">
                                <div class="campus-card style2">
                                    <div class="box-thumb">
                                        <img src="{{url('uploads/award/'.$award->image)}}" alt="{{ $award->title ?? 'Award' }}">
                                    </div>
                                    <div class="campus-content">
                                        <a href="{{url('uploads/award/'.$award->image)}}" class="popup-image">
                                            <i class="fa-light fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="box-title-wrap">
                                        <h3 class="box-title"><a href="#">{{ $award->title ?? 'Untitled' }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.layouts.footer')

        <div class="scroll-top">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
            </svg>
        </div>

        <script src="{{url('assets/frontend')}}/js/vendor/jquery-3.7.1.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/swiper-bundle.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/bootstrap.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/jquery.magnific-popup.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/jquery.counterup.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/jquery-ui.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/imagesloaded.pkgd.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/isotope.pkgd.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/wow.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/gsap.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/ScrollTrigger.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/SplitText.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/lenis.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/main.js"></script>
    </body>
</html>