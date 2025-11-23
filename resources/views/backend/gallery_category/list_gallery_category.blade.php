@extends('backend/layouts/main')
@section('title', 'Gallery Category List | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Gallery Category List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Gallery Category List</li>
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
                                <h4 class="card-title">Manage Gallery Categories</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="card-title text-end"><a href="{{route('admin.add.gallery_category')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a></h4>
                            </div>
                        </div>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                 <tr>
                                     <th>SL No</th>
                                     <th>Name</th>
                                     <th>Status</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>


                            <tbody>
                                @php $sl = 1; @endphp
                                 @foreach($data as $dataRow)
                                 <tr>
                                     <td>{{$sl}}</td>
                                     <td>{{$dataRow->name}}</td>
                                     <td>
                                         @if($dataRow->status == '1')
                                             <span class="badge bg-success">Active</span>
                                         @else
                                             <span class="badge bg-danger">Inactive</span>
                                         @endif
                                     </td>
                                     <td>
                                         <a href="{{route('admin.edit.gallery_category',$dataRow->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                         <a href="{{route('admin.delete.gallery_category',$dataRow->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Really! Do you want to delete?')"><i class="fas fa-trash"></i></a>
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
@stop
@push('scripts')
@endpush