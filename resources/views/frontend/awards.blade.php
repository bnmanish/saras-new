<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{$page->meta_title}}</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="{{$page->meta_description}}">
		<meta name="keywords" content="{{$page->meta_keywords}}">
		<meta name="author" content="Practo Clone HTML Template - Doctor Booking Template">
		<meta property="og:url" content="{{route('chairman.message')}}">
		<meta property="og:type" content="website">
		<meta property="og:title" content="{{$page->meta_title}}">
		<meta property="og:description" content="{{$page->meta_description}}">
		<meta property="og:image" content="{{url('/')}}/assets/frontend/img/preview-banner.jpg">
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

		<!-- Awards Custom CSS -->
		<style>
			.awards-section {
				padding: 60px 0;
				background-color: #f8f9fa;
			}
			.award-card {
				background: white;
				border-radius: 10px;
				box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
				overflow: hidden;
				transition: transform 0.3s ease, box-shadow 0.3s ease;
				margin-bottom: 20px;
			}
			.award-card:hover {
				transform: translateY(-5px);
				box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
			}
			.award-img {
				position: relative;
				height: 250px;
				overflow: hidden;
			}
			.award-img img {
				width: 100%;
				height: 100%;
				object-fit: cover;
			}
			.award-overlay {
				position: absolute;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				background: rgba(0, 0, 0, 0.7);
				display: flex;
				align-items: center;
				justify-content: center;
				opacity: 0;
				transition: opacity 0.3s ease;
			}
			.award-card:hover .award-overlay {
				opacity: 1;
			}
			.award-popup {
				color: white;
				font-size: 24px;
				text-decoration: none;
				padding: 10px;
				border-radius: 50%;
				background: rgba(255, 255, 255, 0.2);
				transition: background 0.3s ease;
			}
			.award-popup:hover {
				background: rgba(255, 255, 255, 0.4);
				color: white;
				text-decoration: none;
			}
			.award-content {
				padding: 20px;
				text-align: center;
			}
			.award-content h4 {
				margin-bottom: 10px;
				color: #333;
				font-size: 18px;
				font-weight: 600;
			}
			.award-content p {
				color: #666;
				font-size: 14px;
				margin: 0;
			}
			@media (max-width: 768px) {
				.award-img {
					height: 200px;
				}
				.awards-section {
					padding: 40px 0;
				}
			}
		</style>

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

		<!-- Awards Section -->
		<section class="awards-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-inner-header text-center">
							<h2>Our Awards & Achievements</h2>
							<p>Recognizing excellence and commitment to quality healthcare</p>
						</div>
					</div>
				</div>
				<div class="row">
					@forelse($awards as $award)
					<div class="col-lg-3 col-md-6 d-flex mb-4">
						<div class="award-card w-100">
							<div class="award-img">
								<img src="{{url('uploads/award/'.$award->image)}}" class="img-fluid" alt="{{ $award->title ?? 'Award' }}">
								<div class="award-overlay">
									<a href="{{url('uploads/award/'.$award->image)}}" class="award-popup" data-bs-toggle="modal" data-bs-target="#awardModal" data-image="{{url('uploads/award/'.$award->image)}}" data-title="{{ $award->title ?? 'Award' }}">
										<i class="fas fa-search-plus"></i>
									</a>
								</div>
							</div>
							<div class="award-content">
								<h4>{{ $award->title ?? 'Untitled Award' }}</h4>
								@if($award->short_description)
								<p>{{ $award->short_description }}</p>
								@endif
							</div>
						</div>
					</div>
					@empty
					<div class="col-12 text-center">
						<p>No awards available at the moment.</p>
					</div>
					@endforelse
				</div>
			</div>
		</section>
		<!-- /Awards Section -->

		<!-- Award Modal -->
		<div class="modal fade" id="awardModal" tabindex="-1" aria-labelledby="awardModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="awardModalLabel">Award Image</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body text-center">
						<img id="awardModalImage" src="" class="img-fluid" alt="Award">
					</div>
				</div>
			</div>
		</div>
		<!-- /Award Modal -->



		@include('frontend.layouts.footer')

		<!-- Cursor -->
		<div class="mouse-cursor cursor-outer"></div>
		<div class="mouse-cursor cursor-inner"></div>
		<!-- /Cursor -->

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="{{url('/')}}/assets/frontend/js/jquery-3.7.1.min.js"></script>

	<!-- Bootstrap Bundle JS -->
	<script src="{{url('/')}}/assets/frontend/js/bootstrap.bundle.min.js"></script>

	<!-- Feather Icon JS -->
	<script src="{{url('/')}}/assets/frontend/js/feather.min.js"></script>

	<!-- Slick JS -->
	<script src="{{url('/')}}/assets/frontend/js/slick.js"></script>

	<!-- Counter JS -->
	<script src="{{url('/')}}/assets/frontend/js/counter.js"></script>

	<!-- Custom JS -->
	<script src="{{url('/')}}/assets/frontend/js/script.js"></script>

	<!-- Awards Modal Script -->
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const awardModal = document.getElementById('awardModal');
			const awardModalImage = document.getElementById('awardModalImage');
			const awardModalLabel = document.getElementById('awardModalLabel');

			awardModal.addEventListener('show.bs.modal', function (event) {
				const button = event.relatedTarget;
				const imageSrc = button.getAttribute('data-image');
				const title = button.getAttribute('data-title');

				awardModalImage.src = imageSrc;
				awardModalLabel.textContent = title;
			});
		});
	</script>
	@if(!empty($page->scripts))
	<script>
		{!! $page->scripts !!}
	</script>
	@endif

</body>

</html>