<!-- Footer Section -->
<footer class="footer inner-footer footer-info">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-3 col-md-3">
							<div class="footer-widget footer-menu">
								<h6 class="footer-title">Company</h6>
								<ul>
									<li><a href="about-us.html">About</a></li>
									<li><a href="search.html">Features</a></li>
									<li><a href="javascript:void(0);">Works</a></li>
									<li><a href="javascript:void(0);">Careers</a></li>
									<li><a href="javascript:void(0);">Locations</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="footer-widget footer-menu">
								<h6 class="footer-title">Treatments</h6>
								<ul>
									<li><a href="search.html">Dental</a></li>
									<li><a href="search.html">Cardiac</a></li>
									<li><a href="search.html">Spinal Cord</a></li>
									<li><a href="search.html">Hair Growth</a></li>
									<li><a href="search.html">Anemia & Disorder</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="footer-widget footer-menu">
								<h6 class="footer-title">Specialities</h6>
								<ul>
									<li><a href="search.html">Transplant</a></li>
									<li><a href="search.html">Cardiologist</a></li>
									<li><a href="search.html">Oncology</a></li>
									<li><a href="search.html">Pediatrics</a></li>
									<li><a href="search.html">Gynacology</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="footer-widget footer-menu">
								<h6 class="footer-title">Utilites</h6>
								<ul>
									<li><a href="pricing.html">Pricing</a></li>
									<li><a href="contact-us.html">Contact</a></li>
									<li><a href="contact-us.html">Request A Quote</a></li>
									<li><a href="javascript:void(0);">Premium Membership</a></li>
									<li><a href="javascript:void(0);">Integrations</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-7">
					<div class="footer-widget">
						<h6 class="footer-title">Newsletter</h6>
						<p class="mb-2">Subscribe & Stay Updated from the Doccure</p>
						<div class="subscribe-input">
							<form action="#">
								<input type="email" class="form-control" placeholder="Enter Email Address">
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
				<div class="copyright-text">
					<p class="mb-0">{!!getSetting()->copyrights!!}</p>
				</div>
				<!-- Copyright Menu -->
				<div class="copyright-menu">
					<ul class="policy-menu">
						<li><a href="javascript:void(0);">Legal Notice</a></li>
						<li><a href="privacy-policy.html">Privacy Policy</a></li>
						<li><a href="javascript:void(0);">Refund Policy</a></li>
					</ul>
				</div>
				<!-- /Copyright Menu -->
				<ul class="payment-method">
					<li><a href="javascript:void(0);"><img src="{{url('/')}}/assets/frontend/img/icons/card-01.svg" alt="Img"></a></li>
					<li><a href="javascript:void(0);"><img src="{{url('/')}}/assets/frontend/img/icons/card-02.svg" alt="Img"></a></li>
					<li><a href="javascript:void(0);"><img src="{{url('/')}}/assets/frontend/img/icons/card-03.svg" alt="Img"></a></li>
					<li><a href="javascript:void(0);"><img src="{{url('/')}}/assets/frontend/img/icons/card-04.svg" alt="Img"></a></li>
					<li><a href="javascript:void(0);"><img src="{{url('/')}}/assets/frontend/img/icons/card-05.svg" alt="Img"></a></li>
					<li><a href="javascript:void(0);"><img src="{{url('/')}}/assets/frontend/img/icons/card-06.svg" alt="Img"></a></li>
				</ul>
			</div>
			<!-- /Copyright -->					
		</div>
	</div>
</footer>
<!-- /Footer Section -->

<!-- Cursor -->
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>
<!-- /Cursor -->