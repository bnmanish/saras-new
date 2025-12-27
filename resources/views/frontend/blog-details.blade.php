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
        
        .blog-item {
            transition: transform 0.2s ease-in-out;
        }
        
        .blog-item:hover {
            transform: translateY(-2px);
        }
        
        .blog-item a:hover {
            color: #007bff !important;
        }
        
        .blog-info h6 {
            font-size: 0.9rem;
            line-height: 1.3;
        }
        
        @media (max-width: 991.98px) {
            .blog-item .blog-img {
                margin-bottom: 0.5rem;
            }
            
            .blog-item {
                text-align: center;
            }
            
            .blog-item .d-flex {
                flex-direction: column;
                align-items: center;
            }
            
            .blog-item .blog-info {
                margin-left: 0 !important;
                margin-top: 0.5rem;
            }
        }
        
        /* Creative Blog Header Styles */
        .blog-hero-header {
            position: relative;
            overflow: hidden;
        }
        
        .blog-hero-image img {
            transition: transform 0.6s ease;
        }
        
        .blog-hero-header:hover .blog-hero-image img {
            transform: scale(1.05);
        }
        
        .blog-hero-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.6) 100%);
            z-index: 1;
        }
        
        .blog-hero-header .position-absolute {
            z-index: 2;
        }
        
        .blog-category-badge .badge {
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .blog-category-badge .badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }
        
        .blog-title {
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            line-height: 1.2;
            margin-bottom: 1rem;
            animation: fadeInUp 0.8s ease;
        }
        
        .blog-meta {
            font-size: 0.9rem;
            opacity: 0.95;
        }
        
        .blog-meta > div {
            background: rgba(255,255,255,0.1);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s ease;
        }
        
        .blog-meta > div:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }
        
        .blog-meta i {
            font-size: 0.875rem;
            opacity: 0.8;
        }
        
        .blog-intro {
            border-left: 4px solid #007bff;
            padding-left: 1.5rem;
            margin: 2rem 0;
        }
        
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .bg-gradient-dark {
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0.1) 100%);
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Latest Blogs Creative Styles */
        .latest-blogs-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .latest-blogs-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .latest-blogs-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }
        
        .latest-blogs-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .latest-blogs-header h5 {
            margin: 0;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            position: relative;
            z-index: 1;
        }
        
        .blog-item-creative {
            background: white;
            border-radius: 15px;
            padding: 1rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        
        .blog-item-creative::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(103, 126, 234, 0.1), transparent);
            transition: left 0.5s ease;
        }
        
        .blog-item-creative:hover::before {
            left: 100%;
        }
        
        .blog-item-creative:hover {
            transform: translateX(5px);
            border-color: #667eea;
            box-shadow: 0 5px 20px rgba(103, 126, 234, 0.2);
        }
        
        .blog-item-creative:last-child {
            margin-bottom: 0;
        }
        
        .blog-img-creative {
            border-radius: 12px;
            overflow: hidden;
            position: relative;
        }
        
        .blog-img-creative img {
            transition: transform 0.3s ease;
        }
        
        .blog-item-creative:hover .blog-img-creative img {
            transform: scale(1.1);
        }
        
        .blog-info-creative h6 {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            line-height: 1.4;
            transition: color 0.3s ease;
        }
        
        .blog-info-creative h6:hover {
            color: #667eea;
        }
        
        .blog-meta-creative {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }
        
        .blog-meta-creative small {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
            color: #6c757d;
        }
        
        .badge-creative {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        @media (max-width: 768px) {
            .blog-title {
                font-size: 1.5rem !important;
            }
            
            .blog-hero-image img {
                height: 250px !important;
                object-fit: cover !important;
            }
            
            .blog-meta {
                font-size: 0.6rem !important;
                gap: 0.25rem !important;
                justify-content: flex-start !important;
                flex-wrap: nowrap !important;
                overflow: visible !important;
                padding: 0.1rem !important;
            }
            
            .blog-meta > div {
                padding: 0.1rem 0.3rem !important;
                white-space: nowrap !important;
                flex-shrink: 0 !important;
                background: rgba(255,255,255,0.05) !important;
                border-radius: 12px !important;
                min-width: 0 !important;
            }
            
            .blog-meta i {
                font-size: 0.5rem !important;
                margin-right: 0.15rem !important;
                width: 0.5rem !important;
                display: inline-block !important;
            }
            
            .blog-meta span {
                font-size: 0.55rem !important;
                line-height: 1 !important;
            }
        }
        
        @media (max-width: 480px) {
            .blog-meta {
                font-size: 0.5rem !important;
                gap: 0.15rem !important;
                padding: 0.05rem !important;
            }
            
            .blog-meta > div {
                padding: 0.05rem 0.2rem !important;
                border-radius: 8px !important;
            }
            
            .blog-meta i {
                font-size: 0.45rem !important;
                margin-right: 0.1rem !important;
                width: 0.45rem !important;
            }
            
            .blog-meta span {
                font-size: 0.45rem !important;
            }
        }
        
        @media (max-width: 360px) {
            .breadcrumb-bar {
                min-height: 160px !important;
                padding: 1rem 0 !important;
            }
            
            .breadcrumb-title {
                font-size: 1.1rem !important;
            }
            
            .blog-meta {
                font-size: 0.45rem !important;
                gap: 0.1rem !important;
        }
        
        @media (max-width: 480px) {
            .latest-blogs-card {
                margin-top: 1.5rem;
            }
            
            .blog-item-creative {
                display: flex;
                flex-direction: column;
                text-align: center;
                align-items: center;
                gap: 0.5rem;
            }
            
            .blog-img-creative {
                margin-bottom: 0.5rem;
            }
            
            .blog-img-creative img {
                width: 100px !important;
                height: 70px !important;
            }
            
            .blog-info-creative {
                width: 100%;
            }
            
            .blog-meta-creative {
                justify-content: center;
            }
        }
        
        @media (max-width: 768px) {
            .latest-blogs-card {
                margin-top: 2rem;
            }
            
            .blog-item-creative:hover {
                transform: translateY(-3px);
            }
        }
            
            .blog-meta > div {
                padding: 0.05rem 0.15rem !important;
            }
            
            .blog-meta i {
                font-size: 0.4rem !important;
                margin-right: 0.08rem !important;
            }
            
            .blog-meta span {
                font-size: 0.4rem !important;
            }
            
            /* Mobile Latest Blogs Styles */
            .latest-blogs-card {
                border-radius: 15px;
                margin-top: 1rem;
            }
            
            .latest-blogs-header {
                padding: 1rem;
                text-align: center;
            }
            
            .latest-blogs-header h5 {
                font-size: 1.1rem;
            }
            
            .blog-item-creative {
                padding: 0.75rem;
                margin-bottom: 0.75rem;
                border-radius: 12px;
            }
            
            .blog-img-creative img {
                width: 60px !important;
                height: 45px !important;
            }
            
            .blog-info-creative h6 {
                font-size: 0.85rem;
                line-height: 1.3;
            }
            
            .blog-meta-creative small {
                font-size: 0.65rem;
                padding: 0.2rem 0.5rem;
            }
            
            .badge-creative {
                font-size: 0.6rem;
                padding: 0.2rem 0.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .latest-blogs-card {
                margin-top: 1.5rem;
            }
            
            .blog-item-creative {
                display: flex;
                flex-direction: column;
                text-align: center;
                align-items: center;
                gap: 0.5rem;
            }
            
            .blog-img-creative {
                margin-bottom: 0.5rem;
            }
            
            .blog-img-creative img {
                width: 100px !important;
                height: 70px !important;
            }
            
            .blog-info-creative {
                width: 100%;
            }
            
            .blog-meta-creative {
                justify-content: center;
            }
        }
        
        @media (max-width: 768px) {
            .latest-blogs-card {
                margin-top: 2rem;
            }
            
            .blog-item-creative:hover {
                transform: translateY(-3px);
            }
        }
        
        @media (max-width: 480px) {
            .latest-blogs-card {
                margin-top: 1.5rem;
            }
            
            .blog-item-creative {
                display: flex;
                flex-direction: column;
                text-align: center;
                align-items: center;
                gap: 0.5rem;
            }
            
            .blog-img-creative {
                margin-bottom: 0.5rem;
            }
            
            .blog-img-creative img {
                width: 100px !important;
                height: 70px !important;
            }
            
            .blog-info-creative {
                width: 100%;
            }
            
            .blog-meta-creative {
                justify-content: center;
            }
        }
        
        @media (max-width: 768px) {
            .latest-blogs-card {
                margin-top: 2rem;
            }
            
            .blog-item-creative:hover {
                transform: translateY(-3px);
            }
        }
        
        @media (max-width: 360px) {
            .latest-blogs-card {
                border-radius: 15px;
                margin-top: 1rem;
            }
            
            .latest-blogs-header {
                padding: 1rem;
                text-align: center;
            }
            
            .latest-blogs-header h5 {
                font-size: 1.1rem;
            }
            
            .blog-item-creative {
                padding: 0.75rem;
                margin-bottom: 0.75rem;
                border-radius: 12px;
            }
            
            .blog-img-creative img {
                width: 60px !important;
                height: 45px !important;
            }
            
            .blog-info-creative h6 {
                font-size: 0.85rem;
                line-height: 1.3;
            }
            
            .blog-meta-creative small {
                font-size: 0.65rem;
                padding: 0.2rem 0.5rem;
            }
            
            .badge-creative {
                font-size: 0.6rem;
                padding: 0.2rem 0.5rem;
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
                    <div class="col-lg-8 col-md-12">
                        <!-- Blog Widget -->
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-0">
                                <!-- Creative Blog Header -->
                                <div class="blog-hero-header position-relative overflow-hidden rounded-top">
                                    <div class="blog-hero-image">
                                        @if($blog->banner)
                                            <img src="{{ asset('uploads/blog/' . $blog->banner) }}" 
                                                 class="w-100" 
                                                 alt="{{ $blog->title }}"
                                                 style="height: 400px; object-fit: cover; object-position: center;">
                                        @else
                                            <div class="w-100 d-flex align-items-center justify-content-center bg-gradient-primary" 
                                                 style="height: 400px;">
                                                <i class="fas fa-blog text-white" style="font-size: 4rem; opacity: 0.5;"></i>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!-- Overlay with Title and Meta -->
                                    <div class="position-absolute bottom-0 start-0 end-0 bg-gradient-dark text-white p-4">
                                        <div class="container">
                                            <div class="blog-category-badge mb-3">
                                                <span class="badge bg-white text-primary fw-bold">
                                                    <i class="fas fa-tag me-1"></i>
                                                    {{ $blog->blogCategory->title ?? 'Uncategorized' }}
                                                </span>
                                            </div>
                                            
                                            <h1 class="blog-title display-5 fw-bold mb-3 text-white">
                                                {{ $blog->title }}
                                            </h1>
                                            
                                            <div class="blog-meta d-flex align-items-center flex-wrap gap-3">
                                                <div class="blog-date d-flex align-items-center">
                                                    <i class="far fa-calendar-alt me-2"></i>
                                                    <span>{{ $blog->created_at->format('M j, Y') }}</span>
                                                </div>
                                                
                                                <div class="blog-updated-date d-flex align-items-center">
                                                    <i class="fas fa-sync-alt me-2"></i>
                                                    <span>{{ $blog->updated_at->format('M j, Y') }}</span>
                                                </div>
                                                
                                                @if($blog->user)
                                                <div class="blog-author d-flex align-items-center">
                                                    <i class="far fa-user me-2"></i>
                                                    <span>{{ $blog->user->name }}</span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Blog Content -->
                                <div class="p-4">
                                    <div class="blog-intro mb-4">
                                        <div class="lead text-muted fst-italic">
                                            {!! $blog->short_description !!}
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
                                        <!-- Latest Blogs Sidebar -->
                    <div class="col-lg-4 col-md-12">
                        <div class="latest-blogs-card">
                            <div class="latest-blogs-header">
                                <h5 class="mb-0">
                                    <i class="fas fa-blog me-2"></i>Latest Blogs
                                </h5>
                            </div>
                            <div class="card-body p-3">
                                @if($blogs->count() > 0)
                                    @foreach($blogs as $latestBlog)
                                        <div class="blog-item-creative">
                                            <div class="d-flex align-items-center">
                                                <div class="blog-img-creative flex-shrink-0">
                                                    @if($latestBlog->banner)
                                                        <img src="{{ asset('uploads/blog/' . $latestBlog->banner) }}" 
                                                             alt="{{ $latestBlog->title }}" 
                                                             class="img-fluid rounded" 
                                                             style="width: 80px; height: 60px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ url('/') }}/assets/frontend/img/blog/blog.jpg" 
                                                             alt="{{ $latestBlog->title }}" 
                                                             class="img-fluid rounded" 
                                                             style="width: 80px; height: 60px; object-fit: cover;">
                                                    @endif
                                                </div>
                                                <div class="blog-info-creative ms-3 flex-grow-1">
                                                    <h6 class="mb-2">
                                                        <a href="{{ route('blog.details', $latestBlog->slug) }}" 
                                                           class="text-decoration-none">
                                                            {{ Str::limit($latestBlog->title, 45) }}
                                                        </a>
                                                    </h6>
                                                    <div class="blog-meta-creative">
                                                        <small>
                                                            <i class="far fa-calendar me-1"></i>{{ $latestBlog->created_at->format('M d, Y') }}
                                                        </small>
                                                        <span class="badge-creative">
                                                            {{ $latestBlog->blogCategory->title ?? 'Uncategorized' }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center py-4">
                                        <i class="fas fa-blog text-muted mb-2" style="font-size: 2rem;"></i>
                                        <p class="text-muted">No latest blogs found.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /Latest Blogs Sidebar -->
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