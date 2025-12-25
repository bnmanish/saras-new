@extends('backend/layouts/main')
@section('title', 'Add Blog | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Blog</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Blog</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Greate!</strong> {{Session::get('success')}}
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="validation-message"></div>
                        <form id="blogForm">
                            @csrf
                            
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="title" value="{{old('title')}}">
                                </div>
                            </div>

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Slug <span class="text-danger">*</span></label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="text" name="slug" value="{{old('slug')}}">
                                 </div>
                             </div>

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Category <span class="text-danger">*</span></label>
                                 <div class="col-md-10">
                                     <select class="form-control" name="category">
                                         <option value="">Select Category</option>
                                         @foreach($blogCategories as $cat)
                                             <option value="{{$cat->id}}" {{old('category') == $cat->id ? 'selected' : ''}}>{{$cat->title}}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Meta Title</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="meta_title" value="{{old('meta_title')}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Meta Keywords</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="meta_keywords" value="{{old('meta_keywords')}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Meta Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" type="text" name="meta_description" value="{{old('meta_description')}}"></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Short Description <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <textarea class="form-control texteditor" type="text" name="short_description" value="{{old('short_description')}}"></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Description <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <textarea  class="form-control texteditor" type="text" name="description" value="{{old('description')}}"></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">banner <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control dropify" type="file" name="banner" value="{{old('banner')}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Scripts</label>
                                <div class="col-md-10">
                                    <textarea rows="8" class="form-control" name="scripts">{{old('scripts')}}</textarea>
                                    @if($errors->first('scripts'))
                                    <p class="text-danger mb-0">{{ $errors->first('scripts') }}</p>
                                    @endif
                                </div>
                            </div>
                            {{--
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Trending <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="trending" switch="bool" name="trending">
                                    <label class="form-label" for="trending" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Latest <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="latest" switch="bool" name="latest">
                                    <label class="form-label" for="latest" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Featured <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="featured" switch="bool" name="featured">
                                    <label class="form-label" for="featured" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Popular <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="popular" switch="bool" name="popular">
                                    <label class="form-label" for="popular" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Other <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="other" switch="bool" name="other">
                                    <label class="form-label" for="other" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>
                            --}}
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Status <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="status" switch="bool" name="status">
                                    <label class="form-label" for="status" data-on-label="Enabled" data-off-label="Disabled" style="width:80px;"></label>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-10 offset-md-2">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
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
<script>
    $(document).ready(function() {
        $('#blogForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('admin.store.blog') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // console.log(response.errors.title);
                    if(response.status == true){
                        $('.loader-overlay').show();
                        location.reload();
                    }else{
                        var message = "";
                        $.each(response.errors, function( index, value ) {
                            message = message+"<div class='alert alert-danger alert-dismissible fade show' role='alert'><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><strong>Error! </strong>"+value+"</div>";
                        });
                        $('.validation-message').html(message);
                         $("html, body").animate({ scrollTop: 0 }, "slow");
                    }
                },
            });
        });
    });
</script>
@endpush