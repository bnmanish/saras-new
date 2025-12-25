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
					<div class="col-lg-6 col-md-12">
						<img src="{{url('uploads/page/'.$page->image)}}" class="img-fluid w-100" alt="about us">
					</div>
					<div class="col-lg-6 col-md-12">
						
						<div class="about-content text-justify">
							{!!$page->description!!}
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /About Us -->

		<!-- Why Choose Us -->
		<section class="why-choose-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-inner-header text-center">
							<h2>Why Choose Us</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 d-flex">
						<div class="card why-choose-card w-100">
							<div class="card-body">
								<div class="why-choose-icon">
									<span><img src="{{url('/')}}/assets/frontend/img/icons/choose-01.svg" alt="choose-image"></span>
								</div>
								<div class="why-choose-content">
									<h4>Experienced & Verified </h4>
									<p>We work with trained and verified experts who are committed to delivering reliable, high-quality services.</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex">
						<div class="card why-choose-card w-100">
							<div class="card-body">
								<div class="why-choose-icon">
									<span><img src="{{url('/')}}/assets/frontend/img/icons/choose-02.svg" alt="choose-image"></span>
								</div>
								<div class="why-choose-content">
									<h4>Support Available 24/7</h4>
									<p>Our team is available round the clock to assist you. Get support and guidance anytime, without delays or waiting.</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex">
						<div class="card why-choose-card w-100">
							<div class="card-body">
								<div class="why-choose-icon">
									<span><img src="{{url('/')}}/assets/frontend/img/icons/choose-03.svg" alt="choose-image"></span>
								</div>
								<div class="why-choose-content">
									<h4>Trusted Quality Standards</h4>
									<p>We follow strict quality standards to ensure every service meets professional benchmarks and delivers consistent results.</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex">
						<div class="card why-choose-card w-100">
							<div class="card-body">
								<div class="why-choose-icon">
									<span><img src="{{url('/')}}/assets/frontend/img/icons/choose-04.svg" alt="choose-image"></span>
								</div>
								<div class="why-choose-content">
									<h4>No Hidden Charges</h4>
									<p>We believe in transparency. Clear pricing, honest guidance, and no surprise costs at any stage of the service.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Why Choose Us -->

		<!-- Way Section -->
		<section class="way-section">
			<div class="container">
				<div class="way-bg">
					<div class="way-shapes-img">
						<div class="way-shapes-left">
							<img src="{{url('/')}}/assets/frontend/img/shape-06.png" alt="shape-image">
						</div>
						<div class="way-shapes-right">
							<img src="{{url('/')}}/assets/frontend/img/shape-07.png" alt="shape-image">
						</div>
					</div>
					<div class="row align-items-end">
						<div class="col-lg-7 col-md-12">
							<div class="section-inner-header way-inner-header mb-0">
								<h2>Feel Better, Faster with Care You Can Trust</h2>
								<p>We focus on understanding your needs and delivering reliable, accessible services that support your well-being at every step.</p>

								<a href="{{route('contact')}}" class="btn btn-primary">Contact With Us</a>
							</div>
						</div>
						<div class="col-lg-5 col-md-12">
							<div class="way-img">
								<img src="{{url('/')}}/assets/frontend/img/way-img.png" class="img-fluid" alt="doctor-way-image">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Way Choose Us -->


		<!-- FAQ Section -->
		<section class="faq-section faq-section-inner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-inner-header text-center">
							<h6>Need Help?</h6>
							<h2>Frequently Asked Questions</h2>
						</div>
					</div>
				</div>

				<div class="row align-items-center">
					<div class="col-lg-6 col-md-12">
						<div class="faq-img">
							<img src="{{url('/')}}/assets/frontend/img/frequently-asked-questions.jpg" class="img-fluid" alt="frequently-asked-questions">
							<div class="faq-patients-count">
								<div class="faq-smile-img">
									<img src="{{url('/')}}/assets/frontend/img/icons/smiling-icon.svg" alt="icon">
								</div>
								<div class="faq-patients-content">
									<h4><span class="count-digit">95</span>k+</h4>
									<p>Happy Customers</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-12">
						<div class="faq-info">
							<div class="accordion" id="accordionExample">

								<div class="accordion-item">
									<h2 class="accordion-header" id="headingOne">
										<a href="javascript:void(0)" class="accordion-button" data-bs-toggle="collapse"
										   data-bs-target="#collapseOne" aria-expanded="true"
										   aria-controls="collapseOne">
											How can I book a service or appointment?
										</a>
									</h2>
									<div id="collapseOne" class="accordion-collapse collapse show"
										 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<div class="accordion-content">
												<p>You can easily book through our website by selecting the service you need, choosing a time, and confirming your booking.</p>
											</div>
										</div>
									</div>
								</div>

								<div class="accordion-item">
									<h2 class="accordion-header" id="headingTwo">
										<a href="javascript:void(0)" class="accordion-button collapsed" data-bs-toggle="collapse"
										   data-bs-target="#collapseTwo" aria-expanded="false"
										   aria-controls="collapseTwo">
											Is booking available 24/7?
										</a>
									</h2>
									<div id="collapseTwo" class="accordion-collapse collapse"
										 aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<div class="accordion-content">
												<p>Yes, our booking system is available at all times, so you can place a booking whenever it suits you.</p>
											</div>
										</div>
									</div>
								</div>

								<div class="accordion-item">
									<h2 class="accordion-header" id="headingThree">
										<a href="javascript:void(0)" class="accordion-button collapsed" data-bs-toggle="collapse"
										   data-bs-target="#collapseThree" aria-expanded="false"
										   aria-controls="collapseThree">
											Is my personal information safe?
										</a>
									</h2>
									<div id="collapseThree" class="accordion-collapse collapse"
										 aria-labelledby="headingThree" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<div class="accordion-content">
												<p>Yes, we follow strict privacy and security practices to keep your personal information safe and confidential.</p>
											</div>
										</div>
									</div>
								</div>

								<div class="accordion-item">
									<h2 class="accordion-header" id="headingFour">
										<a href="javascript:void(0)" class="accordion-button collapsed" data-bs-toggle="collapse"
										   data-bs-target="#collapseFour" aria-expanded="false"
										   aria-controls="collapseFour">
											Can I cancel or reschedule my booking?
										</a>
									</h2>
									<div id="collapseFour" class="accordion-collapse collapse"
										 aria-labelledby="headingFour" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<div class="accordion-content">
												<p>Yes, you can cancel or reschedule your booking easily by contacting our support team.</p>
											</div>
										</div>
									</div>
								</div>

								<div class="accordion-item">
									<h2 class="accordion-header" id="headingFive">
										<a href="javascript:void(0)" class="accordion-button collapsed" data-bs-toggle="collapse"
										   data-bs-target="#collapseFive" aria-expanded="false"
										   aria-controls="collapseFive">
											How do I choose the right service?
										</a>
									</h2>
									<div id="collapseFive" class="accordion-collapse collapse"
										 aria-labelledby="headingFive" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<div class="accordion-content">
												<p>You can explore service details on our website and choose the option that best fits your needs.</p>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- /FAQ Section -->

		@include('frontend.layouts.footer')

		<!-- Cursor -->
		<div class="mouse-cursor cursor-outer"></div>
		<div class="mouse-cursor cursor-inner"></div>
		<!-- /Cursor -->

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
	@if(!empty($page->scripts))
	<script>
		{!! $page->scripts !!}
	</script>
	@endif

</body>

</html>