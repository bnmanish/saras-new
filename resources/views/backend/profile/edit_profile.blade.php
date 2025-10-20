@extends('backend/layouts/main')
@section('title', 'Edit Profile | River Edge')
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
                    <h4 class="mb-sm-0">Edit Profile</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Profile</li>
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
                        <form method="post" action="{{route('admin.edit.store.profile',$data->id)}}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="name" placeholder="name *" value="{{$data->name}}">
                                    @if($errors->first('name'))
                                    <p class="text-danger mb-0">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Position <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="position" placeholder="position *" value="{{$data->position}}">
                                    @if($errors->first('position'))
                                    <p class="text-danger mb-0">{{ $errors->first('position') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Status <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input status" type="radio" name="status" id="enable" value="1" @if($data->status == '1') checked @endif>
                                        <label class="form-check-label" for="enable">
                                            Enable
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input status" type="radio" name="status" id="diasble" value="0" @if($data->status == '0') checked @endif>
                                        <label class="form-check-label" for="diasble">
                                            Disable
                                        </label>
                                    </div>
                                    @if($errors->first('status'))
                                    <p class="text-danger mb-0">{{ $errors->first('status') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Image <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control dropify" type="file" name="image" data-default-file="{{url('uploads/profile/'.$data->image)}}">
                                    @if($errors->first('image'))
                                    <p class="text-danger mb-0">{{ $errors->first('image') }}</p>
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
@stop
@push('scripts')
@endpush