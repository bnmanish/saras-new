<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{$page->meta_title}}</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="{{$page->meta_description}}">
		<meta name="keywords" content="{{$page->meta_keywords}}">
		<meta name="author" content="Practo Clone HTML Template - Doctor Booking Template">
		<meta property="og:url" content="{{route('home')}}">
		<meta property="og:type" content="website">
		<meta property="og:title" content="{{$page->meta_title}}">
		<meta property="og:description" content="{{$page->meta_description}}">
		<meta property="og:image" content="{{url('/')}}/assets/frontend/img/preview-banner.jpg">
		<meta name="twitter:title" content="{{$page->meta_title}}">
		<meta name="twitter:description" content="{{$page->meta_description}}">
		<!-- Apple Touch Icon -->
		<link rel="shortcut icon" href="{{url('uploads/setting/'.getSetting()->favicon)}}" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="180x180" href="{{url('uploads/setting/'.getSetting()->favicon)}}">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		{!!getSetting()->head_content!!}
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
							<div class="banner-slide">
								<img src="{{asset('uploads/slider/' . $slide->image)}}" alt="Slider Image" class="slider-image">
							</div>
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
					<div class="row g-3 aos" data-aos="fade-up">
						@foreach($latestGalleryImages as $galleryImage)
							<div class="col-lg-3 col-md-4 col-sm-6">
								<div class="image-grid-item">
									<div class="image-container">
										<img src="{{asset('uploads/gallery/'.$galleryImage->image)}}" alt="{{ $galleryImage->gallery->title ?? 'Gallery Image' }}" class="img-fluid">
										<div class="image-overlay">
											<h5 class="image-title">{{ $galleryImage->gallery->title ?? 'Gallery Image' }}</h5>
										</div>
									</div>
								</div>
							</div>
						@endforeach
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
			                <h6><a href="javascript:void(0);">Bulk Milk Supply</a></h6>
			            </div>
			            <div class="services-slide">
			                <h6><a href="javascript:void(0);">Modern Dairy Processing</a></h6>
			            </div>
			            <div class="services-slide">
			                <h6><a href="javascript:void(0);">Hygienic Milk Collection</a></h6>
			            </div>
			            <div class="services-slide">
			                <h6><a href="javascript:void(0);">Large Scale Ghee Production</a></h6>
			            </div>
			            <div class="services-slide">
			                <h6><a href="javascript:void(0);">Quality Control Lab</a></h6>
			            </div>
			            <div class="services-slide">
			                <h6><a href="javascript:void(0);">Advanced Pasteurization</a></h6>
			            </div>
			            <div class="services-slide">
			                <h6><a href="javascript:void(0);">Wholesale Dairy Solutions</a></h6>
			            </div>
			        </div>
			    </div>
			</section>
			<!-- /Services Section -->

			<!-- Reasons Section -->
			<section class="reason-section">
				<div class="container">
					<div class="section-header sec-header-one text-center aos" data-aos="fade-up">
						<span class="badge badge-primary">Why Choose Saras Dairy?</span>
						<h2>Compelling Reasons to Trust Our Purity</h2>
					</div>
					<div class="row row-gap-4 justify-content-center">
						<div class="col-lg-4 col-md-6">
							<div class="reason-item aos" data-aos="fade-up">
								<h6 class="mb-2 d-flex align-items-center"><i class="isax isax-tag-user5 text-orange me-2"></i>Purity Guarantee</h6>
								<p class="fs-14 mb-0">We ensure 100% pure milk with zero additives or preservatives, delivering nature’s goodness in its most original form.</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="reason-item aos" data-aos="fade-up">
								<h6 class="mb-2 d-flex align-items-center"><i class="isax isax-voice-cricle text-purple me-2"></i>Customer-First Approach</h6>
								<p class="fs-14 mb-0">We prioritize your health and preferences, offering flexible delivery plans and personalized service to meet your family's daily dairy needs.</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="reason-item aos" data-aos="fade-up">
								<h6 class="mb-2 d-flex align-items-center"><i class="isax isax-wallet-add-15 text-cyan me-2"></i>Expert Quality Care</h6>
								<p class="fs-14 mb-0">From cattle health to hygienic packaging, our dairy experts monitor every step to ensure you receive the highest standard of nutrition.</p>
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
										<img src="{{url('/')}}/assets/frontend/img/quality-01.jpg" alt="Quality You Can Taste" class="img-fluid">
									</div>
									<div class="col-sm-6 aos" data-aos="fade-up">
										<img src="{{url('/')}}/assets/frontend/img/quality-02.jpg" alt="img" class="img-fluid">
									</div>
									<div class="col-sm-6 aos" data-aos="fade-up">
										<img src="{{url('/')}}/assets/frontend/img/quality-03.jpg" alt="img" class="img-fluid">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="section-header sec-header-one mb-2 aos" data-aos="fade-up">
								<span class="badge badge-primary">Why Choose Us</span>
								<h2 class="text-white mb-3">Quality You Can Taste<span class="text-primary-gradient">Purity You Can Trust.</span></h2>
							</div>
							<p class="text-light mb-4">Our mission is to deliver 100% pure and natural dairy products without any additives or preservatives. Experience the authentic taste of freshness with Saras Dairy’s farm-to-home service.</p>
							<div class="faq-info aos" data-aos="fade-up">
								<div class="accordion" id="faq-details">

									<!-- FAQ Item -->
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingOne">
											<a href="javascript:void(0);" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												100% Pure & Natural?
											</a>
										</h2>
										<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faq-details">
											<div class="accordion-body">
												<div class="accordion-content">
													<p>We believe in providing milk exactly as nature intended. Our products are free from harmful chemicals, preservatives, or synthetic additives.</p>
												</div> 
											</div>
										</div>
									</div>
									<!-- /FAQ Item -->

									<!-- FAQ Item -->
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingTwo">
											<a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-controls="collapseTwo">
												Rigorous Quality Checks?
											</a>
										</h2>
										<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faq-details">
											<div class="accordion-body">
												<div class="accordion-content">
													<p>Safety is our priority. Our dairy products undergo strict quality testing at every stage from collection to packaging meeting the highest hygiene standards.</p>
												</div> 
											</div>
										</div>
									</div>
									<!-- /FAQ Item -->

									<!-- FAQ Item -->
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingTwo">
											<a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-controls="collapseTwo">
												Rich in Nutrition?
											</a>
										</h2>
										<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faq-details">
											<div class="accordion-body">
												<div class="accordion-content">
													<p>Packed with essential vitamins, calcium, and proteins, Saras Dairy products are designed to support the health and growth of your entire family.</p>
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
					                    <i class="isax isax-home-25"></i>
					                </div>
					                <div class="book-info">
					                    <h6 class="text-white mb-2">Direct Farm Sourcing</h6>
					                    <p class="fs-14 text-light">We collect fresh milk daily from our high-quality breed cows and local managed farms.</p>
					                </div>
					                <div class="way-icon">
					                    <img src="{{url('/')}}/assets/frontend/img/icons/way-icon.svg" alt="img">
					                </div>
					            </div>
					        </div>
					        <div class="col-lg-3">
					            <div class="book-item">
					                <div class="book-info">
					                <div class="book-icon bg-orange">
					                    <i class="isax isax-verify5"></i>
					                </div>
					                    <h6 class="text-white mb-2">Quality & Lab Testing</h6>
					                    <p class="fs-14 text-light">Every batch undergoes 20+ strict quality checks in our lab to ensure 100% purity and fat content.</p>
					                </div>
					                <div class="way-icon">
					                    <img src="{{url('/')}}/assets/frontend/img/icons/way-icon.svg" alt="img">
					                </div>
					            </div>
					        </div>
					        <div class="col-lg-3">
					            <div class="book-item">
					                <div class="book-icon bg-cyan">
					                    <i class="isax isax-setting-55"></i>
					                </div>
					                <div class="book-info">
					                    <h6 class="text-white mb-2">Advanced Processing</h6>
					                    <p class="fs-14 text-light">Milk is pasteurized and processed using modern technology to maintain its natural nutrition.</p>
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
					                    <h6 class="text-white mb-2">Bulk Supply & Logistics</h6>
					                    <p class="fs-14 text-light">We supply fresh dairy in bulk to distributors and industries with a robust cold-chain network.</p>
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
						<h2>Processing Over 15,000K+ Litres of Pure Milk Daily</h2>
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
					            <h6 class="display-6"><span class="count-digit">10</span>K+</h6>
					            <p>Liters Daily Capacity</p>
					        </div>
					        <div class="counter-item text-center aos" data-aos="fade-up">
					            <h6 class="display-6 secondary-count"><span class="count-digit">50</span>+</h6>
					            <p>Managed Farms</p>
					        </div>
					        <div class="counter-item text-center aos" data-aos="fade-up">
					            <h6 class="display-6 purple-count"><span class="count-digit">150</span>+</h6>
					            <p>Bulk Distributors</p>
					        </div>
					        <div class="counter-item text-center aos" data-aos="fade-up">
					            <h6 class="display-6 pink-count"><span class="count-digit">25</span>+</h6>
					            <p>Quality Lab Checks</p>
					        </div>
					        <div class="counter-item text-center aos" data-aos="fade-up">
					            <h6 class="display-6 warning-count"><span class="count-digit">100</span>%</h6>
					            <p>Pure & Fresh</p>
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
						<h6 class="text-light">Trusted Supply Partner for Leading Retailers & Businesses</h6>
						<p>With a robust infrastructure and a commitment to global hygiene standards, we provide consistent bulk dairy supply to industries and retailers. Our state-of-the-art factory ensures that every batch meets the highest expectations of our professional partners.</p>
					</div>
					<!-- <div class="owl-carousel company-slider">
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
					</div> -->
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
						<a href="{{route('blog')}}" class="btn btn-dark d-inline-flex align-items-center">View All Articles<i class="isax isax-arrow-right-3 ms-2"></i></a>
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
								<h6 class="display-6 text-white">Dedicated to Supplying Pure Dairy Excellence</h6>
							</div>
							<div class="d-sm-flex align-items-center justify-content-lg-end gap-4 aos" data-aos="fade-up">
								<div class="con-info d-flex align-items-center mb-3 mb-sm-0">
									<span class="con-icon">
										<i class="isax isax-headphone"></i>
									</span>
									<div class="ms-2">
										<p class="text-white mb-1">Customer Support</p>
										<p class="text-white fw-medium mb-0"><a href="tel:{{getSetting()->primary_contact ?? '+9177260 07333'}}">{{getSetting()->primary_contact ?? '+9177260 07333'}}</a></p>
									</div>
								</div>
								<div class="con-info d-flex align-items-center">
									<span class="con-icon">
										<i class="isax isax-message-2"></i>
									</span>
									<div class="ms-2">
										<p class="text-white mb-1">Drop Us an Email</p>
										<p class="text-white fw-medium mb-0"><a href="mailto:{{getSetting()->primary_email ?? 'gngmu-rj@nic.in'}}">{{getSetting()->primary_email ?? 'info@example.com'}}</a></p>
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
		@if(!empty($page->scripts))
		<script>
			{!! $page->scripts !!}
		</script>
		@endif
	</body>
</html>