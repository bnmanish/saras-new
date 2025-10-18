<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Error</title>
    <meta name="keywords" content="Error">
    <meta name="description" content="Error">
    <meta property="og:title" content="Error">
    <meta property="og:description" content="Error">
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
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION 404 -->
        <section class="notfound pt-0">
            <div class="container">               
                <div class="top-headings text-center">
                    <img class="mt-5 pt-5" src="{{url('assets/frontend/images/bg/error-404.jpg')}}" alt="Page 404">
                    <h3 class="text-center">Page Not Found!</h3>
                    <p class="text-center">Oops! Looks Like Something Going Rong We can’t seem to find the page you’re looking for make sure that you have typed the currect URL</p>
                </div>
                <div class="port-info">
                    <a href="{{route('home')}}" class="btn btn-lg">Go To Home</a>
                </div>
            </div>
        </section>
        <!-- END SECTION 404 -->

        @include('frontend/layouts/footer')

        <!-- ARCHIVES JS -->
        <script src="{{url('assets/frontend')}}/js/jquery-3.5.1.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/tether.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/popper.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/bootstrap.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/mmenu.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/mmenu.js"></script>
        <script src="{{url('assets/frontend')}}/js/smooth-scroll.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/jquery.magnific-popup.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/popup.js"></script>
        <script src="{{url('assets/frontend')}}/js/jquery.waypoints.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/jquery.counterup.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/counterup.js"></script>
        <script src="{{url('assets/frontend')}}/js/owl.carousel.js"></script>
        <script src="{{url('assets/frontend')}}/js/ajaxchimp.min.js"></script>
        <script src="{{url('assets/frontend')}}/js/newsletter.js"></script>
        <script src="{{url('assets/frontend')}}/js/color-switcher.js"></script>
        <script src="{{url('assets/frontend')}}/js/inner.js"></script>
        <script src="{{url('assets/frontend')}}/js/custom.js"></script>

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
