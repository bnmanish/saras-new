<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{$page->meta_title}}</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="{{$page->meta_description}}">
		<meta name="keywords" content="{{$page->meta_keywords}}">
		<meta property="og:url" content="{{route('chairman.message')}}">
		<meta property="og:type" content="website">
		<meta property="og:title" content="{{$page->meta_title}}">
		<meta property="og:description" content="{{$page->meta_description}}">
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

			<!-- Category Tabs -->
			<div class="container">
				<div class="row">
					<div class="col-12">
							<ul class="nav nav-tabs" id="productTabs" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link {{ !$activeCategory ? 'active' : '' }}" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="{{ !$activeCategory ? 'true' : 'false' }}">All</a>
								</li>
								@foreach($categories as $category)
								<li class="nav-item" role="presentation">
									<a class="nav-link {{ $activeCategory == $category->slug ? 'active' : '' }}" id="category-{{ $category->slug }}-tab" data-bs-toggle="tab" href="#category-{{ $category->slug }}" role="tab" aria-controls="category-{{ $category->slug }}" aria-selected="{{ $activeCategory == $category->slug ? 'true' : 'false' }}">{{ $category->title }}</a>
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
							    <div class="tab-pane fade {{ !$activeCategory ? 'show active' : '' }}" id="all" role="tabpanel" aria-labelledby="all-tab">
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
							                                <a href="{{route('products.details',$product->slug)}}">
							                                    @if($product->primaryImage)
							                                        <img class="img-fluid" alt="{{ $product->name }}"
							                                             src="{{ asset('uploads/product/'.$product->primaryImage->image) }}">
							                                    @endif
							                                </a>
							                            </div>

							                            <div class="pro-content">
							                                <a href="{{route('products.details',$product->slug)}}"><h3 class="title">{{ $product->name }} ({{ $product->category->title ?? 'N/A' }})</h3></a>
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
							        <div class="tab-pane fade {{ $activeCategory == $category->slug ? 'show active' : '' }}"
							             id="category-{{ $category->slug }}"
							             role="tabpanel"
							             aria-labelledby="category-{{ $category->slug }}-tab">

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
							                                    <a href="{{route('products.details',$product->slug)}}">
							                                        @if($product->primaryImage)
							                                            <img class="img-fluid" alt="{{ $product->name }}"
							                                                 src="{{ asset('uploads/product/'.$product->primaryImage->image) }}">
							                                        @endif
							                                    </a>
							                                </div>

                                <div class="pro-content">
                                	<a href="{{route('products.details',$product->slug)}}">
                                    	<h3 class="title">{{ $product->name }} ({{ $product->category->title ?? 'N/A' }})</h3>
                                	</a>
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
		@if(!empty($page->scripts))
		<script>
			{!! $page->scripts !!}
		</script>
		@endif

	</body>
</html>