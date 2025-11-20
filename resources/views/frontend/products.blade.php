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

							    <!-- ALL PRODUCTS TAB -->
							    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
							        <div class="row product-list">
							            @if($products->isEmpty())
							                <div class="col-12 text-center py-5">
							                    <h5>No products found</h5>
							                </div>
							            @else
							                @foreach($products as $product)
							                    <div class="col-md-12 col-lg-3 product-custom">
							                        <div class="profile-widget w-100">
							                            <div class="doc-img">
							                                <a href="#">
							                                    @if($product->primaryImage)
							                                        <img class="img-fluid" alt="{{ $product->name }}"
							                                             src="{{ asset('uploads/product/'.$product->primaryImage->image) }}">
							                                    @endif
							                                </a>
							                            </div>

                            <div class="pro-content">
                                <h3 class="title">{{ $product->name }} ({{ $product->category->title ?? 'N/A' }})</h3>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <div>
                                        <span class="h5 text-success fw-bold">₹{{ $product->price }}</span>
                                        @if($product->pack_size)
                                            <span class="text-muted ms-2"><i class="fas fa-box me-1"></i>{{ $product->pack_size }}</span>
                                        @endif
                                    </div>
                                    <small class="text-muted">{{ Str::limit($product->description ?? '', 50) }}</small>
                                </div>
                            </div>

							                        </div>
							                    </div>
							                @endforeach
							            @endif
							        </div>
							    </div>


							    <!-- CATEGORY TABS CONTENT -->
							    @foreach($categories as $category)
							        <div class="tab-pane fade" 
							             id="category-{{ $category->id }}" 
							             role="tabpanel" 
							             aria-labelledby="category-{{ $category->id }}-tab">

							            <div class="row product-list">

							                @php
							                    $filteredProducts = $products->where('category_id', $category->id);
							                @endphp

							                @if($filteredProducts->isEmpty())
							                    <div class="col-12 text-center py-5">
							                        <h5>No products found</h5>
							                    </div>
							                @else
							                    @foreach($filteredProducts as $product)
							                        <div class="col-md-12 col-lg-3 product-custom">
							                            <div class="profile-widget w-100">

							                                <div class="doc-img">
							                                    <a href="#">
							                                        @if($product->primaryImage)
							                                            <img class="img-fluid" alt="{{ $product->name }}"
							                                                 src="{{ asset('uploads/product/'.$product->primaryImage->image) }}">
							                                        @endif
							                                    </a>
							                                </div>

                                <div class="pro-content">
                                    <h3 class="title">{{ $product->name }} ({{ $product->category->title ?? 'N/A' }})</h3>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <div>
                                            <span class="h5 text-success fw-bold">₹{{ $product->price }}</span>
                                            @if($product->pack_size)
                                                <span class="text-muted ms-2"><i class="fas fa-box me-1"></i>{{ $product->pack_size }}</span>
                                            @endif
                                        </div>
                                        <small class="text-muted">{{ Str::limit($product->description ?? '', 50) }}</small>
                                    </div>
                                </div>

							                            </div>
							                        </div>
							                    @endforeach
							                @endif

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

	</body>
</html>