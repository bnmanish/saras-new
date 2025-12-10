@extends('backend/layouts/main')
@section('title', 'Carrier | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Carrier</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Carrier</li>
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

                        <div class="row mb-4 border-bottom">
                            <div class="col-6">
                                <h4 class="card-title">Carrier</h4>
                            </div>
                            <div class="col-6">
                                {{--<h4 class="card-title text-end"><a href="{{route('admin.add.user')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a></h4>--}}
                            </div>
                        </div>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Date</th>
                                    <th>Resume</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php $sl = 1; @endphp
                                @foreach($data as $dataRow)
                                <tr>
                                    <td>{{$sl}}</td>
                                    <td>{{$dataRow->name}}</td>
                                    <td>{{$dataRow->city}}</td>
                                    <td>{{$dataRow->mobile}}</td>
                                    <td>{{$dataRow->email}}</td>
                                    <td>{{$dataRow->position}}</td>
                                    <td>{{$dataRow->created_at->format('d-m-Y')}}</td>
                                    <td>
                                        @if($dataRow->resume)
                                        <a href="{{asset('uploads/'.$dataRow->resume)}}" target="_blank" class="btn btn-sm btn-info me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="View Resume"><i class="fas fa-eye"></i></a>
                                        <a href="{{asset('uploads/'.$dataRow->resume)}}" download class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Download Resume"><i class="fas fa-download"></i></a>
                                        @else
                                        No Resume
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewCarrierModal"
                                            data-name="{{ $dataRow->name }}"
                                            data-email="{{ $dataRow->email }}"
                                            data-mobile="{{ $dataRow->mobile }}"
                                            data-city="{{ $dataRow->city }}"
                                            data-position="{{ $dataRow->position }}"
                                            data-resume="{{ $dataRow->resume ? asset('uploads/'.$dataRow->resume) : '' }}"
                                            data-submitted-at="{{ $dataRow->created_at->format('d-m-Y H:i') }}">
                                            <i class="fas fa-info-circle"></i> View
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

    </div> <!-- container-fluid -->
</div>

<!-- View Carrier Modal -->
<div class="modal fade" id="viewCarrierModal" tabindex="-1" aria-labelledby="viewCarrierModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewCarrierModalLabel">Carrier Application Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-6">
                         <p><strong>Name:</strong> <span id="modalCarrierName"></span></p>
                         <p><strong>Email:</strong> <span id="modalCarrierEmail"></span></p>
                         <p><strong>Mobile:</strong> <span id="modalCarrierMobile"></span></p>
                         <p><strong>City:</strong> <span id="modalCarrierCity"></span></p>
                     </div>
                     <div class="col-md-6">
                         <p><strong>Position:</strong> <span id="modalCarrierPosition"></span></p>
                         <p><strong>Submitted At:</strong> <span id="modalCarrierSubmittedAt"></span></p>
                     </div>
                 </div>
                 <div class="row mt-3">
                     <div class="col-12">
                         <p><strong>Resume:</strong></p>
                         <div id="modalCarrierResume" class="border p-2 bg-light rounded">
                             <span id="resumeLink"></span>
                         </div>
                     </div>
                 </div>
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script>
    var viewCarrierModal = document.getElementById('viewCarrierModal');
    viewCarrierModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var name = button.getAttribute('data-name');
        var email = button.getAttribute('data-email');
        var mobile = button.getAttribute('data-mobile');
        var city = button.getAttribute('data-city');
        var position = button.getAttribute('data-position');
        var resume = button.getAttribute('data-resume');
        var submittedAt = button.getAttribute('data-submitted-at');

        document.getElementById('modalCarrierName').textContent = name;
        document.getElementById('modalCarrierEmail').textContent = email;
        document.getElementById('modalCarrierMobile').textContent = mobile;
        document.getElementById('modalCarrierCity').textContent = city;
        document.getElementById('modalCarrierPosition').textContent = position;
        document.getElementById('modalCarrierSubmittedAt').textContent = submittedAt;
        
        var resumeLink = document.getElementById('resumeLink');
        if (resume) {
            resumeLink.innerHTML = '<a href="' + resume + '" target="_blank" class="btn btn-sm btn-info me-2"><i class="fas fa-eye"></i> View Resume</a>' +
                                  '<a href="' + resume + '" download class="btn btn-sm btn-success"><i class="fas fa-download"></i> Download Resume</a>';
        } else {
            resumeLink.textContent = 'No Resume';
        }
    });
</script>
@endpush