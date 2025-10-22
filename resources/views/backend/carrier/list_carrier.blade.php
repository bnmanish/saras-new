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
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Date</th>
                                    <th>Resume</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach($data as $dataRow)
                                <tr>
                                    <td>{{$dataRow->name}}</td>
                                    <td>{{$dataRow->city}}</td>
                                    <td>{{$dataRow->mobile}}</td>
                                    <td>{{$dataRow->email}}</td>
                                    <td>{{$dataRow->position}}</td>
                                    <td>{{$dataRow->created_at->format('d-m-Y')}}</td>
                                    <td>
                                        @if($dataRow->resume)
                                        <a href="{{asset('uploads/'.$dataRow->resume)}}" target="_blank" class="btn btn-sm btn-info me-1">View</a>
                                        <a href="{{asset('uploads/'.$dataRow->resume)}}" download class="btn btn-sm btn-success">Download</a>
                                        @else
                                        No Resume
                                        @endif
                                    </td>
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