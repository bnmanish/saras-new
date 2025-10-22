@extends('backend/layouts/main')
@section('title', 'Edit Gallery | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Gallery</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Gallery</li>
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
                        <form method="post" action="{{route('admin.edit.store.gallery',$data->id)}}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="title" placeholder="Title *" value="{{$data->title}}">
                                    @if($errors->first('title'))
                                    <p class="text-danger mb-0">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Category <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <select class="form-control" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($data->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('category_id'))
                                    <p class="text-danger mb-0">{{ $errors->first('category_id') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Current Images</label>
                                <div class="col-md-10">
                                    <div class="row">
                                        @foreach($data->images as $image)
                                        <div class="col-md-3 mb-3">
                                            <img src="{{url('uploads/gallery/'.$image->image)}}" class="img-thumbnail" width="100">
                                            <br>
                                            <button type="button" class="btn btn-danger btn-sm mt-1" onclick="deleteImage({{$image->id}})">Delete</button>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Add More Images</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="file" name="images[]" multiple>
                                    @if($errors->first('images'))
                                    <p class="text-danger mb-0">{{ $errors->first('images') }}</p>
                                    @endif
                                    <small class="text-muted">Select multiple images to add</small>
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
$(function() {
    $("#sortable").sortable({
        update: function(event, ui) {
            var order = [];
            $('.image-item').each(function(index) {
                order.push($(this).data('id'));
            });
            $.ajax({
                url: '{{route("admin.reorder.gallery_images")}}',
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    order: order
                },
                success: function(response) {
                    console.log('Order updated');
                }
            });
        }
    });
    $("#sortable").disableSelection();
});

function deleteImage(id) {
    if (confirm('Are you sure you want to delete this image?')) {
        $.ajax({
            url: '{{url("admin/delete-gallery-image")}}/' + id,
            type: 'POST',
            data: {
                _token: '{{csrf_token()}}'
            },
            success: function(response) {
                if (response.success) {
                    location.reload();
                }
            }
        });
    }
}
</script>
@endpush