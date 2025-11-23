<div class="header-topbar">
	<div class="container">
		<div class="topbar-info">
			<div class="d-flex align-items-center gap-3 header-info">
				<p><i class="isax isax-message-text5 me-1"></i>info@example.com</p>
				<p><i class="isax isax-call5 me-1"></i>+1 66589 14556</p>
			</div>
			<ul>
				<li class="header-theme">
					<a href="javascript:void(0);" id="dark-mode-toggle" class="theme-toggle">
						<i class="isax isax-sun-1"></i>
					</a>
					<a href="javascript:void(0);" id="light-mode-toggle" class="theme-toggle activate">
						<i class="isax isax-moon"></i>
					</a>
				</li>
				<li class="d-inline-flex align-items-center drop-header">
					<div class="dropdown dropdown-country me-3">
						<a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{url('/')}}/assets/frontend/img/flags/us-flag.svg" class="me-2" alt="flag">
						</a>
						<ul class="dropdown-menu p-2 mt-2">
							<li>
								<a class="dropdown-item rounded d-flex align-items-center" href="javascript:void(0);">
									<img src="{{url('/')}}/assets/frontend/img/flags/us-flag.svg" class="me-2" alt="flag">ENG
								</a>
							</li>
							<li>
								<a class="dropdown-item rounded d-flex align-items-center" href="javascript:void(0);">
									<img src="{{url('/')}}/assets/frontend/img/flags/arab-flag.svg" class="me-2" alt="flag">ARA
								</a>
							</li>
							<li>
								<a class="dropdown-item rounded d-flex align-items-center" href="javascript:void(0);">
									<img src="{{url('/')}}/assets/frontend/img/flags/france-flag.svg" class="me-2" alt="flag">FRA
								</a>
							</li>
						</ul>
					</div>
					<div class="dropdown dropdown-amt">
						<a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							USD
						</a>
						<ul class="dropdown-menu p-2 mt-2">
							<li><a class="dropdown-item rounded" href="javascript:void(0);">USD</a></li>
							<li><a class="dropdown-item rounded" href="javascript:void(0);">YEN</a></li>
							<li><a class="dropdown-item rounded" href="javascript:void(0);">EURO</a></li>
						</ul>
					</div>
				</li>
				<li class="social-header">
					<div class="social-icon">
						<a href="javascript:void(0);"><i class="fa-brands fa-facebook"></i></a>
						<a href="javascript:void(0);"><i class="fa-brands fa-x-twitter"></i></a>
						<a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
						<a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
						<a href="javascript:void(0);"><i class="fa-brands fa-pinterest"></i></a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>

<!-- Header -->
<header class="header header-custom header-fixed inner-header relative">
	<div class="container">
		<nav class="navbar navbar-expand-lg header-nav">
			<div class="navbar-header">
				<a id="mobile_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>
				<a href="{{route('home')}}" class="navbar-brand logo">
					<img src="{{url('/')}}/assets/frontend/img/logo.svg" class="img-fluid" alt="Logo">
				</a>
			</div>
			<div class="header-menu">
				<div class="main-menu-wrapper">
					<div class="menu-header">
						<a href="{{route('home')}}" class="menu-logo">
							<img src="{{url('/')}}/assets/frontend/img/logo.svg" class="img-fluid" alt="Logo">
						</a>
						<a id="menu_close" class="menu-close" href="javascript:void(0);">
							<i class="fas fa-times"></i>
						</a>
					</div>
					<ul class="main-nav">
						<li class="has-submenu megamenu active">
							<a href="{{route('home')}}">Home</a>
						</li>
						<li class="has-submenu">
							<a href="javascript:void(0);">About Us <i class="fas fa-chevron-down"></i></a>
							<ul class="submenu">
								<li><a href="{{route('about.us')}}">About Us</a></li>
								<li><a href="{{ route('chairman.message') }}">Chairman Message</a></li>
                                <li><a href="{{ route('md.message') }}">MD Message</a></li>
                                <li><a href="{{ route('awards') }}">Awards</a></li>
							</ul>
						</li>

						<li class="has-submenu megamenu">
							<a href="{{route('directors')}}">Profiles</a>
						</li>

						<li class="has-submenu megamenu">
							<a href="{{route('products')}}">Products</a>
						</li>

						<li class="has-submenu">
							<a href="javascript:void(0);">Informations <i class="fas fa-chevron-down"></i></a>
							<ul class="submenu">
								<li><a href="{{route('tenders')}}">Tenders</a></li>
								<li><a href="{{route('milk.purchase.price.chart')}}">Milk Purchase Price Chart</a></li>
								<li><a href="{{route('milk.sale.price.chart')}}">Milk Sale Price Chart</a></li>
								<li><a href="{{route('beneficiaries')}}">Beneficiaries Under CM Sambal Yojna</a></li>
							</ul>
						</li>
						<li><a href="{{route('quality.assurance')}}">Quality Assurance</a></li>
						<li><a href="{{route('important.links')}}">Important Links</a></li>
						<li class="has-submenu megamenu">
							<a href="{{route('gallery')}}">Gallery</a>
						</li>

						
					</ul>
				</div>
			</div>
		</nav>
	</div>
</header>
<!-- /Header -->