<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{$page->meta_title}}</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="{{$page->meta_description}}">
		<meta name="keywords" content="{{$page->meta_keywords}}">
		<meta property="og:url" content="{{route('contact')}}">
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

			<!-- Contact Us -->
			<section class="contact-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-12">
							<div class="section-inner-header contact-inner-header">
								<h6>Get in touch</h6>
								<h2>Have Any Question?</h2>
							</div>
							<div class="card contact-card">
								<div class="card-body">
									<div class="contact-icon">
										<i class="isax isax-location5"></i>
									</div>
									<div class="contact-details">
										<h4>Address</h4>
										<p>{{ getSetting()->primary_address }}</p>
									</div>
								</div>
							</div>
							<div class="card contact-card">
								<div class="card-body">
									<div class="contact-icon">
										<i class="isax isax-call5"></i>
									</div>
									<div class="contact-details">
										<h4>Phone Number</h4>
										<p>{{ getSetting()->primary_contact }}</p>
									</div>
								</div>
							</div>
							<div class="card contact-card">
								<div class="card-body">
									<div class="contact-icon">
										<i class="isax isax-sms5"></i>
									</div>
									<div class="contact-details">
										<h4>Email Address</h4>
										<p>{{ getSetting()->primary_email }}</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-7 col-md-12 d-flex">
							<div class="card contact-form-card w-100">
								<div class="card-body">
									@if(session('success'))
										<div class="alert alert-success">{{ session('success') }}</div>
									@endif
									<form action="{{route('enquiry')}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">Name</label>
													<input type="text" class="form-control" name="name" value="{{ old('name') }}">
													@if($errors->has('name'))
														<span class="text-danger">{{ $errors->first('name') }}</span>
													@endif
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">Email</label>
													<input type="email" class="form-control" name="email" value="{{ old('email') }}">
													@if($errors->has('email'))
														<span class="text-danger">{{ $errors->first('email') }}</span>
													@endif
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">Phone Number</label>
													<input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
													@if($errors->has('phone'))
														<span class="text-danger">{{ $errors->first('phone') }}</span>
													@endif
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">Subject</label>
													<input type="text" class="form-control" name="subject" value="{{ old('subject') }}">
													@if($errors->has('subject'))
														<span class="text-danger">{{ $errors->first('subject') }}</span>
													@endif
												</div>
											</div>
											<div class="col-md-12">
												<div class="mb-3">
													<label class="form-label">Message</label>
													<textarea class="form-control" rows="6" name="message">{{ old('message') }}</textarea>
													@if($errors->has('message'))
														<span class="text-danger">{{ $errors->first('message') }}</span>
													@endif
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group-btn mb-0">
													<button type="submit" class="btn btn-primary-gradient">Send Message</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Contact Us -->

			<!-- Contact Map -->
			<div class="contact-map d-flex">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.7301009561315!2d-76.13077892422932!3d36.82498697224007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89bae976cfe9f8af%3A0xa61eac05156fbdb9!2sBeachStreet%20USA!5e0!3m2!1sen!2sin!4v1669777904208!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<!-- /Contact Map -->
   
			@include('frontend.layouts.footer')
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{url('/')}}/assets/frontend/js/jquery-3.7.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{url('/')}}/assets/frontend/js/bootstrap.bundle.min.js"></script>
		
		<!-- Daterangepikcer JS -->
		<script src="{{url('/')}}/assets/frontend/js/moment.min.js"></script>
		<script src="{{url('/')}}/assets/frontend/plugins/daterangepicker/daterangepicker.js"></script>
		
		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/frontend/js/script.js"></script>
		@if(!empty($page->scripts))
		<script>
			{!! $page->scripts !!}
		</script>
		@endif

	</body>
</html>