@extends('backend/layouts/main')
@section('title', 'Edit Our Team | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Our Team</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Our Team</li>
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
                        <form method="post" action="{{route('admin.edit.store.our_team',$data->id)}}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="name" placeholder="Name *" value="{{$data->name}}">
                                    @if($errors->first('name'))
                                    <p class="text-danger mb-0">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Designation <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="designation" placeholder="Designation *" value="{{$data->designation}}">
                                    @if($errors->first('designation'))
                                    <p class="text-danger mb-0">{{ $errors->first('designation') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Short Bio</label>
                                <div class="col-md-10">
                                    <textarea class="form-control texteditor" name="short_bio" rows="3" placeholder="Short Bio">{{$data->short_bio}}</textarea>
                                    @if($errors->first('short_bio'))
                                    <p class="text-danger mb-0">{{ $errors->first('short_bio') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Photo</label>
                                <div class="col-md-10">
                                    <input class="form-control dropify" type="file" name="photo" @if($data->photo) data-default-file="{{url('uploads/our_team/'.$data->photo)}}" @endif>
                                    @if($errors->first('photo'))
                                    <p class="text-danger mb-0">{{ $errors->first('photo') }}</p>
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