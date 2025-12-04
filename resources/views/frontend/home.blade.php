<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
		<meta name="keywords" content="practo clone, doccure, doctor appointment, Practo clone html template, doctor booking template">
		<meta name="author" content="Practo Clone HTML Template - Doctor Booking Template">
		<meta property="og:url" content="https://doccure.dreamstechnologies.com/html/">
		<meta property="og:type" content="website">
		<meta property="og:title" content="Doctors Appointment HTML Website Templates | Doccure">
		<meta property="og:description" content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
		<meta property="og:image" content="{{url('/')}}/assets/frontend/img/preview-banner.jpg">
		<meta name="twitter:card" content="summary_large_image">
		<meta property="twitter:domain" content="https://doccure.dreamstechnologies.com/html/">
		<meta property="twitter:url" content="https://doccure.dreamstechnologies.com/html/">
		<meta name="twitter:title" content="Doctors Appointment HTML Website Templates | Doccure">
		<meta name="twitter:description" content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
		<meta name="twitter:image" content="{{url('/')}}/assets/frontend/img/preview-banner.jpg">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Doccure</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{url('/')}}/assets/frontend/img/favicon.png" type="image/x-icon">

		<!-- Apple Touch Icon -->
		<link rel="apple-touch-icon" sizes="180x180" href="{{url('/')}}/assets/frontend/img/apple-touch-icon.png">

		<!-- Theme Settings Js -->
		<script src="{{url('/')}}/assets/frontend/js/theme-script.js"></script>
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/bootstrap.min.css">

		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/animate.css">
				
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/plugins/fontawesome/css/all.min.css">

		<!-- Iconsax CSS-->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/iconsax.css">

		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/feather.css">

    	<!-- Datepicker CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/bootstrap-datetimepicker.min.css">

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/owl.carousel.min.css">

		<!-- Animation CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/aos.css">

		<!-- select CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/plugins/select2/css/select2.min.css">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/custom.css">
<style>
			.owl-dots{
				display: none;
			}
			
/* About Us Styles */
		.about-section {
			padding: 60px 0;
			background: aliceblue;
			position: relative;
			overflow: hidden;
		}
		
		.about-section::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.03)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.03)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.02)"/><circle cx="10" cy="50" r="0.5" fill="rgba(255,255,255,0.02)"/><circle cx="90" cy="50" r="0.5" fill="rgba(255,255,255,0.02)"/><circle cx="50" cy="90" r="0.5" fill="rgba(255,255,255,0.02)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
			opacity: 0.1;
		}
		
		.about-content-wrapper {
			position: relative;
			z-index: 1;
		}
		
		.about-card {
			background: rgba(255, 255, 255, 0.95);
			backdrop-filter: blur(10px);
			border-radius: 20px;
			padding: 40px;
			box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
			border: 1px solid rgba(255, 255, 255, 0.2);
			transition: transform 0.3s ease, box-shadow 0.3s ease;
		}
		
		.about-card:hover {
			transform: translateY(-5px);
			box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
		}
		
		.about-section .section-header h2 {
			margin-bottom: 30px;
		}
		
		.about-section .section-header .badge {
			background: rgba(255, 255, 255, 0.2);
			color: white;
			border: 1px solid rgba(255, 255, 255, 0.3);
		}
		
		.about-features {
			display: flex;
			justify-content: space-around;
			margin-top: 30px;
			flex-wrap: wrap;
			gap: 20px;
		}
		
		.about-feature {
			text-align: center;
			flex: 1;
			min-width: 150px;
		}
		
		.about-feature-icon {
			width: 60px;
			height: 60px;
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			margin: 0 auto 15px;
			color: white;
			font-size: 24px;
			box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
		}
		
		.about-feature h6 {
			color: #333;
			font-weight: 600;
			margin-bottom: 5px;
		}
		
		.about-feature p {
			color: #666;
			font-size: 14px;
			margin: 0;
		}
		
		/* Gallery Styles */
		.gallery-section {
			padding: 80px 0;
			background: #f8f9fa;
		}
			
			.gallery-item {
				position: relative;
				overflow: hidden;
				border-radius: 12px;
				box-shadow: 0 4px 15px rgba(0,0,0,0.1);
				transition: transform 0.3s ease, box-shadow 0.3s ease;
			}
			
			.gallery-item:hover {
				transform: translateY(-5px);
				box-shadow: 0 8px 25px rgba(0,0,0,0.15);
			}
			
			.gallery-img-container {
				position: relative;
				width: 100%;
				height: 250px;
				overflow: hidden;
			}
			
			.gallery-image {
				width: 100%;
				height: 100%;
				object-fit: cover;
				transition: transform 0.3s ease;
				cursor: pointer;
			}
			
			.gallery-image:hover {
				transform: scale(1.05);
			}
			
			.gallery-overlay {
				position: absolute;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				background: rgba(0,0,0,0.5);
				display: flex;
				align-items: center;
				justify-content: center;
				opacity: 0;
				transition: opacity 0.3s ease;
			}
			
			.gallery-item:hover .gallery-overlay {
				opacity: 1;
			}
			
			.gallery-overlay i {
				color: white;
				font-size: 24px;
			}
			
		/* Modal Styles */
		.modal-body {
			padding: 0;
			position: relative;
			overflow: hidden;
		}
		
		.modal-body img {
			width: 100%;
			height: auto;
			max-height: 80vh;
			object-fit: contain;
			transition: transform 0.3s ease;
			cursor: grab;
		}
		
		.modal-body img:active {
			cursor: grabbing;
		}
		
		/* Zoom Controls */
		.zoom-controls {
			position: absolute;
			top: 10px;
			right: 10px;
			z-index: 1060;
			display: flex;
			flex-direction: column;
			gap: 5px;
		}
		
		.zoom-btn {
			background: rgba(0, 0, 0, 0.7);
			color: white;
			border: none;
			width: 40px;
			height: 40px;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
			transition: background 0.3s ease;
			font-size: 18px;
		}
		
		.zoom-btn:hover {
			background: rgba(0, 0, 0, 0.9);
		}
		
		.zoom-info {
			position: absolute;
			bottom: 10px;
			left: 10px;
			background: rgba(0, 0, 0, 0.7);
			color: white;
			padding: 5px 10px;
			border-radius: 5px;
			font-size: 12px;
			z-index: 1060;
		}
		
		.image-container {
			position: relative;
			width: 100%;
			height: 80vh;
			overflow: hidden;
			cursor: grab;
		}
		
		.image-container.dragging {
			cursor: grabbing;
		}
		</style>
	</head>		
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
			
			@include('frontend.layouts.header')

			<!-- Home Banner -->
			<section class="banner-section banner-sec-one @if($slider && $slider->count() > 0) has-slider @endif">
				@if($slider && $slider->count() > 0)
					<div class="banner-slider-container">
						<div class="owl-carousel banner-slider">
							@foreach($slider as $slide)
							<div class="banner-slide" style="background-image: url('{{asset('uploads/slider/'.$slide->image)}}');"></div>
							@endforeach
						</div>
					</div>
				@endif
			</section>
			<!-- /Home Banner -->

			<!-- About Us Section -->
			<section class="about-section">
				<div class="container">
					<div class="about-content-wrapper">
						<div class=" section-header sec-header-one text-center aos" data-aos="fade-up">
							<span class="badge badge-primary">About Us</span>
							<h2>Who We Are</h2>
						</div>
						<div class="row justify-content-center">
							<div class="col-lg-10 col-md-12">
								<div class="about-card aos" data-aos="fade-up">
									<div class="about-content text-center mb-4">
										{!!$about->short_description!!}
									</div>
									<div class="about-features">
										<div class="about-feature">
											<div class="about-feature-icon">
												<i class="fas fa-cheese"></i>
											</div>
											<h6>Premium Quality</h6>
											<p>Fresh dairy products</p>
										</div>
										<div class="about-feature">
											<div class="about-feature-icon">
												<i class="fas fa-cow"></i>
											</div>
											<h6>Farm Fresh</h6>
											<p>From local farms</p>
										</div>
										<div class="about-feature">
											<div class="about-feature-icon">
												<i class="fas fa-snowflake"></i>
											</div>
											<h6>Cold Chain</h6>
											<p>Optimal freshness</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /About Us Section -->

			<!-- Categories Section -->
			<section class="speciality-section">
				<div class="container">
					<div class="section-header sec-header-one text-center aos" data-aos="fade-up">
						<span class="badge badge-primary">Our Categories</span>
						<h2>Premium Dairy Categories</h2>
					</div>
					<div class="owl-carousel spciality-slider aos" data-aos="fade-up">
						@foreach($categories as $category)
						<div class="spaciality-item">
							<a href="{{ $category->slug ? route('products.category', $category->slug) : route('products') }}">
								<div class="spaciality-img">
									@if($category->icon)
										<img src="{{asset('uploads/category_icons/'.$category->icon)}}" alt="{{$category->title}} Icon" style="width: 100%; object-fit: cover;">
									@else
										<div style="width: 100%; background: #f8f9fa; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
											<i class="fas fa-image" style="font-size: 48px; color: #dee2e6;"></i>
										</div>
									@endif
								</div>
								<h6>{{$category->title}}</h6>
							</a>
						</div>
						@endforeach
					</div>
					<div class="spciality-nav nav-bottom owl-nav"></div>
				</div>
			</section>
			<!-- /Categories Section -->

			<!-- Doctor Section -->
			<section class="doctor-section">
				<div class="container">
					<div class="section-header sec-header-one text-center aos" data-aos="fade-up">
<span class="badge badge-primary">Featured Products</span>
						<h2>Our Premium Products</h2>
					</div>

					<div class="doctors-slider owl-carousel aos" data-aos="fade-up">
						@foreach($products as $product)
						<div class="card">
							<div class="card-img card-img-hover">
								<a href="{{route('products.details',$product->slug)}}"><img src="{{ $product->primaryImage ? asset('uploads/product/' . $product->primaryImage->image) : 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZGRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMTgiIGZpbGw9IiM5OTkiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIj5ObyBJbWFnZTwvdGV4dD48L3N2Zz4=' }}" alt="{{ $product->name }}"></a>
								<div class="grid-overlay-item d-flex align-items-center justify-content-between">
									<span class="badge bg-orange"><i class="fa-solid fa-star me-1"></i>5.0</span>
									<a href="javascript:void(0)" class="fav-icon">
										<i class="fa fa-heart"></i>
									</a>
								</div>
							</div>
							<div class="card-body p-0">
								<div class="d-flex active-bar align-items-center justify-content-between p-3">
									<a href="javascript:;" class="text-indigo fw-medium fs-14">{{ $product->category->title ?? 'Product' }}</a>
								</div>
								<div class="p-3 pt-0">
									<div class="doctor-info-detail mb-3 pb-3">
										<h3 class="mb-1"><a href="{{route('products.details',$product->slug)}}">{{ $product->name }}</a></h3>
									</div>
									<div class="d-flex align-items-center justify-content-between">
										@if($product->price)
										<div>
											<p class="mb-1">Price</p>
											<h3 class="text-orange">₹ {{ $product->price }}</h3>
										</div>
										@endif
										<a href="{{route('products.details',$product->slug)}}" class="btn btn-md btn-dark d-inline-flex align-items-center rounded-pill">
											<i class="isax isax-calendar-1 me-2"></i>
											Details
										</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="doctor-nav nav-bottom owl-nav"></div>
				</div>
</section>
			<!-- /Doctor Section -->

			<!-- Gallery Section -->
			@if($latestGalleryImages && $latestGalleryImages->count() > 0)
			<section class="gallery-section">
				<div class="container">
					<div class="section-header sec-header-one text-center aos" data-aos="fade-up">
						<span class="badge badge-primary">Gallery</span>
						<h2>Latest Gallery Images</h2>
					</div>
					<div class="gallery-grid aos" data-aos="fade-up">
						<div class="row g-3">
							@foreach($latestGalleryImages as $galleryImage)
							<div class="col-lg-3 col-md-4 col-sm-6">
								<div class="gallery-item">
									<div class="gallery-img-container">
										<img src="{{asset('uploads/gallery/'.$galleryImage->image)}}" 
											 alt="{{ $galleryImage->gallery->title ?? 'Gallery Image' }}" 
											 class="img-fluid gallery-image"
											 data-bs-toggle="modal" 
											 data-bs-target="#imageModal" 
											 data-image="{{asset('uploads/gallery/'.$galleryImage->image)}}"
											 data-title="{{ $galleryImage->gallery->title ?? 'Gallery Image' }}">
										<div class="gallery-overlay">
											<i class="fas fa-search-plus"></i>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="text-center mt-4 aos" data-aos="fade-up">
						<a href="{{ route('gallery') }}" class="btn btn-primary d-inline-flex align-items-center">
							View All Gallery <i class="fas fa-arrow-right ms-2"></i>
						</a>
					</div>
				</div>
			</section>
			@endif
			<!-- /Gallery Section -->

			<!-- Services Section -->
			<section class="services-section aos" data-aos="fade-up">
				<div class="horizontal-slide d-flex" data-direction="right" data-speed="slow">
					<div class="slide-list d-flex gap-4">
						<div class="services-slide">
							<h6><a href="javascript:void(0);">Multi Speciality Treatments & Doctors</a></h6>
						</div>
						<div class="services-slide">
							<h6><a href="javascript:void(0);">Lab Testing Services</a></h6>
						</div>
						<div class="services-slide">
							<h6><a href="javascript:void(0);">Medecines & Supplies</a></h6>
						</div>
						<div class="services-slide">
							<h6><a href="javascript:void(0);">Hospitals & Clinics</a></h6>
						</div>
						<div class="services-slide">
							<h6><a href="javascript:void(0);">Health Care Services</a></h6>
						</div>
						<div class="services-slide">
							<h6><a href="javascript:void(0);">Talk to Doctors</a></h6>
						</div>
						<div class="services-slide">
							<h6><a href="javascript:void(0);">Home Care Services</a></h6>
						</div>
					</div>
				</div>
			</section>
			<!-- /Services Section -->

			<!-- Reasons Section -->
			<section class="reason-section">
				<div class="container">
					<div class="section-header sec-header-one text-center aos" data-aos="fade-up">
						<span class="badge badge-primary">Why Book With Us</span>
						<h2>Compelling Reasons to Choose</h2>
					</div>
					<div class="row row-gap-4 justify-content-center">
						<div class="col-lg-4 col-md-6">
							<div class="reason-item aos" data-aos="fade-up">
								<h6 class="mb-2 d-flex align-items-center"><i class="isax isax-tag-user5 text-orange me-2"></i>Follow-Up Care</h6>
								<p class="fs-14 mb-0">We ensure continuity of care through regular follow-ups and communication, helping you stay on track with health goals.</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="reason-item aos" data-aos="fade-up">
								<h6 class="mb-2 d-flex align-items-center"><i class="isax isax-voice-cricle text-purple me-2"></i>Patient-Centered Approach</h6>
								<p class="fs-14 mb-0">We prioritize your comfort and preferences, tailoring our services to meet your individual needs and Care from Our Experts</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="reason-item aos" data-aos="fade-up">
								<h6 class="mb-2 d-flex align-items-center"><i class="isax isax-wallet-add-15 text-cyan me-2"></i>Convenient Access</h6>
								<p class="fs-14 mb-0">Easily book appointments online or through our dedicated customer service team, with flexible hours to fit your schedule.</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Reasons Section -->

			<!-- Bookus Section -->
			<section class="bookus-section bg-dark">
				<div class="container">
					<div class="row align-items-center row-gap-4">
						<div class="col-lg-6">
							<div class="bookus-img">
								<div class="row g-3">
									<div class="col-md-12 aos" data-aos="fade-up">
										<img src="{{url('/')}}/assets/frontend/img/book-01.jpg" alt="img" class="img-fluid">
									</div>
									<div class="col-sm-6 aos" data-aos="fade-up">
										<img src="{{url('/')}}/assets/frontend/img/book-02.jpg" alt="img" class="img-fluid">
									</div>
									<div class="col-sm-6 aos" data-aos="fade-up">
										<img src="{{url('/')}}/assets/frontend/img/book-03.jpg" alt="img" class="img-fluid">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="section-header sec-header-one mb-2 aos" data-aos="fade-up">
								<span class="badge badge-primary">Why Book With Us</span>
								<h2 class="text-white mb-3">We are committed to understanding your <span class="text-primary-gradient">unique needs and delivering care.</span></h2>
							</div>
							<p class="text-light mb-4">As a trusted healthAs a trusted healthcare provider in our community, we are passionate about promoting health and wellness beyond the clinic. We actively engage in community outreach programs, health fairs, and educational workshop.</p>
							<div class="faq-info aos" data-aos="fade-up">
								<div class="accordion" id="faq-details">

									<!-- FAQ Item -->
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingOne">
											<a href="javascript:void(0);" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												01 . Our Vision
											</a>
										</h2>
										<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faq-details">
											<div class="accordion-body">
												<div class="accordion-content">
													<p>We envision a community where everyone has access to high-quality healthcare and the resources they need to lead healthy, fulfilling lives.</p>
												</div> 
											</div>
										</div>
									</div>
									<!-- /FAQ Item -->

									<!-- FAQ Item -->
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingTwo">
											<a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-controls="collapseTwo">
												02 . Our Mission
											</a>
										</h2>
										<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faq-details">
											<div class="accordion-body">
												<div class="accordion-content">
													<p>We envision a community where everyone has access to high-quality healthcare and the resources they need to lead healthy, fulfilling lives.</p>
												</div> 
											</div>
										</div>
									</div>
									<!-- /FAQ Item -->
								</div>
							</div>
						</div>
					</div>
					<div class="bookus-sec">
						<div class="row g-4">
							<div class="col-lg-3">
								<div class="book-item">
									<div class="book-icon bg-primary">
										<i class="isax isax-search-normal5"></i>
									</div>
									<div class="book-info">
										<h6 class="text-white mb-2">Search For Doctors</h6>
										<p class="fs-14 text-light">Search for a doctor based on specialization, location, or availability for your Treatements</p>
									</div>
									<div class="way-icon">
										<img src="{{url('/')}}/assets/frontend/img/icons/way-icon.svg" alt="img">
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="book-item">
									<div class="book-icon bg-orange">
										<i class="isax isax-security-user5"></i>
									</div>
									<div class="book-info">
										<h6 class="text-white mb-2">Check Doctor Profile</h6>
										<p class="fs-14 text-light">Explore detailed doctor profiles on our platform to make informed healthcare decisions.</p>
									</div>
									<div class="way-icon">
										<img src="{{url('/')}}/assets/frontend/img/icons/way-icon.svg" alt="img">
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="book-item">
									<div class="book-icon bg-cyan">
										<i class="isax isax-calendar5"></i>
									</div>
									<div class="book-info">
										<h6 class="text-white mb-2">Schedule Appointment</h6>
										<p class="fs-14 text-light">After choose your preferred doctor, select a convenient time slot, & confirm your appointment.</p>
									</div>
									<div class="way-icon">
										<img src="{{url('/')}}/assets/frontend/img/icons/way-icon.svg" alt="img">
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="book-item">
									<div class="book-icon bg-indigo">
										<i class="isax isax-blend5"></i>
									</div>
									<div class="book-info">
										<h6 class="text-white mb-2">Get Your Solution</h6>
										<p class="fs-14 text-light">Discuss your health concerns with the doctor and receive the personalized advice & with solution.</p>
									</div>
								</div>
							</div>
						</div>		
					</div>		
				</div>
			</section>
			<!-- /Bookus Section -->
			
			<!-- Testimonial Section -->
			<section class="testimonial-section-one">
				<div class="container">
					<div class="section-header sec-header-one text-center aos" data-aos="fade-up">
						<span class="badge badge-primary">Testimonials</span>
						<h2>15k Users Trust Doccure Worldwide</h2>
					</div>

					<!-- Testimonial Slider -->
					<div class="owl-carousel testimonials-slider aos" data-aos="fade-up">
						@foreach($testimonials as $testimonial)
						<div class="card shadow-none mb-0">
							<div class="card-body">
								<h6 class="fs-16 fw-medium mb-2">Excellent Service</h6>
								<p>{{ strip_tags($testimonial->description) }}</p>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-lg">
										@if($testimonial->image)
											<img src="{{asset('uploads/testimonial/'.$testimonial->image)}}" class="rounded-circle" alt="img">
										@else
											<img src="{{url('/')}}/assets/frontend/img/patients/patient.jpg" class="rounded-circle" alt="img">
										@endif
									</a>
									<div class="ms-2">
										<h6 class="mb-1"><a href="javascript:void(0);">{{ $testimonial->name }}</a></h6>
										<p class="fs-14 mb-0">{{ $testimonial->profession }}</p>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<!-- /Testimonial Slider -->

					<!-- Counter -->
					<div class="testimonial-counter">
						<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 row-gap-4">
							<div class="counter-item text-center aos" data-aos="fade-up">
								<h6 class="display-6"><span class="count-digit">500</span>+</h6>
								<p>Doctors Available</p>
							</div>
							<div class="counter-item text-center aos" data-aos="fade-up"">
								<h6 class="display-6 secondary-count"><span class="count-digit">18</span>+</h6>
								<p>Specialities</p>
							</div>
							<div class="counter-item text-center aos" data-aos="fade-up">
								<h6 class="display-6 purple-count"><span class="count-digit">30</span>K</h6>
								<p>Bookings Done</p>
							</div>
							<div class="counter-item text-center aos" data-aos="fade-up">
								<h6 class="display-6 pink-count"><span class="count-digit">97</span>+</h6>
								<p>Hospitals & Clinic</p>
							</div>
							<div class="counter-item text-center  aos" data-aos="fade-up">
								<h6 class="display-6 warning-count"><span class="count-digit">317</span>+</h6>
								<p>Lab Tests Available</p>
							</div>
						</div>
					</div>
					<!-- /Counter -->

				</div>
			</section>
			<!-- /Testimonial Section -->

			<section class="company-section bg-dark aos" data-aos="fade-up">
				<div class="container">
					<div class="section-header sec-header-one text-center">
						<h6 class="text-light">Trusted by 5+ million people at companies like</h6>
					</div>
					<div class="owl-carousel company-slider">
						<div>
							<img src="{{url('/')}}/assets/frontend/img/company/company-01.svg" alt="img">
						</div>
						<div>
							<img src="{{url('/')}}/assets/frontend/img/company/company-02.svg" alt="img">
						</div>
						<div>
							<img src="{{url('/')}}/assets/frontend/img/company/company-03.svg" alt="img">
						</div>
						<div>
							<img src="{{url('/')}}/assets/frontend/img/company/company-04.svg" alt="img">
						</div>
						<div>
							<img src="{{url('/')}}/assets/frontend/img/company/company-05.svg" alt="img">
						</div>
						<div>
							<img src="{{url('/')}}/assets/frontend/img/company/company-06.svg" alt="img">
						</div>
						<div>
							<img src="{{url('/')}}/assets/frontend/img/company/company-07.svg" alt="img">
						</div>
						<div>
							<img src="{{url('/')}}/assets/frontend/img/company/company-08.svg" alt="img">
						</div>
					</div>
				</div>
			</section>
{{--
			<section class="faq-section-one">
				<div class="container">
					<div class="section-header sec-header-one text-center aos" data-aos="fade-up">
						<span class="badge badge-primary">FAQ'S</span>
						<h2>Your Questions are Answered</h2>
					</div>
					<div class="row">
						<div class="col-md-10 mx-auto">
							<div class="faq-info aos" data-aos="fade-up">
								<div class="accordion" id="faq-details">
		
									<!-- FAQ Item -->
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingOne">
											<a href="javascript:void(0);" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												How do I book an appointment with a doctor?
											</a>
										</h2>
										<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faq-details">
											<div class="accordion-body">
												<div class="accordion-content">
													<p>Yes, simply visit our website and log in or create an account. Search for a doctor based on specialization, location, or availability & confirm your booking.</p>
												</div> 
											</div>
										</div>
									</div>
									<!-- /FAQ Item -->
		
									<!-- FAQ Item -->
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingTwo">
											<a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												Can I request a specific doctor when booking my appointment? 
											</a>
										</h2>
										<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faq-details">
											<div class="accordion-body">
												<div class="accordion-content">
													<p>Yes, you can usually request a specific doctor when booking your appointment, though availability may vary based on their schedule.</p>
												</div>
											</div>
										</div>
									</div>
									<!-- /FAQ Item -->
		
									<!-- FAQ Item -->
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingThree">
											<a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												What should I do if I need to cancel or reschedule my appointment?
											</a>
										</h2>
										<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faq-details">
											<div class="accordion-body">
												<div class="accordion-content">
													<p>If you need to cancel or reschedule your appointment, contact the doctor as soon as possible to inform them and to reschedule for another available time slot.</p>
												</div>
											</div>
										</div>
									</div>
									<!-- /FAQ Item -->
		
									<!-- FAQ Item -->
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingFour">
											<a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
												What if I'm running late for my appointment?
											</a>
										</h2>
										<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faq-details">
											<div class="accordion-body">
												<div class="accordion-content">
													<p>If you know you will be late, it's courteous to call the doctor's office and inform them. Depending on their policy and schedule, they may be able to accommodate you or reschedule your appointment.</p>
												</div>
											</div>
										</div>
									</div>
									<!-- /FAQ Item -->
		
									<!-- FAQ Item -->
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingFive">
											<a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
												Can I book appointments for family members or dependents?
											</a>
										</h2>
										<div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faq-details">
											<div class="accordion-body">
												<div class="accordion-content">
													<p>Yes, in many cases, you can book appointments for family members or dependents. However, you may need to provide their personal information and consent to do so.</p>
												</div>
											</div>
										</div>
									</div>
									<!-- /FAQ Item -->
												
								</div>
							</div>

						</div>
					</div>
				</div>
			</section>
--}}
			<!-- App Section -->
			<!-- <section class="app-section app-sec-one p-0">
				<div class="container">
					<div class="app-bg">
						<div class="row">
							<div class="col-lg-6 col-md-12 d-flex">
								<div class="app-content d-flex flex-column justify-content-center">
									<div class="app-header aos" data-aos="fade-up">
										<h3 class="display-6 text-white">Download the Doccure App today!</h3>
										<p class="text-light">To download an app related to a doctor or medical services, you can typically visit the app store on your device.</p>
									</div>
									<div class="google-imgs aos" data-aos="fade-up">
										<a href="javascript:void(0);"><img src="{{url('/')}}/assets/frontend/img/icons/app-store-01.svg" alt="img"></a>
										<a href="javascript:void(0);"><img src="{{url('/')}}/assets/frontend/img/icons/google-play-01.svg" alt="img"></a>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12 aos" data-aos="fade-up">
								<div class="mobile-img">
									<img src="{{url('/')}}/assets/frontend/img/mobile-img.png" class="img-fluid" alt="img">
								</div>
							</div>
						</div>
						<div class="app-bgs">
							<img src="{{url('/')}}/assets/frontend/img/bg/app-bg-02.png" alt="img" class="app-bg-01">
							<img src="{{url('/')}}/assets/frontend/img/bg/app-bg-03.png" alt="img" class="app-bg-02">
							<img src="{{url('/')}}/assets/frontend/img/bg/app-bg-04.png" alt="img" class="app-bg-03">
						</div>
					</div>
				</div>
				<div class="download-bg">
					<img src="{{url('/')}}/assets/frontend/img/bg/download-bg.png" alt="img">
				</div>
			</section> -->
			<!-- /App Section -->

			<!-- Article Section -->
			<section class="article-section">
				<div class="container">
					<div class="section-header sec-header-one text-center aos" data-aos="fade-up">
						<span class="badge badge-primary">Recent Blogs</span>
						<h2>Stay Updated With Our Latest Articles</h2>
					</div>
					<div class="row g-4">
						@foreach($blogs as $blog)
						<div class="col-lg-6">
							<div class="article-item aos" data-aos="fade-up">
								<div class="article-img">
									<a href="{{ route('blog.details', $blog->slug) }}">
										@if($blog->banner)
											<img src="{{ asset('uploads/blog/' . $blog->banner) }}" class="img-fluid" alt="{{ $blog->title }}">
										@else
											<img src="{{ url('/assets/frontend/img/blog/article-01.jpg') }}" class="img-fluid" alt="{{ $blog->title }}">
										@endif
									</a>
									<div class="date-icon">
										<span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}</span>{{ \Carbon\Carbon::parse($blog->created_at)->format('M') }}
									</div>
								</div>
								<div class="article-info">
									<span class="badge badge-cyan mb-2">{{ $blog->blogCategory ? $blog->blogCategory->title : 'General' }}</span>
									<h6 class="mb-2"><a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->title }}</a></h6>
									<p>{{ strip_tags($blog->short_description) }}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="text-center load-item aos" data-aos="fade-up">
						<a href="blog-grid.html" class="btn btn-dark d-inline-flex align-items-center">View All Articles<i class="isax isax-arrow-right-3 ms-2"></i></a>
					</div>			
				</div>
			</section>
			<!-- /Article Section -->

			<!-- Info Section -->
			<section class="info-section">
				<div class="container">					
					<div class="contact-info">
						<div class="d-lg-flex align-items-center justify-content-between w-100 gap-4">
							<div class="mb-4 mb-lg-0 aos" data-aos="fade-up">
								<h6 class="display-6 text-white">Working for Your Better Health.</h6>
							</div>
							<div class="d-sm-flex align-items-center justify-content-lg-end gap-4 aos" data-aos="fade-up">
								<div class="con-info d-flex align-items-center mb-3 mb-sm-0">
									<span class="con-icon">
										<i class="isax isax-headphone"></i>
									</span>
									<div class="ms-2">
										<p class="text-white mb-1">Customer Support</p>
										<p class="text-white fw-medium mb-0">+1 56589 54598</p>
									</div>
								</div>
								<div class="con-info d-flex align-items-center">
									<span class="con-icon">
										<i class="isax isax-message-2"></i>
									</span>
									<div class="ms-2">
										<p class="text-white mb-1">Drop Us an Email</p>
										<p class="text-white fw-medium mb-0">info1256@example.com</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Info Section -->

@include('frontend.layouts.footer')
		
		</div>		
		<!-- /Main Wrapper -->
		
		<!-- Image Modal -->
		<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-fullscreen modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="imageModalLabel">Gallery Image</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body p-0">
						<div class="image-container" id="imageContainer">
							<img id="modalImage" src="" alt="" class="img-fluid">
							<div class="zoom-controls">
								<button class="zoom-btn" id="zoomInBtn" title="Zoom In">
									<i class="fas fa-search-plus"></i>
								</button>
								<button class="zoom-btn" id="zoomOutBtn" title="Zoom Out">
									<i class="fas fa-search-minus"></i>
								</button>
								<button class="zoom-btn" id="zoomResetBtn" title="Reset Zoom">
									<i class="fas fa-compress"></i>
								</button>
							</div>
							<div class="zoom-info" id="zoomInfo">100%</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!-- jQuery -->
		<script src="{{url('/')}}/assets/frontend/js/jquery-3.7.1.min.js"></script>

		<!-- Bootstrap Bundle JS -->
		<script src="{{url('/')}}/assets/frontend/js/bootstrap.bundle.min.js"></script>
		
		<!-- Feather Icon JS -->
		<script src="{{url('/')}}/assets/frontend/js/feather.min.js"></script>

		<!-- select JS -->
		<script src="{{url('/')}}/assets/frontend/plugins/select2/js/select2.min.js"></script>

		<!-- Datepicker JS -->
		<script src="{{url('/')}}/assets/frontend/js/moment.min.js"></script>
		<script src="{{url('/')}}/assets/frontend/js/bootstrap-datetimepicker.min.js"></script>

		<!-- Owl Carousel JS -->
		<script src="{{url('/')}}/assets/frontend/js/owl.carousel.min.js"></script>

		<!-- Counter JS -->
		<script src="{{url('/')}}/assets/frontend/js/counter.js"></script>

		<!-- Animation JS -->
		<script src="{{url('/')}}/assets/frontend/js/aos.js"></script>
				
<!-- Custom JS -->
		<script src="{{url('/')}}/assets/frontend/js/script.js"></script>
		
		<!-- Gallery Modal Script -->
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const imageModal = document.getElementById('imageModal');
				const modalImage = document.getElementById('modalImage');
				const modalTitle = document.getElementById('imageModalLabel');
				const imageContainer = document.getElementById('imageContainer');
				const zoomInBtn = document.getElementById('zoomInBtn');
				const zoomOutBtn = document.getElementById('zoomOutBtn');
				const zoomResetBtn = document.getElementById('zoomResetBtn');
				const zoomInfo = document.getElementById('zoomInfo');
				
				let currentZoom = 1;
				let isDragging = false;
				let startX, startY, scrollLeft, scrollTop;
				
				// Add click event to all gallery images
				document.querySelectorAll('.gallery-image').forEach(function(image) {
					image.addEventListener('click', function() {
						const imageSrc = this.getAttribute('data-image');
						const imageTitle = this.getAttribute('data-title');
						
						modalImage.src = imageSrc;
						modalImage.alt = imageTitle;
						modalTitle.textContent = imageTitle;
						resetZoom();
					});
				});
				
				// Clear modal image when modal is hidden
				imageModal.addEventListener('hidden.bs.modal', function () {
					modalImage.src = '';
					modalTitle.textContent = 'Gallery Image';
					resetZoom();
				});
				
				// Zoom functions
				function updateZoom() {
					modalImage.style.transform = `scale(${currentZoom})`;
					zoomInfo.textContent = Math.round(currentZoom * 100) + '%';
				}
				
				function zoomIn() {
					if (currentZoom < 3) {
						currentZoom += 0.25;
						updateZoom();
					}
				}
				
				function zoomOut() {
					if (currentZoom > 0.5) {
						currentZoom -= 0.25;
						updateZoom();
					}
				}
				
				function resetZoom() {
					currentZoom = 1;
					updateZoom();
					imageContainer.scrollLeft = 0;
					imageContainer.scrollTop = 0;
				}
				
				// Zoom controls
				zoomInBtn.addEventListener('click', zoomIn);
				zoomOutBtn.addEventListener('click', zoomOut);
				zoomResetBtn.addEventListener('click', resetZoom);
				
				// Mouse wheel zoom
				imageContainer.addEventListener('wheel', function(e) {
					e.preventDefault();
					if (e.deltaY < 0) {
						zoomIn();
					} else {
						zoomOut();
					}
				});
				
				// Drag functionality
				imageContainer.addEventListener('mousedown', function(e) {
					if (currentZoom > 1) {
						isDragging = true;
						imageContainer.classList.add('dragging');
						startX = e.pageX - imageContainer.offsetLeft;
						startY = e.pageY - imageContainer.offsetTop;
						scrollLeft = imageContainer.scrollLeft;
						scrollTop = imageContainer.scrollTop;
					}
				});
				
				imageContainer.addEventListener('mouseleave', function() {
					isDragging = false;
					imageContainer.classList.remove('dragging');
				});
				
				imageContainer.addEventListener('mouseup', function() {
					isDragging = false;
					imageContainer.classList.remove('dragging');
				});
				
				imageContainer.addEventListener('mousemove', function(e) {
					if (!isDragging) return;
					e.preventDefault();
					const x = e.pageX - imageContainer.offsetLeft;
					const y = e.pageY - imageContainer.offsetTop;
					const walkX = (x - startX) * 2;
					const walkY = (y - startY) * 2;
					imageContainer.scrollLeft = scrollLeft - walkX;
					imageContainer.scrollTop = scrollTop - walkY;
				});
				
				// Double click to zoom
				modalImage.addEventListener('dblclick', function(e) {
					e.preventDefault();
					if (currentZoom === 1) {
						currentZoom = 2;
					} else {
						resetZoom();
					}
					updateZoom();
				});
				
				// Keyboard shortcuts
				document.addEventListener('keydown', function(e) {
					if (imageModal.classList.contains('show')) {
						switch(e.key) {
							case '+':
							case '=':
								zoomIn();
								break;
							case '-':
							case '_':
								zoomOut();
								break;
							case '0':
								resetZoom();
								break;
							case 'Escape':
								// Let Bootstrap handle escape
								break;
						}
					}
				});
			});
		</script>
	
	</body>
</html>