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
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/animate.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/lightcase.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/menu.css">
    <link rel="stylesheet" href="{{url('assets/frontend')}}/css/styles.css">
    <link rel="stylesheet" id="color" href="{{url('assets/frontend')}}/css/default.css">
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

        <!-- START SECTION BLOG -->
        <section class="blog-section">
            <div class="container">
                <div class="news-wrap">
                    <div class="row">
                        @foreach($blogs as $blogsRow)
                        <div class="col-lg-4 col-md-12 col-xs-12">
                            <div class="news-item">
                                <a href="{{route('blog.details',$blogsRow->slug)}}" class="news-img-link">
                                    <div class="news-item-img">
                                        <img class="img-responsive" src="{{url('uploads/blog/'.$blogsRow->banner)}}" alt="{{$blogsRow->title}}">
                                    </div>
                                </a>
                                <div class="news-item-text">
                                    <a href="{{route('blog.details',$blogsRow->slug)}}"><h3>{{$blogsRow->title}}</h3></a>
                                    <div class="dates">
                                        <ul class="action-list pl-0">
                                            <li class="action-item pl-2"><i class="fa fa-calendar"></i> &nbsp;&nbsp;<span>{{date('d F, Y',strtotime($blogsRow->created_at))}}</span></li>
                                        </ul>
                                    </div>
                                    <div class="news-item-bottom">
                                        <a href="{{route('blog.details',$blogsRow->slug)}}" class="news-link">Read more...</a>
                                        <div class="admin">
                                            <p>By, {{$blogsRow->user->name}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
                
                {{$blogs->links('pagination.custom')}}

            </div>
        </section>
        <!-- END SECTION BLOG -->

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
