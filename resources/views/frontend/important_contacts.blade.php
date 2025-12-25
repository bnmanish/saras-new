<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{$page->meta_title}}</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="{{$page->meta_description}}">
		<meta name="keywords" content="{{$page->meta_keywords}}">
		<meta property="og:url" content="{{route('important.contacts')}}">
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

		<style>
			.contact-card {
				background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
				border-radius: 12px;
				padding: 1.2rem;
				color: white;
				position: relative;
				transition: all 0.3s ease;
				height: 100%;
				box-shadow: 0 4px 15px rgba(0,0,0,0.1);
			}
			.contact-card:hover {
				transform: translateY(-3px);
				box-shadow: 0 8px 25px rgba(0,0,0,0.2);
			}
			.contact-avatar {
				width: 50px;
				height: 50px;
				background: rgba(255,255,255,0.2);
				border-radius: 50%;
				display: flex;
				align-items: center;
				justify-content: center;
				margin-bottom: 0.8rem;
				font-size: 1.2rem;
				font-weight: bold;
			}
			.contact-name {
				font-size: 1.1rem;
				font-weight: bold;
				margin-bottom: 0.3rem;
			}
			.contact-designation {
				font-size: 0.85rem;
				opacity: 0.9;
				margin-bottom: 0.8rem;
			}
			.contact-details {
				border-top: 1px solid rgba(255,255,255,0.2);
				padding-top: 0.6rem;
			}
			.contact-item {
				display: flex;
				align-items: center;
				margin-bottom: 0.4rem;
				font-size: 0.8rem;
			}
			.contact-item i {
				margin-right: 0.5rem;
				width: 16px;
				text-align: center;
				font-size: 0.75rem;
			}
			.contact-item a {
				color: white;
				text-decoration: none;
				transition: opacity 0.2s ease;
			}
			.contact-item a:hover {
				opacity: 0.8;
				text-decoration: underline;
			}
			.no-contacts {
				text-align: center;
				padding: 3rem 2rem;
				color: #6c757d;
			}
			.no-contacts i {
				font-size: 3rem;
				margin-bottom: 1rem;
				opacity: 0.5;
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
					<!-- Contacts Grid -->
					@if($importantContacts->isEmpty())
						<div class="no-contacts">
							<i class="fas fa-address-book"></i>
							<h4>No Important Contacts Found</h4>
							<p>Please check back later.</p>
						</div>
					@else
						<div class="row g-3">
							@foreach($importantContacts as $contact)
								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="contact-card">
										<div class="contact-avatar">
											{{ substr($contact->name, 0, 2) }}
										</div>
										<div class="contact-name">{{ $contact->name }}</div>
										<div class="contact-designation">{{ $contact->designation }}</div>
										<div class="contact-details">
											@if($contact->mobile_number)
												<div class="contact-item">
													<i class="fas fa-mobile-alt"></i>
													<a href="tel:{{ $contact->mobile_number }}">{{ $contact->mobile_number }}</a>
												</div>
											@endif
											@if($contact->landline)
												<div class="contact-item">
													<i class="fas fa-phone"></i>
													<span>{{ $contact->landline }}</span>
												</div>
											@endif
										</div>
									</div>
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

		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/frontend/js/script.js"></script>

		
	</body>
</html>