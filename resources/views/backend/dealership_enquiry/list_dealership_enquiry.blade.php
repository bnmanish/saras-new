@extends('backend/layouts/main')
@section('title', 'Dealership Enquiries List | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dealership Enquiries List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dealership Enquiries List</li>
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

                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Great!</strong> {{Session::get('success')}}
                        </div>
                        @endif

                        <div class="row mb-4 border-bottom">
                            <div class="col-6">
                                <h4 class="card-title">Manage Dealership Enquiries</h4>
                            </div>
                        </div>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>City</th>
                                    <th>Business Type</th>
                                    <th>Enquiry Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php $sl = 1; @endphp
                                @foreach($data as $enquiry)
                                <tr>
                                    <td>{{$sl}}</td>
                                    <td>{{$enquiry->first_name}} {{$enquiry->last_name}}</td>
                                    <td>{{$enquiry->email}}</td>
                                    <td>{{$enquiry->phone}}</td>
                                    <td>{{$enquiry->city}}</td>
                                    <td>{{ucfirst($enquiry->type_of_business)}}</td>
                                    <td>{{$enquiry->created_at->format('d-m-Y H:i')}}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal"
                                            data-name="{{ $enquiry->first_name }} {{ $enquiry->last_name }}"
                                            data-email="{{ $enquiry->email }}"
                                            data-phone="{{ $enquiry->phone }}"
                                             data-city="{{ $enquiry->city }}"
                                             data-type-of-business="{{ ucfirst($enquiry->type_of_business) }}"
                                             data-message="{{ $enquiry->message }}"
                                            data-submitted-at="{{ $enquiry->created_at->format('d-m-Y H:i') }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                @php $sl++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Dealership Enquiry Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-6">
                         <p><strong>Name:</strong> <span id="modalName"></span></p>
                         <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                         <p><strong>Phone:</strong> <span id="modalPhone"></span></p>
                         <p><strong>City:</strong> <span id="modalCity"></span></p>
                     </div>
                     <div class="col-md-6">
                         <p><strong>Type of Business:</strong> <span id="modalTypeOfBusiness"></span></p>
                         <p><strong>Submitted At:</strong> <span id="modalSubmittedAt"></span></p>
                     </div>
                 </div>
                 <div class="row mt-3">
                     <div class="col-12">
                         <p><strong>Message:</strong></p>
                         <div id="modalMessage" class="border p-2 bg-light rounded"></div>
                     </div>
                 </div>
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    var viewModal = document.getElementById('viewModal');
    viewModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var name = button.getAttribute('data-name');
        var email = button.getAttribute('data-email');
        var phone = button.getAttribute('data-phone');
        var city = button.getAttribute('data-city');
        var typeOfBusiness = button.getAttribute('data-type-of-business');
        var message = button.getAttribute('data-message');
        var submittedAt = button.getAttribute('data-submitted-at');

        document.getElementById('modalName').textContent = name;
        document.getElementById('modalEmail').textContent = email;
        document.getElementById('modalPhone').textContent = phone;
        document.getElementById('modalCity').textContent = city;
        document.getElementById('modalTypeOfBusiness').textContent = typeOfBusiness;
        document.getElementById('modalMessage').textContent = message || 'N/A';
        document.getElementById('modalSubmittedAt').textContent = submittedAt;
    });
</script>
@endpush