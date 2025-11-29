<div class="header-topbar">
	<div class="container">
		<div class="topbar-info">
			<div class="d-flex align-items-center gap-3 header-info">
				<p><i class="isax isax-message-text5 me-1"></i><a href="mailto:{{getSetting()->primary_email ?? 'info@example.com'}}">{{getSetting()->primary_email ?? 'info@example.com'}}</a></p>
				<p><i class="isax isax-call5 me-1"></i><a href="tel:{{getSetting()->primary_contact ?? '+1 66589 14556'}}">{{getSetting()->primary_contact ?? '+1 66589 14556'}}</a></p>
			</div>
			<ul>
				<li class="social-header">
					<div class="social-icon">
						@if(getSetting()->facebook)
							<a href="{{getSetting()->facebook}}" target="_blank"><i class="fa-brands fa-facebook"></i></a>
						@endif
						@if(getSetting()->twitter)
							<a href="{{getSetting()->twitter}}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
						@endif
						@if(getSetting()->instagram)
							<a href="{{getSetting()->instagram}}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
						@endif
						@if(getSetting()->linkedin)
							<a href="{{getSetting()->linkedin}}" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
						@endif
						@if(getSetting()->youtube)
							<a href="{{getSetting()->youtube}}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
						@endif
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
					<img src="{{url('uploads/setting/'.getSetting()->site_logo)}}" class="img-fluid" alt="Logo">
				</a>
			</div>
			<div class="header-menu">
				<div class="main-menu-wrapper">
					<div class="menu-header">
						<a href="{{route('home')}}" class="menu-logo">
							<img src="{{url('uploads/setting/'.getSetting()->site_logo)}}" class="img-fluid" alt="Logo">
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
						
						<li class="has-submenu megamenu">
							<a href="{{route('gallery')}}">Gallery</a>
						</li>
						<li><a href="{{route('quality.assurance')}}">Quality Assurance</a></li>
						<li><a href="{{route('important.links')}}">Important Links</a></li>
						<li><a href="{{route('blog')}}">Blog</a></li>
						<li><a href="{{route('contact')}}">Contact Us</a></li>

						
					</ul>
				</div>
			</div>
		</nav>
	</div>
</header>
<!-- /Header -->