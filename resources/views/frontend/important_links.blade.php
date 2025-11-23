<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{$page->meta_title}}</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="{{$page->meta_description}}">
		<meta name="keywords" content="{{$page->meta_keywords}}">
		<meta property="og:url" content="{{route('important.links')}}">
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

			<!-- Page Content -->
			<div class="content doctor-content">
				<div class="container">
					<div class="row">

						<!-- Important Links -->
						<div class="col-12">

							<div class="dashboard-header">
								<h3>{{$page->title}}</h3>
								<ul class="header-list-btns">
									<li>
										<div class="input-block dash-search-input">
											<form method="GET" action="{{ route('important.links') }}" class="d-flex">
												<input type="text" name="search" class="form-control" placeholder="Search by title" value="{{ request('search') }}">
												<button type="submit" class="btn btn-primary ms-2"><i class="isax isax-search-normal"></i></button>
											</form>
										</div>
									</li>
								</ul>
							</div>

								<div class="custom-table">
									<div class="table-responsive">
										<table class="table table-center mb-0">
											<thead>
												<tr>
													<th>SR No.</th>
													<th>Title</th>
													<th>Link</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody>
												@if($importantLinks->isEmpty())
													<tr>
														<td colspan="4" class="text-center">No important links found.</td>
													</tr>
												@else
													@foreach($importantLinks as $link)
													<tr>
														<td>{{ $loop->iteration + ($importantLinks->currentPage()-1)*$importantLinks->perPage() }}</td>
														<td>{{ $link->title }}</td>
														<td>
															<div class="action-item">
																@if($link->link)
																	<a href="{{ $link->link }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $link->link }}">
																		<i class="isax isax-link-2"></i>
																	</a>
																	<a href="javascript:void(0);" onclick="copyToClipboard('{{ $link->link }}')" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy link">
																		<i class="isax isax-copy"></i>
																	</a>
																@else
																	N/A
																@endif
															</div>
														</td>
														<td>{{ $link->created_at->format('d-M-Y') }}</td>
													</tr>
													@endforeach
												@endif
											</tbody>
										</table>
									</div>
								</div>

								<!-- Pagination -->
								<x-pagination :paginator="$importantLinks" />
								<!-- /Pagination -->

						</div>
						<!-- /Important Links -->

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

		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/frontend/js/script.js"></script>

		<script>
		// Initialize tooltips
		document.addEventListener('DOMContentLoaded', function () {
			var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
			var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
				return new bootstrap.Tooltip(tooltipTriggerEl);
			});
		});

		// Copy to clipboard function
		function copyToClipboard(text) {
			navigator.clipboard.writeText(text).then(function() {
				// Show success message (you can customize this)
				alert('Link copied to clipboard!');
			}, function(err) {
				console.error('Could not copy text: ', err);
				// Fallback for older browsers
				var textArea = document.createElement("textarea");
				textArea.value = text;
				document.body.appendChild(textArea);
				textArea.focus();
				textArea.select();
				try {
					document.execCommand('copy');
					alert('Link copied to clipboard!');
				} catch (err) {
					console.error('Fallback: Could not copy text: ', err);
				}
				document.body.removeChild(textArea);
			});
		}
		</script>

	</body>
</html>