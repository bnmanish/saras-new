@extends('backend/layouts/main')
@section('title', 'Category List | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Category List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Category List</li>
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
                                <h4 class="card-title">Manage Categories</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="card-title text-end"><a href="{{route('admin.add.category')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a></h4>
                            </div>
                        </div>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                 <tr>
                                     <th>Icon</th>
                                     <th>Name</th>
                                     <th>Status</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>


                             <tbody>
                                 @foreach($data as $dataRow)
                                 <tr>
                                     <td>
                                         @if($dataRow->icon)
                                             <img src="{{asset('uploads/category_icons/'.$dataRow->icon)}}" alt="Icon" style="max-width: 30px; max-height: 30px;">
                                         @else
                                             <span class="text-muted">No icon</span>
                                         @endif
                                     </td>
                                     <td>{{$dataRow->title}}</td>
                                     <td>{{$dataRow->status == 1 ? 'Enabled' : 'Disabled'}}</td>
                                     <td>
                                         <a href="{{route('admin.edit.category',$dataRow->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                         <a href="{{route('admin.delete.category',$dataRow->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Really! Do you want to delete?')"><i class="fas fa-trash"></i></a>
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