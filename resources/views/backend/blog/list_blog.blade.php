@extends('backend/layouts/main')
@section('title', 'Blog List | River Edge')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Blog List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Blog List</li>
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
                                <h4 class="card-title">Manage Blogs</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="card-title text-end"><a href="{{route('admin.add.blog')}}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add new"><i class="fas fa-plus"></i></a></h4>
                            </div>
                        </div>

                        <table id="userlist-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Title</th>
                                    <th>Banner</th>
                                    <th>Added By</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $dataRow)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$dataRow->title}}</td>
                                    <td><img width="100" src="{{url('uploads/blog/'.$dataRow->banner)}}"></td>
                                    <td>{{$dataRow->user->name}}</td>
                                    <td>{{$dataRow->status == '1' ? 'Enable' : 'Disable'}}</td>
                                    <td><span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{date('d F, Y',strtotime($dataRow->created_at))}}">{{date('d-m-Y',strtotime($dataRow->created_at))}}</span></td>
                                    <td>
                                        <a href="{{route('admin.edit.blog',$dataRow->id)}}" class='btn btn-primary btn-sm' data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit"><i class='fas fa-edit'></i></a>&nbsp;<a href="{{route('admin.delete.blog',$dataRow->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Really! Do you want to delete?')" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete"><i class='fas fa-trash'></i></a>
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
<script type="text/javascript">

    $(document).ready(function () {
        $('#userlist-datatable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            ajax: '{{route("admin.get.list.blog")}}',
            deferLoading: '{{$datacount}}',
            drawCallback: function () {
                // Reinitialize tooltips after each draw
                $('[data-bs-toggle="tooltip"]').tooltip();
            }
        });
    });

</script>
@endpush