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
				width: 40%;
			}
			@media (max-width: 576px) {
				.product-description .doctor-img1 {
					width: 100%;
				}
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
						<div class="col-md-12">
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

						</div>

					</div>

					

				</div>
			</div>		
			<!-- /Page Content -->
   
			@include('frontend.layouts.footer')
		   
		</div>
		<!-- /Main Wrapper -->
		
		<!-- Voice Call Modal -->
		<div class="modal fade call-modal" id="voice_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<!-- Outgoing Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img alt="User Image" src="{{url('/')}}/assets/frontend/img/doctors/doctor-thumb-02.jpg" class="call-avatar">
										<h4>Dr. Darren Elder</h4>
										<span>Connecting...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-bs-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<a href="voice-call.html" class="btn call-item call-start"><i class="material-icons">call</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Outgoing Call -->

					</div>
				</div>
			</div>
		</div>
		<!-- /Voice Call Modal -->
		
		<!-- Video Call Modal -->
		<div class="modal fade call-modal" id="video_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
					
						<!-- Incoming Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img class="call-avatar" src="{{url('/')}}/assets/frontend/img/doctors/doctor-thumb-02.jpg" alt="User Image">
										<h4>Dr. Darren Elder</h4>
										<span>Calling ...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-bs-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<a href="video-call.html" class="btn call-item call-start"><i class="material-icons">videocam</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Incoming Call -->
						
					</div>
				</div>
			</div>
		</div>
		<!-- Video Call Modal -->
		
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