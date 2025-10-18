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
<body class="inner-pages homepage-4 agents hp-6 full hd-white">
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
        <section class="properties-list featured portfolio blog">
            <div class="container">
                <div class="row">
                    @foreach($projects as $projectRow)
                    <div class="col-lg-4 col-sm-6">
                    <div class="agents-grid p-0 mb-4" data-aos="fade-up" data-aos-delay="150">
                        <div class="landscapes">
                            <div class="project-single">
                                <div class="project-inner project-head">
                                    <div class="homes">
                                        <!-- homes img -->
                                        <a href="{{route('project.details',$projectRow->url)}}" class="homes-img">
                                            <div class="homes-tag button alt featured">{{ucfirst($projectRow->section)}}</div>
                                            @if($projectRow->is_rera_approved == '1')
                                            <div class="homes-tag button rera-section">RERA Approved</div>
                                            @endif
                                            <div class="homes-tag button alt sale">{{ucfirst($projectRow->project_for)}}</div>
                                            <img src="{{url('uploads/project/cover/'.$projectRow->cover_image)}}" alt="{{$projectRow->title}}" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="button-effect">
                                        <a href="{{route('project.details',$projectRow->url)}}" class="btn"><i class="fa fa-link"></i></a>
                                        @if($projectRow->video != NULL)
                                        <a target="_blank" href="{{$projectRow->video}}" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <!-- homes content -->
                                <div class="homes-content">
                                    <!-- homes address -->
                                    <h3><a href="{{route('project.details',$projectRow->url)}}">{{$projectRow->title}}</a></h3>
                                    <p class="homes-address m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/></svg>&nbsp;
                                        <span class="brand-name">{{$projectRow->brand->title}}</span>
                                    </p>

                                    <p class="homes-address m-0">
                                        <i class="fa fa-map-marker"></i> &nbsp;<span>{{$projectRow->address}}</span>
                                    </p>

                                    <p class="homes-address mb-3">
                                        <i class="fa fa-building"></i>&nbsp;
                                        <span>{{$projectRow->type->title}}</span>
                                    </p>
                                    <div class="price-properties footer pt-3 pb-0">
                                        <h3 class="title mt-3">
                                            <a href="{{route('project.details',$projectRow->url)}}"> {{$projectRow->price}}</a>
                                        </h3>
                                        <div class="compare">
                                            <a href="{{route('project.details',$projectRow->url)}}" title="Compare">
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
                
                {{$projects->links('pagination.custom')}}

            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->

        @include('frontend/layouts/footer')

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
        <script src="{{url('assets/frontend')}}/js/inner.js"></script>

        <script>
            $(".dropdown-filter").on('click', function() {

                $(".explore__form-checkbox-list").toggleClass("filter-block");

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
    </script>
</body>
</html>
