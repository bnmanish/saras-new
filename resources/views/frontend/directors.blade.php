<!DOCTYPE html> 
<html lang="en">
	<head>

		<meta charset="utf-8">
		<title>Doccure</title>
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

		<!-- select CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/plugins/select2/css/select2.min.css">

		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="{{url('/')}}/assets/frontend/css/feather.css">
		
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
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						@foreach($directors as $director)
						<div class="col-lg-4 col-xl-3">
							<!-- Profile Sidebar -->
							<div class="profile-sidebar doctor-sidebar profile-sidebar-new">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="javascript:;" class="booking-doc-img">
											<img src="{{ url('uploads/director/'.$director->image) }}" alt="{{ $director->name }}" class="img-fluid w-100">
										</a>
										<div class="profile-det-info">
											<h3><a href="javascript:;">{{ $director->name }}</a></h3>
											<span class="badge doctor-role-badge"><i class="fa-solid fa-circle"></i>{{ $director->position }}</span>
											@if($director->message)
											<div class="text-justify">
												<p class="card-text text-dark small mt-2 ">{!!$director->message!!}</p>
											</div>
											@endif
										</div>
									</div>
								</div>
							</div>
							<!-- /Profile Sidebar -->
						</div>
						@endforeach
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

		<!-- select JS -->
		<script src="{{url('/')}}/assets/frontend/plugins/select2/js/select2.min.js"></script>

		<!-- Apexchart JS -->
		<script src="{{url('/')}}/assets/frontend/plugins/apex/apexcharts.min.js"></script>
		<script src="{{url('/')}}/assets/frontend/plugins/apex/chart-data.js"></script>
		
		<!-- Circle Progress JS -->
		<script src="{{url('/')}}/assets/frontend/js/circle-progress.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/frontend/js/script.js"></script>
		
	</body>
</html>