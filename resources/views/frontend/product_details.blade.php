<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{$product->meta_title}}</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="{{$product->meta_description}}">
		<meta name="keywords" content="{{$product->meta_keywords}}">
		<meta property="og:url" content="{{route('products.details',$product->slug)}}">
		<meta property="og:type" content="website">
		<meta property="og:title" content="{{$product->meta_title}}">
		<meta property="og:description" content="{{$product->meta_description}}">
		<meta name="twitter:title" content="{{$product->meta_title}}">
		<meta name="twitter:description" content="{{$product->meta_description}}">
		
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
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/bootstrap-datetimepicker.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/plugins/select2/css/select2.min.css">
		
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/plugins/fancybox/jquery.fancybox.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/custom.css">

		<style>
			.doctor-img1 .carousel {
				width: 100%;
				max-width: 600px;
				margin: 0 auto;
				border-radius: 10px;
				box-shadow: 0 4px 8px rgba(0,0,0,0.1);
			}
			@media (max-width: 576px) {
				.doctor-img1 .carousel {
					max-width: 100%;
				}
			}
			.doctor-img1 .carousel-inner {
				position: relative;
				width: 100%;
				overflow: hidden;
				height: 400px;
				border-radius: 10px;
			}
			.doctor-img1 .carousel-item {
				height: 400px;
			}
			.doctor-img1 .carousel-item img {
				width: 100%;
				height: 100%;
				object-fit: cover;
				border-radius: 10px;
			}
			.doctor-img1 .carousel-indicators {
				bottom: -40px;
			}
			.doctor-img1 .carousel-indicators button {
				width: 12px;
				height: 12px;
				border-radius: 50%;
				margin: 0 5px;
			}
			.doctor-img1 .carousel-control-prev,
			.doctor-img1 .carousel-control-next {
				width: 40px;
				height: 40px;
				border-radius: 50%;
				background-color: rgba(0,0,0,0.5);
				border: none;
				top: 50%;
				transform: translateY(-50%);
			}
			.doctor-img1 .carousel-control-prev {
				left: 10px;
			}
			.doctor-img1 .carousel-control-next {
				right: 10px;
			}
			.doctor-img1 .carousel-control-prev-icon,
			.doctor-img1 .carousel-control-next-icon {
				width: 20px;
				height: 20px;
			}
			/* Thumbnail styles */
			.doctor-img1 .thumbnail-container {
				margin-top: 60px;
			}
			.doctor-img1 .thumbnail-container .img-thumbnail {
				border: 2px solid #dee2e6;
				transition: border-color 0.3s ease;
				cursor: pointer;
			}
			.doctor-img1 .thumbnail-container .img-thumbnail:hover {
				border-color: #007bff;
			}
			.doctor-img1 .thumbnail-container .img-thumbnail.active {
				border-color: #007bff;
				box-shadow: 0 0 5px rgba(0,123,255,0.5);
			}
			.product-description .doctor-img1 {
				width: 50%;
			}
			@media (max-width: 576px) {
				.product-description .doctor-img1 {
					width: 100%;
				}
			}
			
			/* Related Products Styles */
			.related-products-slider .product-card {
				transition: transform 0.3s ease, box-shadow 0.3s ease;
				border: none;
				box-shadow: 0 2px 8px rgba(0,0,0,0.1);
				overflow: hidden;
			}
			.related-products-slider .product-card:hover {
				transform: translateY(-5px);
				box-shadow: 0 8px 25px rgba(0,0,0,0.15);
			}
			.related-products-slider .product-image {
				transition: transform 0.3s ease;
			}
			.related-products-slider .product-card:hover .product-image {
				transform: scale(1.05);
			}
			.related-products-slider .card-title {
				font-size: 1.1rem;
				font-weight: 600;
				margin-bottom: 0.5rem;
			}
			.related-products-slider .card-body {
				padding: 1rem;
			}
			.related-products-slider .text-primary {
				font-weight: 700;
			}
		</style>

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
									<li class="breadcrumb-item active">{{$product->name}}</li>
								</ol>
								<h2 class="breadcrumb-title">{{$product->name}}</h2>
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

			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-7 col-lg-3 col-xl-9">
							<!-- Doctor Widget -->
							<div class="card">
								<div class="card-body product-description">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img1">
												@if($product->images->count() > 0)
													<div id="productImageCarousel" class="carousel slide" data-bs-ride="carousel">
														<div class="carousel-indicators">
															@foreach($product->images as $index => $image)
																<button type="button" data-bs-target="#productImageCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
															@endforeach
														</div>
														<div class="carousel-inner">
															@foreach($product->images as $index => $image)
																<div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
																	@if(file_exists(public_path('uploads/product/' . $image->image)))
																		<img src="{{ url('uploads/product/' . $image->image) }}" class="d-block w-100" alt="{{ $product->name }} Image {{ $index + 1 }}">
																	@else
																		<img src="{{ url('/') }}/assets/frontend/img/products/product.jpg" class="d-block w-100" alt="Image not found">
																	@endif
																</div>
															@endforeach
														</div>
														@if($product->images->count() > 1)
															<button class="carousel-control-prev" type="button" data-bs-target="#productImageCarousel" data-bs-slide="prev">
																<span class="carousel-control-prev-icon" aria-hidden="true"></span>
																<span class="visually-hidden">Previous</span>
															</button>
															<button class="carousel-control-next" type="button" data-bs-target="#productImageCarousel" data-bs-slide="next">
																<span class="carousel-control-next-icon" aria-hidden="true"></span>
																<span class="visually-hidden">Next</span>
															</button>
														@endif
													</div>
												@else
													<div style="height: 400px; display: flex; align-items: center; justify-content: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
														<img src="{{ url('/') }}/assets/frontend/img/products/product.jpg" class="img-fluid" style="max-height: 400px; border-radius: 10px;" alt="No Image">
													</div>
												@endif
											</div>
											<div class="doc-info-cont product-cont">
												<h4 class="doc-name mb-2">{{$product->name}}</h4>
												<div class="dynamic-description">
													{!!$product->short_description!!}
												</div>
											</div>
										</div>
										
									</div>
									
								</div>
							</div>
							<!-- /Doctor Widget -->
							
							<!-- Doctor Details Tab -->
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
										<h3 class="pt-4">Product Details</h3>
										<hr>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content dynamic-description pt-3">
									
										{!!$product->long_description!!}
										
									</div>
								</div>
							</div>
							<!-- /Doctor Details Tab -->
							
							<!-- Related Products Slider -->
							@if($relatedProducts->count() > 0)
							<div class="card mt-4">
								<div class="card-body">
									<h3 class="card-title mb-4">Related Products</h3>
									<div class="related-products-slider">
										<div class="row">
											@foreach($relatedProducts as $relatedProduct)
											<div class="col-md-6 col-lg-4 mb-4">
												<div class="card h-100 product-card">
													<a href="{{route('products.details', $relatedProduct->slug)}}" class="text-decoration-none">
														@if($relatedProduct->primaryImage)
															<img src="{{url('uploads/product/' . $relatedProduct->primaryImage->image)}}" 
																class="card-img-top product-image" 
																alt="{{$relatedProduct->name}}"
																style="height: 200px; object-fit: cover;">
														@else
															<img src="{{url('/assets/frontend/img/products/product.jpg')}}" 
																class="card-img-top product-image" 
																alt="{{$relatedProduct->name}}"
																style="height: 200px; object-fit: cover;">
														@endif
														<div class="card-body">
															<h5 class="card-title text-dark">{{$relatedProduct->name}}</h5>
															<p class="card-text text-muted small">{{$relatedProduct->category->title}}</p>
															<div class="d-flex justify-content-between align-items-center">
																<span class="h5 text-primary mb-0">₹{{$relatedProduct->price}}</span>
																<span class="badge bg-success">In Stock</span>
															</div>
															@if($relatedProduct->pack_size)
															<p class="card-text text-muted small mb-0">Pack Size: {{$relatedProduct->pack_size}}</p>
															@endif
														</div>
													</a>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
							@endif

						</div>

						<div class="col-md-5 col-lg-3 col-xl-3 theiaStickySidebar">
							
							<!-- Right Details -->
							<div class="card search-filter">
								<div class="card-body">
									<div class="clini-infos mt-0">
										<h2>₹ {{$product->price}}  <span class="badge badge-primary">In stock</span></h2>
									</div>
									
									<div class="clinic-details mt-4">
										<div class="clinic-booking">
											<a class="btn btn-primary" href="{{route('contact')}}">Contact Us</a>
										</div>
									</div>
									<div class="card flex-fill mt-4 mb-0">
										<ul class="list-group list-group-flush">
											<li class="list-group-item text-gray-6">Category	<span class="float-end">{{$product->category->title}}</span></li>
											<li class="list-group-item text-gray-6">Pack Size	<span class="float-end">{{$product->pack_size}}</span></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card search-filter">
								<div class="card-body">
									<div class="card flex-fill mt-0 mb-0">
										<ul class="list-group list-group-flush benifits-col">
											<li class="list-group-item d-flex align-items-center">
												<div>
													<i class="fas fa-shipping-fast"></i>
												</div>
												<div>
													Free Shipping<br><span class="text-sm">For orders from $50</span>
												</div>
											</li>
											<li class="list-group-item d-flex align-items-center">
												<div>
													<i class="far fa-question-circle"></i>
												</div>
												<div>
													Support 24/7<br><span class="text-sm">Call us anytime</span>
												</div>
											</li>
											<li class="list-group-item d-flex align-items-center">
												<div>
													<i class="fas fa-hands"></i>
												</div>
												<div>
													100% Safety<br><span class="text-sm">Only secure payments</span>
												</div>
											</li>
											<!-- <li class="list-group-item d-flex align-items-center">
												<div>
													<i class="fas fa-tag"></i>
												</div>
												<div>
													Hot Offers<br><span class="text-sm">Discounts up to 90%</span>
												</div>
											</li> -->
										</ul>
									</div>
								</div>
							</div>
							<!-- /Right Details -->
							
						</div>

					</div>

					

				</div>
			</div>		
			<!-- /Page Content -->
   
			@include('frontend.layouts.footer')
		   
		</div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
		<script src="{{url('/')}}/assets/frontend/js/jquery-3.7.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{url('/')}}/assets/frontend/js/bootstrap.bundle.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{url('/')}}/assets/frontend/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="{{url('/')}}/assets/frontend/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Select2 JS -->
		<script src="{{url('/')}}/assets/frontend/plugins/select2/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="{{url('/')}}/assets/frontend/js/moment.min.js"></script>
		<script src="{{url('/')}}/assets/frontend/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Fancybox JS -->
		<script src="{{url('/')}}/assets/frontend/plugins/fancybox/jquery.fancybox.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/frontend/js/script.js"></script>

		<script>
			document.addEventListener('DOMContentLoaded', function() {
				var carouselElement = document.getElementById('productImageCarousel');
				if (carouselElement) {
					var carousel = new bootstrap.Carousel(carouselElement, {
						interval: 5000, // Auto slide every 5 seconds
						wrap: true
					});

					// Update thumbnail active state on slide change
					carouselElement.addEventListener('slid.bs.carousel', function (event) {
						updateThumbnailActiveState(event.to);
					});
				}
			});

			function goToSlide(index) {
				var carousel = bootstrap.Carousel.getInstance(document.getElementById('productImageCarousel'));
				if (carousel) {
					carousel.to(index);
					updateThumbnailActiveState(index);
				}
			}

			function updateThumbnailActiveState(activeIndex) {
				// Remove active class from all thumbnails
				document.querySelectorAll('.thumbnail-container .img-thumbnail').forEach(function(thumb) {
					thumb.classList.remove('active');
				});
				// Add active class to current thumbnail
				var activeThumb = document.getElementById('thumb-' + activeIndex);
				if (activeThumb) {
					activeThumb.classList.add('active');
				}
			}
		</script>

	</body>
</html>