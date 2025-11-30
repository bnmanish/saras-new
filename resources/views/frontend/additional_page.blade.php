<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{$page->meta_title}}</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="{{$page->meta_description}}">
		<meta name="keywords" content="{{$page->meta_keywords}}">
		<meta name="author" content="Practo Clone HTML Template - Doctor Booking Template">
		<meta property="og:url" content="{{route('about.us')}}">
		<meta property="og:type" content="website">
		<meta property="og:title" content="{{$page->meta_title}}">
		<meta property="og:description" content="{{$page->meta_description}}">
		<meta property="og:image" content="{{url('/')}}/assets/frontend/img/preview-banner.jpg">
		<meta name="twitter:title" content="{{$page->meta_title}}">
		<meta name="twitter:description" content="{{$page->meta_description}}">
		<!-- Apple Touch Icon -->
		<link rel="shortcut icon" href="{{url('uploads/setting/'.getSetting()->favicon)}}" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="180x180" href="{{url('uploads/setting/'.getSetting()->favicon)}}">
		<!-- Theme Settings Js -->
		<script src="{{url('/')}}/assets/frontend/js/theme-script.js"></script>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/plugins/fontawesome/css/all.min.css">

		<!-- Iconsax CSS-->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/iconsax.css">

		<!-- Feathericon CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/feather.css">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/custom.css">
		{!!getSetting()->head_content!!}
		
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
								<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="isax isax-home-15"></i></a></li>
								<li class="breadcrumb-item active">{{$page->title}}</li>
							</ol>
							<h2 class="breadcrumb-title">{{$page->title}}</h2>
						</nav>
					</div>
				</div>
			</div>
			<div class="breadcrumb-bg">
				<img src="{{url('/')}}/assets/frontend/img/bg/breadcrumb-bg-01.png" alt="img" class="breadcrumb-bg-01">
				<img src="{{url('/')}}/assets/frontend/img/bg/breadcrumb-bg-02.png" alt="img" class="breadcrumb-bg-02">
				<img src="{{url('/')}}/assets/frontend/img/bg/breadcrumb-icon.png" alt="img" class="breadcrumb-bg-03">
				<img src="{{url('/')}}/assets/frontend/img/bg/breadcrumb-icon.png" alt="img" class="breadcrumb-bg-04">
			</div>
		</div>
		<!-- /Breadcrumb -->

		<!-- About Us -->
		<section class="about-section">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-12">
						<div class="about-content dynamic-description text-justify">
							{!!$page->description!!}
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /About Us -->

		@include('frontend.layouts.footer')

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="{{url('/')}}/assets/frontend/js/jquery-3.7.1.min.js"></script>

	<!-- Bootstrap Bundle JS -->
	<script src="{{url('/')}}/assets/frontend/js/bootstrap.bundle.min.js"></script>

	<!-- Feather Icon JS -->
	<script src="{{url('/')}}/assets/frontend/js/feather.min.js"></script>

	<!-- Slick JS -->
	<script src="{{url('/')}}/assets/frontend/js/slick.js"></script>

	<!-- Counter JS -->
	<script src="{{url('/')}}/assets/frontend/js/counter.js"></script>

	<!-- Custom JS -->
	<script src="{{url('/')}}/assets/frontend/js/script.js"></script>

</body>

</html>