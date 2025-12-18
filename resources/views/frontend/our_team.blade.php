<!DOCTYPE html> 
<html lang="en">
	<head>
		<title>{{$page->meta_title}}</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="{{$page->meta_description}}">
		<meta name="keywords" content="{{$page->meta_keywords}}">
		<meta property="og:url" content="{{route('our.team')}}">
		<meta property="og:type" content="website">
		<meta property="og:title" content="{{$page->meta_title}}">
		<meta property="og:description" content="{{$page->meta_description}}">
		<meta name="twitter:card" content="summary_large_image">
		<meta property="twitter:domain" content="{{route('our.team')}}">
		<meta name="twitter:title" content="{{$page->meta_title}}">
		<meta name="twitter:description" content="{{$page->meta_description}}">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{url('uploads/setting/'.getSetting()->favicon)}}" type="image/x-icon">

		<!-- Apple Touch Icon -->
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

		<!-- select CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/frontend/plugins/select2/css/select2.min.css">

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
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					@if($teamMembers->isEmpty())
						<div class="row">
							<div class="col-12 text-center py-5">
								<div class="no-data-found">
									<i class="fas fa-users fa-3x text-muted mb-3"></i>
									<h4 class="text-muted">No Team Members Found</h4>
									<p class="text-muted">Check back later for our team updates.</p>
								</div>
							</div>
						</div>
					@else
						<div class="row">
							@foreach($teamMembers as $member)
							<div class="col-lg-4 col-xl-3">
								<!-- Profile Sidebar -->
								<div class="profile-sidebar doctor-sidebar profile-sidebar-new">
									<div class="widget-profile pro-widget-content">
										<div class="profile-info-widget">
											<a href="javascript:;" class="booking-doc-img">
												@if($member->photo)
													<img src="{{ url('uploads/our_team/'.$member->photo) }}" alt="{{ $member->name }}" class="img-fluid w-100">
												@else
													<img src="{{ url('/assets/frontend/img/default-doctor.jpg') }}" alt="{{ $member->name }}" class="img-fluid w-100">
												@endif
											</a>
											<div class="profile-det-info">
												<h3><a href="javascript:;">{{ $member->name }}</a></h3>
												<span class="badge doctor-role-badge"><i class="fa-solid fa-circle"></i>{{ $member->designation }}</span>
												@if($member->short_bio)
												<div class="text-justify">
													<p class="card-text text-dark small mt-2">{!!$member->short_bio!!}</p>
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
					@endif

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