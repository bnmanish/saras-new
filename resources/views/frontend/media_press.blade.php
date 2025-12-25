<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{$page ? $page->meta_title : 'Media & Press | Saras'}}</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="{{$page ? $page->meta_description : 'Media & Press releases from Saras'}}">
		<meta name="keywords" content="{{$page ? $page->meta_keywords : 'media, press, news, saras'}}">
		<meta property="og:url" content="{{route('media.press')}}">
		<meta property="og:type" content="website">
		<meta property="og:title" content="{{$page ? $page->meta_title : 'Media & Press | Saras'}}">
		<meta property="og:description" content="{{$page ? $page->meta_description : 'Media & Press releases from Saras'}}">
		<meta name="twitter:title" content="{{$page ? $page->meta_title : 'Media & Press | Saras'}}">
		<meta name="twitter:description" content="{{$page ? $page->meta_description : 'Media & Press releases from Saras'}}">
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
								<li class="breadcrumb-item active">{{$page ? $page->title : 'Media & Press'}}</li>
							</ol>
							<h2 class="breadcrumb-title">{{$page ? $page->title : 'Media & Press'}}</h2>
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

					<!-- Media Press List -->
					<div class="col-12">

						<div class="dashboard-header">
							<h3>{{$page ? $page->title : 'Media & Press'}}</h3>
							<ul class="header-list-btns">
								<li>
									<div class="input-block dash-search-input">
										<form method="GET" action="{{ route('media.press') }}" class="d-flex">
											<input type="text" name="search" class="form-control" placeholder="Search by title" value="{{ request('search') }}">
											<button type="submit" class="btn btn-primary ms-2"><i class="isax isax-search-normal"></i></button>
										</form>
									</div>
								</li>
							</ul>
						</div>

						@if($mediaPress->isEmpty())
							<div class="alert alert-info text-center">
								<p>No media/press releases found.</p>
							</div>
						@else
							<div class="custom-table">
								<div class="table-responsive">
									<table class="table table-center mb-0">
										<thead>
											<tr>
												<th>SR No.</th>
												<th>Media & Press</th>
												<th>Date</th>
												<th>Image</th>
												<th>PDF/Link</th>
											</tr>
										</thead>
										<tbody>
											@foreach($mediaPress as $item)
											<tr>
												<td>{{ $loop->iteration + ($mediaPress->currentPage()-1)*$mediaPress->perPage() }}</td>
												<td>{{ $item->title }}</td>
												<td>{{ $item->date->format('d-M-Y') }}</td>
												<td>
													<div class="action-item">
														@if($item->image && isset($item->image_exists) && $item->image_exists)
															<a href="{{ url('uploads/media_press/'.$item->image) }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="View Image">
																<i class="isax isax-image"></i>
															</a>
														@else
															<span style="opacity: 0.3; cursor: not-allowed;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $item->image ? 'Image Not Available' : 'No Image Available' }}">
																<i class="isax isax-image"></i>
															</span>
														@endif
													</div>
												</td>
												<td>
													<div class="action-item">
														@if($item->pdf_or_link && isset($item->pdf_exists) && $item->pdf_exists)
															@if(strpos($item->pdf_or_link, 'http') === 0)
																<a href="{{ $item->pdf_or_link }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="View Link">
																	<i class="isax isax-link-2"></i>
																</a>
															@else
																<a href="{{ url('uploads/media_press/'.$item->pdf_or_link) }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="View PDF">
																	<i class="isax isax-document"></i>
																</a>
															@endif
														@else
															<span style="opacity: 0.3; cursor: not-allowed;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $item->pdf_or_link ? 'PDF/Link Not Available' : 'No PDF/Link Available' }}">
																<i class="isax isax-document"></i>
															</span>
														@endif
													</div>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						@endif

						<!-- Pagination -->
						<x-pagination :paginator="$mediaPress" />
						<!-- /Pagination -->
						
					</div>
					<!-- /Media Press List -->

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
	</script>

</body>
</html>

