@extends('backend/layouts/main')
@section('title', 'Edit Blog Category | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Blog Category</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Blog Category</li>
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
                        <form method="post" action="{{route('admin.edit.store.blog_category',$data->id)}}">
                            @csrf

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="title" placeholder="Category title *" value="{{$data->title}}">
                                    @if($errors->first('title'))
                                    <p class="text-danger mb-0">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Slug <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="slug" placeholder="Category slug *" value="{{$data->slug}}">
                                    @if($errors->first('slug'))
                                    <p class="text-danger mb-0">{{ $errors->first('slug') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Meta Title</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="meta_title" value="{{$data->meta_title}}">
                                    @if($errors->first('meta_title'))
                                    <p class="text-danger mb-0">{{ $errors->first('meta_title') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Meta Keywords</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="meta_keywords" value="{{$data->meta_keywords}}">
                                    @if($errors->first('meta_keywords'))
                                    <p class="text-danger mb-0">{{ $errors->first('meta_keywords') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Meta Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="meta_description">{{$data->meta_description}}</textarea>
                                    @if($errors->first('meta_description'))
                                    <p class="text-danger mb-0">{{ $errors->first('meta_description') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control texteditor" name="description">{{$data->description}}</textarea>
                                    @if($errors->first('description'))
                                    <p class="text-danger mb-0">{{ $errors->first('description') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Scripts</label>
                                <div class="col-md-10">
                                    <textarea rows="8" class="form-control" name="scripts">{{$data->scripts}}</textarea>
                                    @if($errors->first('scripts'))
                                    <p class="text-danger mb-0">{{ $errors->first('scripts') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Status <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input status" type="radio" name="status" id="active" value="active" @if($data->status == 'active') checked @endif>
                                        <label class="form-check-label" for="active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input status" type="radio" name="status" id="inactive" value="inactive" @if($data->status == 'inactive') checked @endif>
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