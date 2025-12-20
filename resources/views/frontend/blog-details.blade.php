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
        
        @media (max-width: 768px) {
            .blog-title {
                font-size: 1.75rem !important;
            }
            
            .blog-hero-image img {
                height: 300px !important;
            }
            
            .blog-meta {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 0.5rem !important;
            }
            
            .blog-meta > div {
                width: 100%;
                justify-content: center;
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
                                                 style="height: 400px; object-fit: cover;">
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
                                                    <span>{{ $blog->created_at->format('F j, Y') }}</span>
                                                </div>
                                                
                                                <div class="blog-updated-date d-flex align-items-center">
                                                    <i class="fas fa-sync-alt me-2"></i>
                                                    <span>Updated {{ $blog->updated_at->format('M j, Y') }}</span>
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
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Latest Blogs</h5>
                            </div>
                            <div class="card-body">
                                @if($blogs->count() > 0)
                                    @foreach($blogs as $latestBlog)
                                        <div class="blog-item mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                            <div class="d-flex">
                                                <div class="blog-img flex-shrink-0">
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
                                                <div class="blog-info ms-3">
                                                    <h6 class="mb-1">
                                                        <a href="{{ route('blog.details', $latestBlog->slug) }}" 
                                                           class="text-decoration-none text-dark">
                                                            {{ Str::limit($latestBlog->title, 50) }}
                                                        </a>
                                                    </h6>
                                                    <small class="text-muted">
                                                        <i class="far fa-calendar"></i> {{ $latestBlog->created_at->format('M d, Y') }}
                                                    </small>
                                                    <div class="mt-1">
                                                        <span class="badge bg-light text-dark">
                                                            {{ $latestBlog->blogCategory->title ?? 'Uncategorized' }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted">No latest blogs found.</p>
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