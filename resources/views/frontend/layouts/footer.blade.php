<!-- Footer Section -->
<footer class="footer inner-footer footer-info">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						@php
							$footerSections = \App\Models\FooterSection::with(['links' => function($query) {
								$query->where('status', '1');
							}])->where('status', '1')->orderBy('sort_order')->orderBy('id')->take(4)->get();
						@endphp
						@foreach($footerSections as $section)
						<div class="col-lg-3 col-md-3">
							<div class="footer-widget footer-menu">
								<h6 class="footer-title">{{$section->name}}</h6>
								<ul>
									@foreach($section->links as $link)
									<li><a href="{{$link->url}}" target="{{$link->target}}">{{$link->title}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="col-lg-4 col-md-7">
					<div class="footer-widget">
						<h6 class="footer-title">Newsletter</h6>
						<p class="mb-2">Subscribe & Stay Updated from the Doccure</p>
						@if(Session::has('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							<strong>Success!</strong> {{Session::get('success')}}
						</div>
						@endif
						@if(Session::has('error'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							<strong>Error!</strong> {{Session::get('error')}}
						</div>
						@endif
						<div id="subscribe-message"></div>
						<div class="subscribe-input">
							<form id="subscribe-form" action="{{route('subscribe.newsletter')}}" method="post">
								@csrf
								<input type="text" name="email" class="form-control" placeholder="Enter Email Address">
								<button type="submit" class="btn btn-md btn-primary-gradient d-inline-flex align-items-center"><i class="isax isax-send-25 me-1"></i>Send</button>
							</form>
						</div>
						<div class="social-icon">
							<h6 class="mb-3">Connect With Us</h6>
							<ul>
								@if(getSetting()->facebook)
									<li>
										<a href="{{getSetting()->facebook}}" target="_blank"><i class="fa-brands fa-facebook"></i></a>
									</li>
								@endif
								@if(getSetting()->twitter)
									<li>
										<a href="{{getSetting()->twitter}}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
									</li>
								@endif
								@if(getSetting()->instagram)
									<li>
										<a href="{{getSetting()->instagram}}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
									</li>
								@endif
								@if(getSetting()->linkedin)
									<li>
										<a href="{{getSetting()->linkedin}}" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
									</li>
								@endif
								@if(getSetting()->youtube)
									<li>
										<a href="{{getSetting()->youtube}}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
									</li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bg">
			<img src="{{url('/')}}/assets/frontend/img/bg/footer-bg-01.png" alt="img" class="footer-bg-01">
			<img src="{{url('/')}}/assets/frontend/img/bg/footer-bg-02.png" alt="img" class="footer-bg-02">
			<img src="{{url('/')}}/assets/frontend/img/bg/footer-bg-03.png" alt="img" class="footer-bg-03">
			<img src="{{url('/')}}/assets/frontend/img/bg/footer-bg-04.png" alt="img" class="footer-bg-04">
			<img src="{{url('/')}}/assets/frontend/img/bg/footer-bg-05.png" alt="img" class="footer-bg-05">
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<!-- Copyright -->
			<div class="copyright">
				<div class="copyright-text text-center">
					<p class="mb-0">{!!getSetting()->copyrights!!}</p>
				</div>
			</div>
			<!-- /Copyright -->					
		</div>
	</div>
</footer>
<script>
document.getElementById('subscribe-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = this;
    const formData = new FormData(form);
    const messageDiv = document.getElementById('subscribe-message');

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        messageDiv.innerHTML = '';
        if (data.success) {
            messageDiv.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Success!</strong> ' + data.message + '</div>';
            form.reset();
        } else {
            messageDiv.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Error!</strong> ' + data.message + '</div>';
        }
    })
    .catch(error => {
        messageDiv.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Error!</strong> Something went wrong. Please try again.</div>';
    });
});
</script>
<!-- /Footer Section -->



<!-- Cursor -->
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>
<!-- /Cursor -->