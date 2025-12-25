<div class="header-topbar">
	<div class="container">
		<div class="topbar-info">
			<div class="d-flex align-items-center gap-3 header-info">
				<p><i class="isax isax-message-text5 me-1"></i><a href="mailto:{{getSetting()->primary_email ?? 'gngmu-rj@nic.in'}}">{{getSetting()->primary_email ?? 'gngmu-rj@nic.in'}}</a></p>
				<p><i class="isax isax-call5 me-1"></i><a href="tel:{{getSetting()->primary_contact ?? '+9177260 07333'}}">{{getSetting()->primary_contact ?? '+9177260 07333'}}</a></p>
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
                                <li><a href="{{route('directors')}}">Profiles</a></li>
                                <li><a href="{{route('our.team')}}">Our Team</a></li>
							</ul>
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
								<li><a href="{{route('gallery')}}">Gallery</a></li>
							</ul>
						</li>
						<li><a href="{{route('quality.assurance')}}">Quality Assurance</a></li>
						<li class="has-submenu">
							<a href="javascript:void(0);">Important <i class="fas fa-chevron-down"></i></a>
							<ul class="submenu">
								<li><a href="{{route('important.links')}}">Important Links</a></li>
								<li><a href="{{route('important.contacts')}}">Important Contacts</a></li>
							</ul>
						</li>
						<!-- <li><a href="{{route('media.press')}}">Media & Press</a></li> -->
						<li><a href="{{route('blog')}}">Blog</a></li>
						<li><a href="{{route('contact')}}">Contact Us</a></li>						
					</ul>
				</div>
				<ul class="nav header-navbar-rht">
					<li>
						<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#becomeCarrierModal" class="btn btn-md btn-primary-gradient d-inline-flex align-items-center rounded-pill"><i class="isax isax-briefcase me-1"></i>Career</a>
					</li>
					<li>
						<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#becomeDistributorModal" class="btn btn-md btn-primary-gradient d-inline-flex align-items-center rounded-pill"><i class="isax isax-shop me-1"></i>Dealer</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>
<!-- /Header -->

<!-- Become a Distributor Modal -->
<div class="modal fade" id="becomeDistributorModal" tabindex="-1" aria-labelledby="becomeDistributorModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="becomeDistributorModalLabel">Become a Dealer</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="distributorForm">
					@csrf
					<div class="mb-3">
						<label for="name" class="form-label">Name <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="name" name="name" required>
						<div class="invalid-feedback"></div>
					</div>
					<div class="mb-3">
						<label for="city" class="form-label">City <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="city" name="city" required>
						<div class="invalid-feedback"></div>
					</div>
					<div class="mb-3">
						<label for="mobile" class="form-label">Mobile <span class="text-danger">*</span></label>
						<input type="tel" class="form-control" id="mobile" name="mobile" required>
						<div class="invalid-feedback"></div>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email <span class="text-danger">*</span></label>
						<input type="email" class="form-control" id="email" name="email" required>
						<div class="invalid-feedback"></div>
					</div>
					<div class="mb-3">
						<label for="business_type" class="form-label">Business Type <span class="text-danger">*</span></label>
						<select class="form-control" id="business_type" name="business_type" required>
							<option value="">Select Business Type</option>
							<option value="retailer">Retailer</option>
							<option value="wholesaler">Wholesaler</option>
							<option value="distributor">Distributor</option>
						</select>
						<div class="invalid-feedback"></div>
					</div>
					<div class="mb-3">
						<label for="message" class="form-label">Message</label>
						<textarea class="form-control" id="message" name="message" rows="3"></textarea>
						<div class="invalid-feedback"></div>
					</div>
					<div class="alert alert-success d-none" id="successMessage"></div>
					<div class="alert alert-danger d-none" id="errorMessage"></div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="submitDistributorForm">Submit</button>
			</div>
		</div>
	</div>
</div>

<!-- Become a Carrier Modal -->
<div class="modal fade" id="becomeCarrierModal" tabindex="-1" aria-labelledby="becomeCarrierModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="becomeCarrierModalLabel">Apply for Career</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="carrierForm" enctype="multipart/form-data">
					@csrf
					<div class="mb-3">
						<label for="carrier_name" class="form-label">Name <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="carrier_name" name="name" required>
						<div class="invalid-feedback"></div>
					</div>
					<div class="mb-3">
						<label for="carrier_city" class="form-label">City <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="carrier_city" name="city" required>
						<div class="invalid-feedback"></div>
					</div>
					<div class="mb-3">
						<label for="carrier_mobile" class="form-label">Mobile <span class="text-danger">*</span></label>
						<input type="tel" class="form-control" id="carrier_mobile" name="mobile" required>
						<div class="invalid-feedback"></div>
					</div>
					<div class="mb-3">
						<label for="carrier_email" class="form-label">Email <span class="text-danger">*</span></label>
						<input type="email" class="form-control" id="carrier_email" name="email" required>
						<div class="invalid-feedback"></div>
					</div>
					<div class="mb-3">
						<label for="carrier_position" class="form-label">Position <span class="text-danger">*</span></label>
						<select class="form-control" id="carrier_position" name="position" required>
							<option value="">Select Position</option>
							<option value="Sales Executive">Sales Executive</option>
							<option value="Delivery Person">Delivery Person</option>
							<option value="Warehouse Staff">Warehouse Staff</option>
							<option value="Office Staff">Office Staff</option>
							<option value="Driver">Driver</option>
							<option value="Other">Other</option>
						</select>
						<div class="invalid-feedback"></div>
					</div>
					<div class="mb-3">
						<label for="carrier_resume" class="form-label">Resume <span class="text-danger">*</span></label>
						<input type="file" class="form-control" id="carrier_resume" name="resume" accept=".pdf,.doc,.docx" required>
						<div class="invalid-feedback"></div>
						<small class="text-muted">Accepted formats: PDF, DOC, DOCX (Max size: 5MB)</small>
					</div>
					<div class="alert alert-success d-none" id="carrierSuccessMessage"></div>
					<div class="alert alert-danger d-none" id="carrierErrorMessage"></div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="submitCarrierForm">Submit</button>
			</div>
		</div>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const form = document.getElementById('distributorForm');
	const submitBtn = document.getElementById('submitDistributorForm');
	const successMessage = document.getElementById('successMessage');
	const errorMessage = document.getElementById('errorMessage');
	
	submitBtn.addEventListener('click', function(e) {
		e.preventDefault();
		
		// Reset messages
		successMessage.classList.add('d-none');
		errorMessage.classList.add('d-none');
		
		// Validate form
		if (!form.checkValidity()) {
			form.classList.add('was-validated');
			return;
		}
		
		// Disable submit button
		submitBtn.disabled = true;
		submitBtn.textContent = 'Submitting...';
		
		// Get form data
		const formData = new FormData(form);
		
		// Submit via AJAX
		fetch('{{ route("submit.distributor.enquiry") }}', {
			method: 'POST',
			body: formData,
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			}
		})
		.then(response => response.json())
		.then(data => {
			if (data.success) {
				successMessage.textContent = data.message || 'Enquiry submitted successfully!';
				successMessage.classList.remove('d-none');
				form.reset();
				form.classList.remove('was-validated');
				
				// Close modal after 2 seconds
				setTimeout(function() {
					const modal = bootstrap.Modal.getInstance(document.getElementById('becomeDistributorModal'));
					modal.hide();
					successMessage.classList.add('d-none');
				}, 2000);
			} else {
				errorMessage.textContent = data.message || 'Something went wrong. Please try again.';
				errorMessage.classList.remove('d-none');
			}
		})
		.catch(error => {
			errorMessage.textContent = 'Something went wrong. Please try again.';
			errorMessage.classList.remove('d-none');
		})
		.finally(() => {
			submitBtn.disabled = false;
			submitBtn.textContent = 'Submit';
		});
	});
	
	// Reset form when modal is closed
	const modal = document.getElementById('becomeDistributorModal');
	modal.addEventListener('hidden.bs.modal', function() {
		form.reset();
		form.classList.remove('was-validated');
		successMessage.classList.add('d-none');
		errorMessage.classList.add('d-none');
	});
});

// Carrier Form Handler
document.addEventListener('DOMContentLoaded', function() {
	const carrierForm = document.getElementById('carrierForm');
	const submitCarrierBtn = document.getElementById('submitCarrierForm');
	const carrierSuccessMessage = document.getElementById('carrierSuccessMessage');
	const carrierErrorMessage = document.getElementById('carrierErrorMessage');
	
	submitCarrierBtn.addEventListener('click', function(e) {
		e.preventDefault();
		
		// Reset messages
		carrierSuccessMessage.classList.add('d-none');
		carrierErrorMessage.classList.add('d-none');
		
		// Validate form
		if (!carrierForm.checkValidity()) {
			carrierForm.classList.add('was-validated');
			return;
		}
		
		// Check file size
		const resumeFile = document.getElementById('carrier_resume').files[0];
		if (resumeFile && resumeFile.size > 5 * 1024 * 1024) { // 5MB limit
			carrierErrorMessage.textContent = 'Resume file size must be less than 5MB.';
			carrierErrorMessage.classList.remove('d-none');
			return;
		}
		
		// Disable submit button
		submitCarrierBtn.disabled = true;
		submitCarrierBtn.textContent = 'Submitting...';
		
		// Get form data
		const formData = new FormData(carrierForm);
		
		// Submit via AJAX
		fetch('{{ route("submit.carrier.application") }}', {
			method: 'POST',
			body: formData,
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			}
		})
		.then(response => response.json())
		.then(data => {
			if (data.success) {
				carrierSuccessMessage.textContent = data.message || 'Application submitted successfully!';
				carrierSuccessMessage.classList.remove('d-none');
				carrierForm.reset();
				carrierForm.classList.remove('was-validated');
				
				// Close modal after 2 seconds
				setTimeout(function() {
					const modal = bootstrap.Modal.getInstance(document.getElementById('becomeCarrierModal'));
					modal.hide();
					carrierSuccessMessage.classList.add('d-none');
				}, 2000);
			} else {
				carrierErrorMessage.textContent = data.message || 'Something went wrong. Please try again.';
				carrierErrorMessage.classList.remove('d-none');
			}
		})
		.catch(error => {
			carrierErrorMessage.textContent = 'Something went wrong. Please try again.';
			carrierErrorMessage.classList.remove('d-none');
		})
		.finally(() => {
			submitCarrierBtn.disabled = false;
			submitCarrierBtn.textContent = 'Submit';
		});
	});
	
	// Reset form when modal is closed
	const carrierModal = document.getElementById('becomeCarrierModal');
	carrierModal.addEventListener('hidden.bs.modal', function() {
		carrierForm.reset();
		carrierForm.classList.remove('was-validated');
		carrierSuccessMessage.classList.add('d-none');
		carrierErrorMessage.classList.add('d-none');
	});
});
</script>