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
			
		  	<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-5 col-lg-3 col-xl-3 theiaStickySidebar">
							
							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Filter</h4>
								</div>
								<div class="card-body">
								<!-- <div class="filter-widget">
									<div class="cal-icon">
										<input type="text" class="form-control datetimepicker" placeholder="Select Date">
									</div>			
								</div> -->
								<div class="filter-widget">
									<h4>Categories</h4>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type" checked>
											<span class="checkmark"></span> Family Care
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type">
											<span class="checkmark"></span> Skin Care
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type">
											<span class="checkmark"></span> Hair Care
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type">
											<span class="checkmark"></span> Lip Care
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type">
											<span class="checkmark"></span> Men's Care
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type">
											<span class="checkmark"></span> Women's Care
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type">
											<span class="checkmark"></span> Baby care
										</label>
									</div>
								</div>
									<div class="btn-search">
										<button type="button" class="btn w-100">Search</button>
									</div>	
								</div>
							</div>
							<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-7 col-lg-9 col-xl-9">

							<div class="row align-items-center pb-3">	
								<div class="col-md-4 col-12 d-md-block d-none custom-short-by">
									<h3 class="title pharmacy-title fs-24 mb-2">Medlife Medical</h3>
									<p class="doc-location mb-2 text-ellipse pharmacy-location"><i class="isax isax-location5 me-1"></i> 96 Red Hawk Road Cyrus, MN 56323 </p>
									<span class="sort-title">Showing 6 of 98 products</span>
								</div>
								<div class="col-md-8 col-12 d-md-block d-none custom-short-by">
									<div class="sort-by pb-3">
										<span class="sort-title">Sort by</span>
										<span class="sortby-fliter">
											<select class="form-select">
												<option>Select</option>
												<option class="sorting">Rating</option>
												<option class="sorting">Popular</option>
												<option class="sorting">Latest</option>
												<option class="sorting">Free</option>
											</select>
										</span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">Benzaxapine Croplex</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6 d-flex">
													<span class="price me-2">$19.00</span>
													<span class="price-strike">$45.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                            	<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product13.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">Rapalac Neuronium</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6">
													<span class="price">$16.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                             	<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product1.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">Ombinazol Bonibamol</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6">
													<span class="price">$22.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                             	<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product2.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">Dantotate Dantodazole</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6 d-flex">
													<span class="price me-2">$10.00</span>
													<span class="price-strike">$12.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                            	<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product12.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">Acetrace Amionel</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6">
													<span class="price">$7.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                            	<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product11.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">Ergorinex Caffeigestin</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6">
													<span class="price">$15.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                           	 	<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product3.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">Alispirox Aerorenone</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6">
													<span class="price">$26.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                            	<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product10.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">Lysofranil Dorzostin</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6 d-flex">
													<span class="price me-2">$10.00</span>
													<span class="price-strike">$12.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                            	<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product4.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">Nitrolozin Zithrotropin</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6">
													<span class="price">$12.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                            	<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product14.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">Cordacriptine Mardipine</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6">
													<span class="price">$9.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                            	<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product5.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">Iconevist Ampyplex</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6">
													<span class="price">$16.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                            	<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product6.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">Alcafsteride Omebide</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6">
													<span class="price">$7.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                            	<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product15.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">Neubide Aborase</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6">
													<span class="price">$30.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                            	<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product7.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">ITONE eye drops 10ml</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6">
													<span class="price">$50.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                            	<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="product-description.html" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{url('/')}}/assets/frontend/img/products/product8.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="product-description.html" tabindex="-1">Antatriene Drospiletra</a> 
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6 d-flex">
													<span class="price me-2">$10.00</span>
													<span class="price-strike">$20.00</span>
												</div>
												<div class="col-lg-6 text-end">
													<a href="cart.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
												</div>
											</div>
										</div>
									</div>		
                            	</div>

                             </div>
                             <div class="col-md-12 text-center">
                             	<a href="#" class="btn book-btn1 mb-4">Load More</a>
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
		
	</body>
</html>