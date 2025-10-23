@extends('backend/layouts/main')
@section('title', 'Edit Milk Sale Price Chart | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Milk Sale Price Chart</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.list.milk_sale_price_charts')}}">Milk Sale Price Charts</a></li>
                            <li class="breadcrumb-item active">Edit Milk Sale Price Chart</li>
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
                        <form method="post" action="{{route('admin.update.milk_sale_price_chart', $data->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="title" placeholder="Title" value="{{$data->title}}">
                                    @if($errors->first('title'))
                                    <p class="text-danger mb-0">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Publish Date <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control datepicker" type="text" name="publish_date" value="{{$data->publish_date->format('d-m-Y')}}" placeholder="dd-mm-yyyy">
                                    @if($errors->first('publish_date'))
                                    <p class="text-danger mb-0">{{ $errors->first('publish_date') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">File (PDF)</label>
                                <div class="col-md-10">
                                    @if($data->file && file_exists(public_path('uploads/milk_sale_price_charts/'.$data->file)))
                                        <p><a href="{{url('uploads/milk_sale_price_charts/'.$data->file)}}" target="_blank">Preview Current File</a></p>
                                    @endif
                                    <input class="form-control" type="file" name="file" accept=".pdf">
                                    @if($errors->first('file'))
                                    <p class="text-danger mb-0">{{ $errors->first('file') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Status <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="active" value="active" @if($data->status == 'active') checked @endif>
                                        <label class="form-check-label" for="active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive" @if($data->status == 'inactive') checked @endif>
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
                                <button type="submit" class="btn btn-primary submit-btn">Update</button>
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
<script>
$(document).ready(function() {
    $('.datepicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD-MM-YYYY'
        }
    });
});
</script>
@endpush