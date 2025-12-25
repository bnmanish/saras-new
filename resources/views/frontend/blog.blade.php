<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $page->meta_title ?? 'Blog' }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $page->meta_description ?? 'Read our latest blog posts' }}">
    <meta name="keywords" content="{{ $page->meta_keywords ?? 'blog, news, articles' }}">
    <meta property="og:url" content="{{ route('blog') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $page->meta_title ?? 'Blog' }}">
    <meta property="og:description" content="{{ $page->meta_description ?? 'Read our latest blog posts' }}">
    <meta name="twitter:title" content="{{ $page->meta_title ?? 'Blog' }}">
    <meta name="twitter:description" content="{{ $page->meta_description ?? 'Read our latest blog posts' }}">

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
                                <li class="breadcrumb-item active">{{ $page->meta_title ?? 'Blog' }}</li>
                            </ol>
                            <h2 class="breadcrumb-title">{{ $page->meta_title ?? 'Blog' }}</h2>
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
                    @forelse($blogs as $blog)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                @if($blog->banner)
                                    <img src="{{ asset('uploads/blog/' . $blog->banner) }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="{{ url('/') }}/assets/frontend/img/blog/blog.jpg" class="card-img-top" alt="No Image" style="height: 200px; object-fit: cover;">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">
                                        <a href="{{ route('blog.details', $blog->slug) }}" class="text-decoration-none">{{ $blog->title }}</a>
                                    </h5>
                                    <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($blog->description), 100) }}</p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <small class="text-muted">{{ $blog->created_at->format('M d, Y') }}</small>
                                        <a href="{{ route('blog.details', $blog->slug) }}" class="btn btn-primary btn-sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="text-center py-5">
                                <h5>No blogs found</h5>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            {{ $blogs->links() }}
                        </div>
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