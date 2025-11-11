@extends('frontend.layouts.main')
@section('title', 'Dealership Enquiry')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Dealership Enquiry Form</h3>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <form method="post" action="{{ route('dealership.enquiry.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">First Name *</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Last Name *</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email">Email ID *</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone">Phone Number *</label>
                                <input type="text" class="form-control" name="phone" id="phone" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="business_name">Business / Shop Name *</label>
                            <input type="text" class="form-control" name="business_name" id="business_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="business_address">Business Address *</label>
                            <textarea class="form-control" name="business_address" id="business_address" rows="3" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="city">City *</label>
                                <input type="text" class="form-control" name="city" id="city" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State *</label>
                                <input type="text" class="form-control" name="state" id="state" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="pin_code">Pin Code *</label>
                                <input type="text" class="form-control" name="pin_code" id="pin_code" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="type_of_business">Type of Business *</label>
                            <select class="form-control" name="type_of_business" id="type_of_business" required>
                                <option value="">Select</option>
                                <option value="retailer">Retailer</option>
                                <option value="wholesaler">Wholesaler</option>
                                <option value="distributor">Distributor</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="approx_daily_requirement">Approx. Daily Requirement (in Litres) *</label>
                            <input type="text" class="form-control" name="approx_daily_requirement" id="approx_daily_requirement" required>
                        </div>
                        <div class="mb-3">
                            <label for="additional_notes">Additional Notes</label>
                            <textarea class="form-control" name="additional_notes" id="additional_notes" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="agree_terms" id="agree_terms" required>
                                <label class="form-check-label" for="agree_terms">
                                    I agree to the Terms & Conditions
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Enquiry</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection