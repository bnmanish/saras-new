<!DOCTYPE html> 
<html lang="en">
	<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<title>Doccure</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{url('/')}}/assets/frontend/img/favicon.png" type="image/x-icon">

		<!-- Apple Touch Icon -->
		<link rel="apple-touch-icon" sizes="180x180" href="{{url('/')}}/assets/frontend/img/apple-touch-icon.png">

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
									<li class="breadcrumb-item"><a href="index.html"><i class="isax isax-home-15"></i></a></li>
									<li class="breadcrumb-item" aria-current="page">Pharmacy</li>
									<li class="breadcrumb-item active">Pain Relief</li>
								</ol>
								<h2 class="breadcrumb-title">Pain Relief</h2>
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

			<!-- Category Tabs -->
			<div class="container">
				<div class="row">
					<div class="col-12">
							<ul class="nav nav-tabs" id="productTabs" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
								</li>
								@foreach($categories as $category)
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="category-{{ $category->id }}-tab" data-bs-toggle="tab" href="#category-{{ $category->id }}" role="tab" aria-controls="category-{{ $category->id }}" aria-selected="false">{{ $category->title }}</a>
								</li>
								@endforeach
							</ul>
					</div>
				</div>
			</div>
			<!-- /Category Tabs -->

		  	<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-12">

							<div class="tab-content" id="productTabsContent">
								<!-- All Products Tab -->
								<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
									<div class="row align-items-center pb-3">
										<div class="col-md-4 col-12 d-md-block d-none custom-short-by">
											<h3 class="title pharmacy-title fs-24 mb-2">All Products</h3>
											<span class="sort-title">Showing {{ $products->count() }} products</span>
										</div>
									</div>

									<div class="row product-list">
										@foreach($products as $product)
										<div class="col-md-12 col-lg-4 col-xl-4 product-custom">
											<div class="profile-widget w-100">
												<div class="doc-img">
													<a href="#" tabindex="-1">
														<img class="img-fluid" alt="Product image" src="{{ $product->primaryImage ? asset('storage/' . $product->primaryImage->image_path) : asset('assets/frontend/img/products/product.jpg') }}">
													</a>
													<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
														<i class="far fa-bookmark"></i>
													</a>
												</div>
												<div class="pro-content">
													<h3 class="title">
														<a href="#" tabindex="-1">{{ $product->name }}</a>
													</h3>
													<div class="row align-items-center">
														<div class="col-lg-6 d-flex">
															<span class="price me-2">${{ $product->price }}</span>
															@if($product->pack_size)
															<span class="price-strike">{{ $product->pack_size }}</span>
															@endif
														</div>
														<div class="col-lg-6 text-end">
															<a href="#" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
										@endforeach
									</div>
									<div class="col-md-12 text-center">
										<a href="#" class="btn book-btn1 mb-4">Load More</a>
									</div>
								</div>

								<!-- Category Tabs -->
								@foreach($categories as $category)
								<div class="tab-pane fade" id="category-{{ $category->id }}" role="tabpanel" aria-labelledby="category-{{ $category->id }}-tab">
									<div class="row align-items-center pb-3">
										<div class="col-md-4 col-12 d-md-block d-none custom-short-by">
											<h3 class="title pharmacy-title fs-24 mb-2">{{ $category->title }}</h3>
											<span class="sort-title">Showing 0 products</span>
										</div>
									</div>

									<div class="row product-list">
										<!-- Products will be loaded here via AJAX -->
									</div>
									<div class="col-md-12 text-center">
										<a href="#" class="btn book-btn1 mb-4">Load More</a>
									</div>
								</div>
								@endforeach
							</div>

						</div>
					</div>
				</div>
			</div>
		
			
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
			function loadProducts(categoryId = null, targetPane = '#all') {
				$.get('/products', {category: categoryId}, function(data) {
					var html = '';
					data.forEach(function(product) {
						var imageSrc = product.primary_image ? '/storage/' + product.primary_image.image_path : '/assets/frontend/img/products/product.jpg';
						html += '<div class="col-md-12 col-lg-4 col-xl-4 product-custom">';
						html += '<div class="profile-widget w-100">';
						html += '<div class="doc-img">';
						html += '<a href="#" tabindex="-1">';
						html += '<img class="img-fluid" alt="Product image" src="' + imageSrc + '">';
						html += '</a>';
						html += '<a href="javascript:void(0)" class="fav-btn" tabindex="-1">';
						html += '<i class="far fa-bookmark"></i>';
						html += '</a>';
						html += '</div>';
						html += '<div class="pro-content">';
						html += '<h3 class="title">';
						html += '<a href="#" tabindex="-1">' + product.name + '</a>';
						html += '</h3>';
						html += '<div class="row align-items-center">';
						html += '<div class="col-lg-6 d-flex">';
						html += '<span class="price me-2">$' + product.price + '</span>';
						if (product.pack_size) {
							html += '<span class="price-strike">' + product.pack_size + '</span>';
						}
						html += '</div>';
						html += '<div class="col-lg-6 text-end">';
						html += '<a href="#" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>';
						html += '</div>';
						html += '</div>';
						html += '</div>';
						html += '</div>';
						html += '</div>';
					});
					$(targetPane + ' .product-list').html(html);
					var count = data.length;
					$(targetPane + ' .sort-title').first().text('Showing ' + count + ' products');
				});
			}

			$(document).ready(function() {
				$('#productTabs a').on('click', function(e) {
					e.preventDefault();
					$('#productTabs a').removeClass('active');
					$(this).addClass('active');
					var target = $(this).attr('href');
					var categoryName = $(this).text();
					$(target + ' .pharmacy-title').text(categoryName);
					if (target === '#all') {
						loadProducts(null, '#all');
					} else {
						var categoryId = target.replace('#category-', '');
						loadProducts(categoryId, target);
					}
				});
			});
		</script>

	</body>
</html>