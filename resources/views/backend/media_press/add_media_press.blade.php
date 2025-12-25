@extends('backend/layouts/main')
@section('title', 'Add Media/Press | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Media/Press</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Media/Press</li>
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
                        <form method="post" action="{{route('admin.store.media_press')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="title" placeholder="Title *" value="{{old('title')}}">
                                    @if($errors->first('title'))
                                    <p class="text-danger mb-0">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Short Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control texteditor" name="short_description" rows="3" placeholder="Short Description">{{old('short_description')}}</textarea>
                                    @if($errors->first('short_description'))
                                    <p class="text-danger mb-0">{{ $errors->first('short_description') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">PDF/Link</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="pdf_or_link" placeholder="PDF file name or Link URL" value="{{old('pdf_or_link')}}">
                                    @if($errors->first('pdf_or_link'))
                                    <p class="text-danger mb-0">{{ $errors->first('pdf_or_link') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Date <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="date" name="date" value="{{old('date')}}">
                                    @if($errors->first('date'))
                                    <p class="text-danger mb-0">{{ $errors->first('date') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Image</label>
                                <div class="col-md-10">
                                    <input class="form-control dropify" type="file" name="image">
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