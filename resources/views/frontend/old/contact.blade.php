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

<body class="inner-pages hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        @include('frontend/layouts/header')
        
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <section class="headings" style="background:none;background-color: #006A94;">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>{{$page->title}}</h1>
                    <h2><a href="{{route('home')}}">Home </a> &nbsp;/&nbsp; {{$page->title}}</h2>
                </div>
            </div>
        </section>
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION CONTACT US -->
        <section class="contact-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <h3 class="mb-4">Contact Us</h3>
                        <form action="{{route('enquiry')}}" class="contact-form" name="contactform" method="post">
                            @csrf
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

                            <div class="form-group">
                                <input type="text" class="form-control input-custom input-full" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-custom input-full" name="phone" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-custom input-full" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control textarea-custom input-full" id="ccomment" name="message" rows="8" placeholder="Type your message"></textarea>
                            </div>
                            <button type="submit" id="submit-contact" class="btn btn-primary btn-lg">Submit</button>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-12 bgc">
                        <div class="call-info">
                            <h3>Contact Details</h3>
                            <p class="mb-5">Please find below contact details and contact us for more details!</p>
                            <ul>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p class="in-p">{!!@getSetting()->primary_address!!}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <p class="in-p">{{@getSetting()->primary_contact}}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <p class="in-p ti">{{@getSetting()->primary_email}}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info cll">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <p class="in-p ti">10.00AM - 7:00PM (Monday - Friday)</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="property-location mt-5">
                    <h3>Our Location</h3>
                    <div class="divider-fade"></div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6037.747883703462!2d77.28565139755153!3d28.539365989424063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa3e582e944e01b51%3A0xd279345f55d5b559!2sRiver%20Edge%20Realtors%20PVT%20LTD!5e0!3m2!1sen!2sin!4v1717352967925!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
        <!-- END SECTION CONTACT US -->

        <!-- START FOOTER -->
        @include('frontend/layouts/footer')
        <!-- END FOOTER -->

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
