@extends('backend/layouts/main')
@section('title', 'Add Important Contact | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Important Contact</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.list.important_contacts')}}">Important Contacts</a></li>
                            <li class="breadcrumb-item active">Add Important Contact</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('admin.store.important_contact')}}">
                            @csrf

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="name" placeholder="Name" value="{{old('name')}}">
                                    @if($errors->first('name'))
                                    <p class="text-danger mb-0">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Designation <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="designation" placeholder="Designation" value="{{old('designation')}}">
                                    @if($errors->first('designation'))
                                    <p class="text-danger mb-0">{{ $errors->first('designation') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Landline</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="landline" placeholder="Landline" value="{{old('landline')}}">
                                    @if($errors->first('landline'))
                                    <p class="text-danger mb-0">{{ $errors->first('landline') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Mobile Number <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="mobile_number" placeholder="Mobile Number" value="{{old('mobile_number')}}">
                                    @if($errors->first('mobile_number'))
                                    <p class="text-danger mb-0">{{ $errors->first('mobile_number') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Status <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="active" value="active" @if(old('status') == 'active' || !old('status')) checked @endif>
                                        <label class="form-check-label" for="active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive" @if(old('status') == 'inactive') checked @endif>
                                        <label class="form-check-label" for="inactive">
                                            Inactive
                                        </label>
                                    </div>
                                    @if($errors->first('status'))
                                    <p class="text-danger mb-0">{{ $errors->first('status') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="offset-md-2">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>

                        <hr>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
@endsection
@push('scripts')
@endpush