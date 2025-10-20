@extends('backend/layouts/main')
@section('title', 'Edit Award | River Edge')
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
                    <h4 class="mb-sm-0">Edit Award</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Award</li>
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
                        <form method="post" action="{{route('admin.edit.store.award',$data->id)}}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="title" placeholder="title *" value="{{$data->title}}">
                                    @if($errors->first('title'))
                                    <p class="text-danger mb-0">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">URL</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="url" placeholder="url" value="{{$data->url}}">
                                    @if($errors->first('url'))
                                    <p class="text-danger mb-0">{{ $errors->first('url') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Sequence</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" name="sequence" placeholder="enter no eg: 1 or 2" value="{{$data->sequence}}">
                                    @if($errors->first('sequence'))
                                    <p class="text-danger mb-0">{{ $errors->first('sequence') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Meta Title </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="meta_title" placeholder="meta title" value="{{$data->meta_title}}">
                                    @if($errors->first('meta_title'))
                                    <p class="text-danger mb-0">{{ $errors->first('meta_title') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Meta Keywords </label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="meta_keywords" placeholder="meta keywords">{{$data->meta_keywords}}</textarea>
                                    @if($errors->first('meta_keywords'))
                                    <p class="text-danger mb-0">{{ $errors->first('meta_keywords') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Meta Description </label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="meta_description" placeholder="meta desciption">{{$data->meta_description}}</textarea>
                                    @if($errors->first('meta_description'))
                                    <p class="text-danger mb-0">{{ $errors->first('meta_description') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Short Description </label>
                                <div class="col-md-10">
                                    <textarea class="w-100 texteditor" name="short_description" placeholder="short description">{{$data->short_description}}</textarea>
                                    @if($errors->first('short_description'))
                                    <p class="text-danger mb-0">{{ $errors->first('short_description') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Description </label>
                                <div class="col-md-10">
                                    <textarea class="w-100 texteditor" name="desciption" placeholder="description">{{$data->description}}</textarea>
                                    @if($errors->first('desciption'))
                                    <p class="text-danger mb-0">{{ $errors->first('desciption') }}</p>
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
                                <label class="col-md-2 col-form-label">Image </label>
                                <div class="col-md-10">
                                    <input class="form-control dropify" type="file" name="image" data-default-file="{{url('uploads/award/'.$data->image)}}">
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