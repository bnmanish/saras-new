@extends('backend/layouts/main')
@section('title', 'Add Footer Link | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Footer Link</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Footer Link</li>
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
                        <form method="post" action="{{route('admin.store.footer.link')}}">
                            @csrf

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Section <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <select class="form-control" name="section_id">
                                        <option value="">Select Section</option>
                                        @foreach($sections as $section)
                                        <option value="{{$section->id}}" @if(old('section_id') == $section->id) selected @endif>{{$section->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('section_id'))
                                    <p class="text-danger mb-0">{{ $errors->first('section_id') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="title" placeholder="Link Title *" value="{{old('title')}}">
                                    @if($errors->first('title'))
                                    <p class="text-danger mb-0">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">URL <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="url" name="url" placeholder="https://example.com *" value="{{old('url')}}">
                                    @if($errors->first('url'))
                                    <p class="text-danger mb-0">{{ $errors->first('url') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Target <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="target" id="same_tab" value="_self" @if(old('target') == '_self' || !old('target')) checked @endif>
                                        <label class="form-check-label" for="same_tab">
                                            Same Tab
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="target" id="new_tab" value="_blank" @if(old('target') == '_blank') checked @endif>
                                        <label class="form-check-label" for="new_tab">
                                            New Tab
                                        </label>
                                    </div>
                                    @if($errors->first('target'))
                                    <p class="text-danger mb-0">{{ $errors->first('target') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Status <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input status" type="radio" name="status" id="enable" value="1" @if(old('status') == '1' || !old('status')) checked @endif>
                                        <label class="form-check-label" for="enable">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input status" type="radio" name="status" id="disable" value="0" @if(old('status') == '0') checked @endif>
                                        <label class="form-check-label" for="disable">
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