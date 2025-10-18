<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <!-- css starts -->
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="fonts.googleapis.com/css9d4c.css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{url('assets/frontend')}}/font/flaticon.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/search.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/animate.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/aos.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/aos2.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/lightcase.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/menu.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/slick.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/styles.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/maps.css">
    <link rel="stylesheet" id="color" href="{{url('assets/frontend')}}/css/colors/pink.css">
    <link rel="stylesheet" id="color" href="{{url('assets/frontend')}}/css/custom.css">

</head>

<body class="homepage-9 hp-6 homepage-1 mh">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        @include('frontend/layouts/header')
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- STAR HEADER SEARCH -->
        <section id="hero-area" class="parallax-searchs home15 overlay thome-6 thome-1" data-stellar-background-ratio="0.5"  style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url({{url('uploads/page/'.$page->image)}}) no-repeat center top !important;">
            <div class="hero-main">
                <div class="container" data-aos="zoom-in">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-inner">
                                <!-- Welcome Text -->
                                <div class="welcome-text">
                                    {!!$page->short_description!!}
                                    <div class="type-row">
                                        @foreach($type as $typeRow)
                                        <a href="{{route('project.typewise',$typeRow->url)}}"><span>{{$typeRow->title}}</span></a>
                                        @endforeach
                                    </div>
                                </div>
                                <!--/ End Welcome Text -->
                                <!-- Search Form -->
                                <div class="col-12">
                                    <div class="banner-search-wrap">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tabs_1">
                                                <div class="rld-main-search">
                                                    <form id="seach-form" method="get" action="{{route('search.project')}}">
                                                        <div class="row justify-content-center">
                                                            <div class="rld-single-select ml-22">
                                                                <select class="select single-select" name="property_for">
                                                                    <option value="">Property For</option>
                                                                    <option value="sale">Sale</option>
                                                                    <option value="rent">Rent</option>
                                                                    <option value="lease">Lease</option>
                                                                </select>
                                                            </div>
                                                            <div class="rld-single-select ml-22">
                                                                <select class="select single-select" name="property_type">
                                                                    <option value="">Property Type</option>
                                                                    @foreach($type as $typeRow)
                                                                    <option value="{{$typeRow->url}}">{{$typeRow->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="rld-single-select mr-lg-3">
                                                                <select class="select single-select mr-0" name="location">
                                                                    <option value="">Location</option>
                                                                    @foreach($city as $cityRow)
                                                                    <option value="{{$cityRow->url}}">{{$cityRow->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="rld-single-select mr-lg-3">
                                                                <select class="select single-select mr-0" name="brand">
                                                                    <option value="">Brand</option>
                                                                    @foreach($brand as $brandRow)
                                                                    <option value="{{$brandRow->url}}">{{$brandRow->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                                                <a onclick="$('#seach-form').submit()" class="btn btn-yellow" href="javascript:;">Search Now</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Search Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END HEADER SEARCH -->
        
        <!-- START SECTION POPULAR PLACES -->
        <section class="feature-categories bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Popular </span>Places</h2>
                    <p>Properties In Most Popular Places.</p>
                </div>
                <div class="row">
                    @foreach($city as $cityRow)
                    <div class="col-xl-3 col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay="150">
                        <div class="small-category-2">
                            <div class="small-category-2-thumb img-1">
                                <a href="{{route('project.citywise',$cityRow->url)}}"><img src="{{url('uploads/city/'.$cityRow->image)}}" alt=""></a>
                            </div>
                            <div class="sc-2-detail">
                                <h4 class="sc-jb-title"><a href="{{route('project.citywise',$cityRow->url)}}">{{$cityRow->title}}</a></h4>
                                <span>{{$cityRow->projects->count()}} Projects</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /row -->
            </div>
        </section>
        <!-- END SECTION POPULAR PLACES -->

        <!-- START SECTION RECENTLY PROPERTIES -->
        <section class="section-bg featured portfolio rec-pro disc">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Featured </span>Project</h2>
                    <p>These are our featured project</p>
                </div>
                <div class="portfolio col-xl-12">
                    <div class="slick-lancers">
                        @foreach($feature as $featureRow)
                        <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                            <div class="landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="{{route('project.details',$featureRow->url)}}" class="homes-img">
                                                <div class="homes-tag button alt featured">{{ucfirst($featureRow->section)}}</div>
                                                @if($featureRow->is_rera_approved == ' 1')
                                                <div class="homes-tag button rera-section">RERA Approved</div>
                                                @endif
                                                <div class="homes-tag button alt sale">{{ucfirst($featureRow->project_for)}}</div>
                                                <img src="{{url('uploads/project/cover/'.$featureRow->cover_image)}}" alt="{{$featureRow->title}}" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="{{route('project.details',$featureRow->url)}}" class="btn"><i class="fa fa-link"></i></a>
                                            @if($featureRow->video != NULL)
                                            <a target="_blank" href="{{$featureRow->video}}" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="{{route('project.details',$featureRow->url)}}">{{$featureRow->title}}</a></h3>

                                        <p class="homes-address m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/></svg>&nbsp;
                                            <span class="brand-name">{{$featureRow->brand->title}}</span>
                                        </p>

                                        <p class="homes-address m-0">
                                            <i class="fa fa-map-marker"></i> &nbsp;<span>{{$featureRow->address}}</span>
                                        </p>

                                        <p class="homes-address mb-3">
                                            <i class="fa fa-building"></i>&nbsp;
                                            <span>{{$featureRow->type->title}}</span>
                                        </p>

                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="{{route('project.details',$featureRow->url)}}">₹ {{$featureRow->price}}</a>
                                            </h3>
                                            <div class="compare">
                                                <a href="{{route('project.details',$featureRow->url)}}" title="Compare">
                                                    <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION RECENTLY PROPERTIES -->


        <!-- START SECTION RECENTLY PROPERTIES -->
        <section class="section-bg featured bg-theme portfolio rec-pro disc">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Recent </span>Project</h2>
                    <p>These are our recent project</p>
                </div>
                <div class="portfolio col-xl-12">
                    <div class="slick-lancers">
                        @foreach($recent as $recentRow)
                        <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                            <div class="landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="{{route('project.details',$recentRow->url)}}" class="homes-img">
                                                <div class="homes-tag button alt featured">{{ucfirst($recentRow->section)}}</div>
                                                @if($recentRow->is_rera_approved == ' 1')
                                                <div class="homes-tag button rera-section">RERA Approved</div>
                                                @endif
                                                <div class="homes-tag button alt sale">{{ucfirst($recentRow->project_for)}}</div>
                                                <img src="{{url('uploads/project/cover/'.$recentRow->cover_image)}}" alt="{{$recentRow->title}}" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="{{route('project.details',$recentRow->url)}}" class="btn"><i class="fa fa-link"></i></a>
                                            @if($recentRow->video != NULL)
                                            <a target="_blank" href="{{$recentRow->video}}" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="{{route('project.details',$recentRow->url)}}">{{$recentRow->title}}</a></h3>
                                        <p class="homes-address m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/></svg>&nbsp;
                                            <span class="brand-name">{{$recentRow->brand->title}}</span>
                                        </p>
                                        <p class="homes-address m-0">
                                            <a href="{{route('project.details',$recentRow->url)}}">
                                                <i class="fa fa-map-marker"></i><span>{{$recentRow->address}}</span>
                                            </a>

                                            <p class="homes-address mb-3">
                                                <i class="fa fa-building"></i>&nbsp;
                                                <span>{{$recentRow->type->title}}</span>
                                            </p>
                                        </p>
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="{{route('project.details',$recentRow->url)}}">₹ {{$recentRow->price}}</a>
                                            </h3>
                                            <div class="compare">
                                                <a href="{{route('project.details',$recentRow->url)}}" title="Compare">
                                                    <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION RECENTLY PROPERTIES -->



        <!-- START SECTION Luxury PROPERTIES -->
        <section class="section-bg featured portfolio rec-pro disc">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Luxury </span>Project</h2>
                    <p>These are our luxury project</p>
                </div>
                <div class="portfolio col-xl-12">
                    <div class="slick-lancers">
                        @foreach($luxury as $luxuryRow)
                        <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                            <div class="landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="{{route('project.details',$luxuryRow->url)}}" class="homes-img">
                                                <div class="homes-tag button alt featured">{{ucfirst($luxuryRow->section)}}</div>
                                                @if($luxuryRow->is_rera_approved == ' 1')
                                                <div class="homes-tag button rera-section">RERA Approved</div>
                                                @endif
                                                <div class="homes-tag button alt sale">{{ucfirst($luxuryRow->project_for)}}</div>
                                                <img src="{{url('uploads/project/cover/'.$luxuryRow->cover_image)}}" alt="{{$luxuryRow->title}}" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="{{route('project.details',$luxuryRow->url)}}" class="btn"><i class="fa fa-link"></i></a>
                                            @if($luxuryRow->video != NULL)
                                                <a target="_blank" href="{{$luxuryRow->video}}" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="{{route('project.details',$luxuryRow->url)}}">{{$luxuryRow->title}}</a></h3>
                                        <p class="homes-address m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/></svg>&nbsp;
                                            <span class="brand-name">{{$luxuryRow->brand->title}}</span>
                                        </p>
                                        <p class="homes-address m-0">
                                            <a href="{{route('project.details',$luxuryRow->url)}}">
                                                <i class="fa fa-map-marker"></i><span>{{$luxuryRow->address}}</span>
                                            </a>
                                            <p class="homes-address mb-3">
                                                <i class="fa fa-building"></i>&nbsp;
                                                <span>{{$luxuryRow->type->title}}</span>
                                            </p>
                                        </p>
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="{{route('project.details',$luxuryRow->url)}}">₹ {{$luxuryRow->price}}</a>
                                            </h3>
                                            <div class="compare">
                                                <a href="{{route('project.details',$luxuryRow->url)}}" title="Compare">
                                                    <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION Luxury PROPERTIES -->

        <!-- START SECTION WHY CHOOSE US -->
        <section class="how-it-works bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Why </span>Choose Us</h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="row service-1">
                    <article class="col-lg-3 col-md-6 col-xs-12 serv" data-aos="fade-up" data-aos-delay="150">
                        <div class="serv-flex">
                            <div class="art-1 img-13">
                                <img src="{{url('assets/frontend')}}/images/icons/icon-4.svg" alt="">
                                <h3>Wide Range Of Properties</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">Explore a diverse portfolio of properties tailored to meet your needs and preferences. Find your perfect match today.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-xs-12 serv" data-aos="fade-up" data-aos-delay="250">
                        <div class="serv-flex">
                            <div class="art-1 img-14">
                                <img src="{{url('assets/frontend')}}/images/icons/icon-5.svg" alt="">
                                <h3>Trusted by thousands</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">Join the thousands who trust us for reliable, transparent property solutions. Your satisfaction is our priority.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-xs-12 serv mb-0 pt" data-aos="fade-up" data-aos-delay="350">
                        <div class="serv-flex arrow">
                            <div class="art-1 img-15">
                                <img src="{{url('assets/frontend')}}/images/icons/icon-6.svg" alt="">
                                <h3>Financing made easy</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">Simplify your property journey with hassle-free financing options tailored to your needs. Achieve your dreams effortlessly.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-xs-12 serv mb-0 pt its-2" data-aos="fade-up" data-aos-delay="450">
                        <div class="serv-flex">
                            <div class="art-1 img-14">
                                <img src="{{url('assets/frontend')}}/images/icons/icon-15.svg" alt="">
                                <h3>We are here near you</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">We're your best property experts, ready to guide you through every step of your real estate journey. Reach out today.</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <!-- END SECTION WHY CHOOSE US -->        

        <!-- START SECTION RECENTLY PROPERTIES -->
        <section class="featured portfolio rec-pro disc">
            <div class="container-fluid">
                <div class="sec-title discover">
                    <h2><span>Popular </span> Properties</h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="portfolio col-xl-12">
                    <div class="slick-lancers">
                         @foreach($popular as $popularRow)
                        <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                            <div class="landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="{{route('project.details',$popularRow->url)}}" class="homes-img">
                                                <div class="homes-tag button alt featured">{{ucfirst($popularRow->section)}}</div>
                                                @if($popularRow->is_rera_approved == ' 1')
                                                <div class="homes-tag button rera-section">RERA Approved</div>
                                                @endif
                                                <div class="homes-tag button alt sale">{{ucfirst($popularRow->project_for)}}</div>
                                                <img src="{{url('uploads/project/cover/'.$popularRow->cover_image)}}" alt="{{$popularRow->title}}" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="{{route('project.details',$popularRow->url)}}" class="btn"><i class="fa fa-link"></i></a>
                                            @if($popularRow->video != NULL)
                                            <a target="_blank" href="{{$popularRow->video}}" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="{{route('project.details',$popularRow->url)}}">{{$popularRow->title}}</a></h3>
                                        <p class="homes-address m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/></svg>&nbsp;
                                            <span class="brand-name">{{$popularRow->brand->title}}</span>
                                        </p>
                                        <p class="homes-address m-0">
                                            <a href="{{route('project.details',$popularRow->url)}}">
                                                <i class="fa fa-map-marker"></i><span>{{$popularRow->address}}</span>
                                            </a>

                                            <p class="homes-address mb-3">
                                                <i class="fa fa-building"></i>&nbsp;
                                                <span>{{$popularRow->type->title}}</span>
                                            </p>
                                        </p>
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="{{route('project.details',$popularRow->url)}}">₹ {{$popularRow->price}}</a>
                                            </h3>
                                            <div class="compare">
                                                <a href="{{route('project.details',$popularRow->url)}}" title="Compare">
                                                    <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION RECENTLY PROPERTIES -->

        <!-- START SECTION TESTIMONIALS -->
        <section class="testimonials bg-white-2 rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Clients </span>Testimonials</h2>
                    <p>We collect reviews from our customers.</p>
                </div>
                <div class="owl-carousel job_clientSlide">
                    @foreach($testimonials as $testimonial)
                    <div class="singleJobClinet" data-aos="zoom-in" data-aos-delay="150">
                        {!!$testimonial->description!!}
                        <div class="detailJC">
                            <span><img src="{{url('uploads/testimonial/'.$testimonial->image)}}" alt=""/></span>
                            <h5>{{$testimonial->name}}</h5>
                            <p>{{$testimonial->profession}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- END SECTION TESTIMONIALS -->

        <!-- STAR SECTION PARTNERS -->
        <div class="partners bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Our </span>Brands</h2>
                    <p>The Brands That Works With Us.</p>
                </div>
                <div class="owl-carousel style2">
                    @foreach($brand as $brandRow)
                    <div class="owl-item" data-aos="fade-up"><a href="{{route('project.brandwise',$brandRow->url)}}"><img src="{{url('uploads/brand/'.$brandRow->image)}}" alt="{{$brandRow->title}}"></a></div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- END SECTION PARTNERS -->

        <!-- START FOOTER -->
        @include('frontend/layouts/footer')
        <!-- END FOOTER -->
    </div>
    <!-- Wrapper / End -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-596T2H9B"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <!-- ARCHIVES JS -->
    <script src="{{url('assets/frontend')}}/js/jquery-3.5.1.min.js"></script>
    <script src="{{url('assets/frontend')}}/js/rangeSlider.js"></script>
    <script src="{{url('assets/frontend')}}/js/tether.min.js"></script>
    <script src="{{url('assets/frontend')}}/js/moment.js"></script>
    <script src="{{url('assets/frontend')}}/js/bootstrap.min.js"></script>
    <script src="{{url('assets/frontend')}}/js/mmenu.min.js"></script>
    <script src="{{url('assets/frontend')}}/js/mmenu.js"></script>
    <script src="{{url('assets/frontend')}}/js/aos.js"></script>
    <script src="{{url('assets/frontend')}}/js/aos2.js"></script>
    <script src="{{url('assets/frontend')}}/js/animate.js"></script>
    <script src="{{url('assets/frontend')}}/js/slick.min.js"></script>
    <script src="{{url('assets/frontend')}}/js/fitvids.js"></script>
    <script src="{{url('assets/frontend')}}/js/jquery.waypoints.min.js"></script>
    <script src="{{url('assets/frontend')}}/js/typed.min.js"></script>
    <script src="{{url('assets/frontend')}}/js/jquery.counterup.min.js"></script>
    <script src="{{url('assets/frontend')}}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{url('assets/frontend')}}/js/isotope.pkgd.min.js"></script>
    <script src="{{url('assets/frontend')}}/js/smooth-scroll.min.js"></script>
    <script src="{{url('assets/frontend')}}/js/lightcase.js"></script>
    <script src="{{url('assets/frontend')}}/js/search.js"></script>
    <script src="{{url('assets/frontend')}}/js/owl.carousel.js"></script>
    <script src="{{url('assets/frontend')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{url('assets/frontend')}}/js/ajaxchimp.min.js"></script>
    <script src="{{url('assets/frontend')}}/js/newsletter.js"></script>
    <script src="{{url('assets/frontend')}}/js/jquery.form.js"></script>
    <script src="{{url('assets/frontend')}}/js/jquery.validate.min.js"></script>
    <script src="{{url('assets/frontend')}}/js/searched.js"></script>
    <script src="{{url('assets/frontend')}}/js/forms-2.js"></script>
    <script src="{{url('assets/frontend')}}/js/map-style2.js"></script>
    <script src="{{url('assets/frontend')}}/js/range.js"></script>
    <script src="{{url('assets/frontend')}}/js/color-switcher.js"></script>
    <script>
        $(window).on('scroll load', function() {
            $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
        });
    </script>

    <!-- Slider Revolution scripts -->
    <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>

    <script>
        var typed = new Typed('.typed', {
            strings: ["House ^2000", "Apartment ^2000", "Plaza ^4000"],
            smartBackspace: false,
            loop: true,
            showCursor: true,
            cursorChar: "|",
            typeSpeed: 50,
            backSpeed: 30,
            startDelay: 800
        });

    </script>

    <script>
        $('.slick-lancers').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            adaptiveHeight: true,
            responsive: [{
                breakpoint: 1292,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    arrows: false
                }
            }, {
                breakpoint: 993,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    arrows: false
                }
            }, {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    arrows: false
                }
            }]
        });

    </script>

    <script>
        $('.job_clientSlide').owlCarousel({
            items: 2,
            loop: true,
            margin: 30,
            autoplay: false,
            nav: true,
            smartSpeed: 1000,
            slideSpeed: 1000,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                991: {
                    items: 3
                }
            }
        });

    </script>

    <script>
        $('.style2').owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            autoWidth: false,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 2,
                    margin: 20
                },
                400: {
                    items: 2,
                    margin: 20
                },
                500: {
                    items: 3,
                    margin: 20
                },
                768: {
                    items: 4,
                    margin: 20
                },
                992: {
                    items: 5,
                    margin: 20
                },
                1000: {
                    items: 7,
                    margin: 20
                }
            }
        });

    </script>

    <script>
        $(".dropdown-filter").on('click', function() {

            $(".explore__form-checkbox-list").toggleClass("filter-block");

        });

    </script>

    <!-- MAIN JS -->
    <script src="{{url('assets/frontend')}}/js/script.js"></script>
    <script src="{{url('assets/frontend')}}/js/inner.js"></script>
    <script>
        $(document).ready(function() {

            $('.subsEmail').focus(function(){
                $('.subscribe-msg').html('');
            });

            $('#subscribe-form').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('subscribe.news.letter') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                       // console.log(response.errors.email[0]);
                       if(response.status == false){
                            $('.subscribe-msg').removeClass('text-success').addClass('text-danger');
                            $('.subscribe-msg').html(response.errors.email[0]);
                       }else{
                            $('.subscribe-msg').removeClass('text-danger').addClass('text-success');
                            $('.subscribe-msg').html(response.message);
                            $('.subsEmail').val('');
                       }
                       
                    },
                });
            });
        });
    </script>

</body>
</html>
