<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $blog->title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$blog->meta_description}}">
    <meta name="keywords" content="{{$blog->meta_keywords}}">
    <meta property="og:url" content="{{route('blog.details', $blog->slug) }}">
    <meta property="og:title" content="{{ $blog->meta_title }}">
    <meta property="og:description" content="{{$blog->meta_description}}">
    <meta name="twitter:title" content="{{ $blog->meta_title }}">
    <meta name="twitter:description" content="{{$blog->meta_description}}">

    <!-- Apple Touch Icon -->
    <link rel="shortcut icon" href="{{ url('uploads/setting/' . getSetting()->favicon) }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('uploads/setting/' . getSetting()->favicon) }}">

    <!-- Theme Settings Js -->
    <script src="{{ url('/') }}/assets/frontend/js/theme-script.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/frontend/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/frontend/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/frontend/plugins/fontawesome/css/all.min.css">

    <!-- Iconsax CSS-->
    <link rel="stylesheet" href="{{ url('/') }}/assets/frontend/css/iconsax.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/frontend/css/feather.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/frontend/css/bootstrap-datetimepicker.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/frontend/plugins/select2/css/select2.min.css">

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/frontend/plugins/fancybox/jquery.fancybox.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/frontend/css/custom.css">

    <style>
        @media (max-width: 767.98px) {
            .doctor-img1 img {
                width: 100% !important;
                max-height: none !important;
            }
        }
    </style>

    {!! getSetting()->head_content !!}
</head>
<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        @include('frontend.layouts.header')

        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home-15"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                                <li class="breadcrumb-item active">{{ $blog->meta_title }}</li>
                            </ol>
                            <h2 class="breadcrumb-title">{{ $blog->meta_title }}</h2>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-bg">
                <img src="{{ url('/') }}/assets/frontend/img/bg/breadcrumb-bg-01.png" alt="img" class="breadcrumb-bg-01">
                <img src="{{ url('/') }}/assets/frontend/img/bg/breadcrumb-bg-02.png" alt="img" class="breadcrumb-bg-02">
                <img src="{{ url('/') }}/assets/frontend/img/bg/breadcrumb-icon.png" alt="img" class="breadcrumb-bg-03">
                <img src="{{ url('/') }}/assets/frontend/img/bg/breadcrumb-icon.png" alt="img" class="breadcrumb-bg-04">
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <!-- Blog Widget -->
                        <div class="card">
                            <div class="card-body product-description">
                                <div class="doctor-widget">
                                    <div class="doc-info-left">
                                        <div class="doctor-img1">
                                            @if($blog->banner)
                                                <div style="height: 400px; display: flex; align-items: center; justify-content: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                                    <img src="{{ asset('uploads/blog/' . $blog->banner) }}" class="img-fluid" style="max-height: 400px; border-radius: 10px; object-fit: cover;" alt="{{ $blog->title }}">
                                                </div>
                                            @else
                                                <div style="height: 400px; display: flex; align-items: center; justify-content: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                                    <img src="{{ url('/') }}/assets/frontend/img/blog/blog.jpg" class="img-fluid" style="max-height: 400px; border-radius: 10px;" alt="No Image">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="doc-info-cont product-cont">
                                            <h4 class="doc-name mb-2">{{ $blog->title }}</h4>
                                            <div class="blog-meta mb-3">
                                                <span class="badge bg-primary">{{ $blog->blogCategory->title ?? 'Uncategorized' }}</span>
                                                <span class="text-muted ms-2">{{ $blog->created_at->format('M d, Y') }}</span>

                                                <div class="tab-content dynamic-description pt-3">
                                                    {!! $blog->short_description !!}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Blog Widget -->

                        <!-- Blog Details Tab -->
                        <div class="card">
                            <div class="card-body pt-0">
                                <h3 class="pt-4">Blog Details</h3>
                                <hr>
                                <div class="tab-content dynamic-description pt-3">
                                    {!! $blog->description !!}
                                </div>
                            </div>
                        </div>
                        <!-- /Blog Details Tab -->

                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Content -->

        @include('frontend.layouts.footer')

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ url('/') }}/assets/frontend/js/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ url('/') }}/assets/frontend/js/bootstrap.bundle.min.js"></script>

    <!-- Feathericon JS -->
    <script src="{{ url('/') }}/assets/frontend/js/feather.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ url('/') }}/assets/frontend/js/script.js"></script>

</body>
</html>