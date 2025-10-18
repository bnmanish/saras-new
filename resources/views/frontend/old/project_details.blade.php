<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$data->meta_title}}</title>
    <meta name="keywords" content="{{$data->meta_keywords}}">
    <meta name="description" content="{{$data->meta_description}}">
    <meta property="og:title" content="{{$data->meta_title}}">
    <meta property="og:description" content="{{$data->meta_description}}">
    <meta property="og:image" content="{{url('uploads/setting/'.getSetting()->favicon)}}">
    <link rel="canonical" href="{{route('home')}}">
    {!!getSetting()->head_content!!}
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="fonts.googleapis.com/cssa07a.css?family=Lato:300,300i,400,400i%7CMontserrat:500,600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{url('assets/frontend')}}/font/flaticon.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/font-awesome.min.css">
    <!-- LEAFLET MAP -->
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/leaflet.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/leaflet-gesture-handling.min.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/leaflet.markercluster.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/leaflet.markercluster.default.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/timedropper.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/datedropper.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/animate.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/lightcase.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/menu.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/slick.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/styles.css">
    <link rel="stylesheet" id="color" href="{{url('assets/frontend')}}/css/default.css">
    <link rel="stylesheet" id="color" href="{{url('assets/frontend')}}/css/custom.css">
    <style>
        .modal .close, .modal-footer .btn-secondary {
          display: none;
        }
        #myModal{
            z-index: 99999;
        }
    </style>
</head>

<body class="inner-pages sin-1 homepage-4 hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        @include('frontend/layouts/header')
        <div class="clearfix"></div>
        <!-- Header Container / End -->
        <!-- END SECTION HEADINGS -->

        <section class="headings" style="background:none;background-color: #006A94;">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>{{$data->title}}</h1>
                    <h2><a href="{{route('home')}}">Home </a> &nbsp;/&nbsp; {{$data->title}}</h2>
                </div>
            </div>
        </section>

        <!-- START SECTION PROPERTIES LISTING -->
        <section class="single-proper blog details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 blog-pots">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="headings-2 pt-0 pb-2">
                                    <div class="pro-wrapper row">
                                        <div class="col-12">
                                            <div class="detail-wrapper-body">
                                                <div class="listing-title-bar">
                                                    <h3>{{--{{$data->title}}--}} <span class="mrg-l-5 category-tag">{{$data->project_for}}</span></h3>
                                                    <div class="mt-0">
                                                        <a href="#listing-location" class="listing-address">
                                                            <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i>{{$data->address}}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="single detail-wrapper mr-2 m-0">
                                                <div class="detail-wrapper-body">
                                                    <div class="listing-title-bar">
                                                        <h4>₹ {{$data->price}}</h4>
                                                        <!-- <div class="mt-0">
                                                            <a href="#listing-location" class="listing-address">
                                                                <p>$ 1,200 / sq ft</p>
                                                            </a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                                <!-- main slider carousel items -->
                                <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">
                                    <h5 class="mb-4">Gallery</h5>
                                    <div class="carousel-inner">
                                        @foreach($data->sliderimages as $key => $slide)
                                        <div class="@if($key==0) active @endif item carousel-item" data-slide-number="{{$key}}">
                                            <img src="{{url('uploads/project/slider/'.$slide->file)}}" class="img-fluid" alt="slider-image-{{$key}}">
                                        </div>
                                        @endforeach

                                        <a class="carousel-control left" href="#listingDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                        <a class="carousel-control right" href="#listingDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                                    </div>
                                    <!-- main slider carousel nav controls -->
                                    <ul class="carousel-indicators smail-listing list-inline">
                                        @foreach($data->sliderimages as $key => $slide)
                                        <li class="list-inline-item @if($key==0) active @endif">
                                            <a id="carousel-selector-{{$key}}" class="selected" data-slide-to="{{$key}}" data-target="#listingDetailsSlider">
                                                <img src="{{url('uploads/project/slider/'.$slide->file)}}" class="img-fluid" alt="listing-small-{{$key}}">
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <!-- main slider carousel items -->
                                </div>
                                @if($data->description)
                                <div class="blog-info details mb-30">
                                    <h5 class="mb-4">Description</h5>
                                    {!!$data->description!!}
                                </div>
                                @endif
                            </div>
                        </div>

                        @if($data->project_details)
                        <div class="single homes-content details mb-30">
                            <!-- title -->
                            <h5 class="mb-4">Property Details</h5>
                            {!!$data->project_details!!}
                            <!-- title -->
                        </div>
                        @endif

                        @if(count($data->amenities) > 0)
                        <div class="single homes-content details mb-30">
                            <h5>Amenities</h5>
                            <!-- cars List -->
                            <ul class="homes-list amenity-icon clearfix">
                                @foreach($data->amenities as $amenity)
                                <li>
                                    <!-- <i class="fa fa-check-square" aria-hidden="true"></i> -->
                                    <img class="amenity-icon-size" src="{{url('uploads/amenity/'.$amenity->image)}}"> &nbsp;&nbsp;&nbsp;
                                    <span>{{$amenity->title}}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(count($data->floorplan) > 0)
                        <div class="floor-plan property wprt-image-video w50 pro">
                            <h5>Floor Plan</h5>
                            @foreach($data->floorplan as $fpRow)
                            <img class="mb-3" alt="floor plan" src="{{url('uploads/project/floor_plan/'.$fpRow->file)}}">
                            @endforeach
                        </div>
                        @endif

                        @if($data->video)
                        <div class="property wprt-image-video w50 pro">
                            <h5>Property Video</h5>
                            <iframe width="100%" height="400" src="{{$data->video}}" frameborder="0" allowfullscreen></iframe>
                        </div>
                        @endif

                        @if($data->map)
                        <div class="property-location map">
                            <h5>Location</h5>
                            {!!$data->map!!}
                        </div>
                        @endif

                    </div>
                    <aside class="col-lg-4 col-md-12 car">
                        <div class="single widget">

                            <!-- end author-verified-badge -->
                            <div class="sidebar">
                                <div class="widget-boxed mt-33">
                                    <div class="widget-boxed-header">
                                        <h4>Project Enquiry</h4>
                                    </div>
                                    <div class="agent-contact-form-sidebar">
                                        @if(Session::has('success'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            {{Session::get('success')}}
                                        </div>
                                        @endif
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong>Error!</strong> {{$error}}
                                            </div>
                                            @endforeach
                                        @endif
                                        <form action="{{route('enquiry')}}" class="contact-form" name="contactform" method="post">
                                            @csrf
                                            <input type="text" name="name" placeholder="Name" required />
                                            <input type="hidden" name="projectName" value="{{$data->title}}">
                                            <input type="number" name="phone" placeholder="Phone" required />
                                            <input type="email" name="email" placeholder="Email" required />
                                            <textarea placeholder="Message" name="message" required></textarea>
                                            <button type="submit" id="submit-contact" name="sendmessage" class="btn btn-primary w-100 multiple-send-message">Submit Request</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="main-search-field-2">
                                    <div class="widget-boxed mt-5">
                                        <div class="widget-boxed-header">
                                            <h4>Recent Projects</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="recent-post">
                                                @foreach($recent as $recentRow)
                                                <div class="recent-main mb-4">
                                                    <div class="recent-img">
                                                        <a href="{{route('project.details',$recentRow->url)}}"><img src="{{url('uploads/project/cover/'.$recentRow->cover_image)}}" alt="{{$recentRow->title}}"></a>
                                                    </div>
                                                    <div class="info-img">
                                                        <a href="{{route('project.details',$recentRow->url)}}"><h6>{{$recentRow->title}}</h6></a>
                                                        <p>₹ {{$recentRow->price}}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-boxed mt-5">
                                        <div class="widget-boxed-header mb-5">
                                            <h4>Luxury Projects</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="slick-lancers">
                                                @foreach($luxury as $luxuryRow)
                                                <div class="agents-grid mr-0">
                                                    <div class="listing-item compact">
                                                        <a href="{{route('project.details',$luxuryRow->url)}}" class="listing-img-container">
                                                            <div class="listing-badges">
                                                                <span class="featured"> {{$luxuryRow->price}}</span>
                                                                <span>{{ucfirst($luxuryRow->project_for)}}</span>
                                                            </div>
                                                            <div class="listing-img-content">
                                                                <span class="listing-compact-title">{{$luxuryRow->title}}</span>
                                                            </div>
                                                            <img src="{{url('uploads/project/cover/'.$luxuryRow->cover_image)}}" alt="{{$luxuryRow->title}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </aside>
                </div>

                <!-- START SIMILAR PROPERTIES -->
                <section class="similar-property featured portfolio p-0 bg-white-inner">
                    <div class="container p-0">
                        <h5>Some Featured Project</h5>
                        <div class="row portfolio-items">
                            @foreach($feature as $featureRow)
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <div class="agents-grid p-0" data-aos="fade-up" data-aos-delay="150">
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
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!-- END SIMILAR PROPERTIES -->

            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Project Enquiry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="agent-contact-form-sidebar">
                            @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{Session::get('success')}}
                            </div>
                            @endif
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Error!</strong> {{$error}}
                                </div>
                                @endforeach
                            @endif
                            <form action="{{route('enquiry')}}" class="contact-form" name="contactform" method="post">
                                @csrf
                                <input type="text" name="name" placeholder="Name" value="{{old('name')}}" required />
                                <input type="hidden" name="projectName" value="{{$data->title}}">
                                <input type="number" name="phone" placeholder="Phone" value="{{old('phone')}}" required />
                                <input type="email" name="email" placeholder="Email" value="{{old('email')}}" required />
                                <textarea placeholder="Message" name="message" required>{{old('phone')}}</textarea>
                                <button type="submit" id="submit-contact" name="sendmessage" class="btn btn-primary w-100 multiple-send-message">Submit Request</button>
                            </form>
                        </div>

                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div> -->
                </div>
            </div>
        </div>

        @include('frontend/layouts/footer')

        <!-- ARCHIVES JS -->
        <script src="{{url('assets/frontend')}}/js/jquery-3.5.1.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/jquery-ui.js"></script>
        <script src="{{url('assets/frontend')}}/js/range-slider.js"></script>
        <script src="{{url('assets/frontend')}}/js/tether.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/popper.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/bootstrap.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/mmenu.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/mmenu.js"></script>
        <script src="{{url('assets/frontend')}}/js/slick.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/slick4.js"></script>
        <script src="{{url('assets/frontend')}}/js/fitvids.js"></script>
        <script src="{{url('assets/frontend')}}/js/smooth-scroll.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/jquery.magnific-popup.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/popup.js"></script>
        <script src="{{url('assets/frontend')}}/js/ajaxchimp.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/newsletter.js"></script>
        <script src="{{url('assets/frontend')}}/js/timedropper.js"></script>
        <script src="{{url('assets/frontend')}}/js/datedropper.js"></script>
        <script src="{{url('assets/frontend')}}/js/jqueryadd-count.js"></script>
        <script src="{{url('assets/frontend')}}/js/leaflet.js"></script>
        <script src="{{url('assets/frontend')}}/js/leaflet-gesture-handling.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/leaflet-providers.js"></script>
        <script src="{{url('assets/frontend')}}/js/leaflet.markercluster.js"></script>
        <script src="{{url('assets/frontend')}}/js/map-single.js"></script>
        <script src="{{url('assets/frontend')}}/js/color-switcher.js"></script>
        <script src="{{url('assets/frontend')}}/js/inner.js"></script>

        <!-- Date Dropper Script-->
        <script>
            $('#reservation-date').dateDropper();

        </script>
        <!-- Time Dropper Script-->
        <script>
            this.$('#reservation-time').timeDropper({
                setCurrentTime: false,
                meridians: true,
                primaryColor: "#e8212a",
                borderColor: "#e8212a",
                minutesInterval: '15'
            });

        </script>

        <script>
            $(document).ready(function() {
                $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                    disableOn: 700,
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                });
            });

        </script>

        <script>
            $('.slick-carousel').each(function() {
                var slider = $(this);
                $(this).slick({
                    infinite: true,
                    dots: false,
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0'
                });

                $(this).closest('.slick-slider-area').find('.slick-prev').on("click", function() {
                    slider.slick('slickPrev');
                });
                $(this).closest('.slick-slider-area').find('.slick-next').on("click", function() {
                    slider.slick('slickNext');
                });
            });

        </script>

    </div>
    <!-- Wrapper / End -->
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

        $(document).ready(function() {
            setTimeout(function() {
                $('#myModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });

                setTimeout(function() {
                    $('.modal .close, .modal-footer .btn-secondary').show();
                }, 7000);
            }, 17000); // Delay of 5 seconds
        });

    </script>
</body>
</html>
