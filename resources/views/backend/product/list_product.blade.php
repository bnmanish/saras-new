@extends('backend/layouts/main')
@section('title', 'Product List | River Edge')
@section('content')
<style type="text/css">
    .pcm{
        margin-bottom: 13.2px;
    }
    .dropify-wrapper{
        height: 190px;
    }
</style>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Product List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Product List</li>
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
                                <h4 class="card-title">Manage Products</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="card-title text-end"><a href="{{route('admin.add.product')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a></h4>
                            </div>
                        </div>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                 <tr>
                                     <th>Name</th>
                                     <th>Category</th>
                                     <th>Price</th>
                                     <th>Pack Size</th>
                                     <th>Image</th>
                                     <th>Status</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>


                             <tbody>
                                 @foreach($data as $dataRow)
                                 <tr>
                                     <td>{{$dataRow->name}}</td>
                                     <td>{{$dataRow->category->title ?? 'N/A'}}</td>
                                     <td>{{$dataRow->price ? '₹'.$dataRow->price : 'N/A'}}</td>
                                     <td>{{$dataRow->pack_size ?? 'N/A'}}</td>
                                      <td>
                                          @if($dataRow->primaryImage)
                                          <img width="50" src="{{asset('uploads/product/'.$dataRow->primaryImage->image)}}" alt="{{$dataRow->name}}">
                                          @else
                                          No Image
                                          @endif
                                      </td>
                                     <td>{{$dataRow->status == 1 ? 'Enabled' : 'Disabled'}}</td>
                                     <td>
                                         <a href="{{route('admin.edit.product',$dataRow->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                         <a href="{{route('admin.delete.product',$dataRow->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Really! Do you want to delete?')"><i class="fas fa-trash"></i></a>
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