@extends('backend/layouts/main')
@section('title', 'Contact Enquiry | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Contact Enquiry</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact Enquiry</li>
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
                                <h4 class="card-title">Contact Enquiry</h4>
                            </div>
                            <div class="col-6">
                                {{--<h4 class="card-title text-end"><a href="{{route('admin.add.user')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a></h4>--}}
                            </div>
                        </div>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach($data as $dataRow)
                                <tr>
                                    <td>{{$dataRow->name}}</td>
                                    <td>{{$dataRow->email}}</td>
                                    <td>{{$dataRow->mobile}}</td>
                                    <td>{{$dataRow->subject}}</td>
                                    <td>{{$dataRow->description}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@stop
@push('scripts')
@endpush