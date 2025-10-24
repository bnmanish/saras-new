@extends('backend/layouts/main')
@section('title', 'Edit Product | River Edge')
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
                    <h4 class="mb-sm-0">Edit Product</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
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
                        <form method="post" action="{{route('admin.edit.store.product',$data->id)}}" enctype="multipart/form-data">
                            @csrf

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Product Name <span class="text-danger">*</span></label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="text" name="name" placeholder="Product name *" value="{{$data->name}}">
                                     @if($errors->first('name'))
                                     <p class="text-danger mb-0">{{ $errors->first('name') }}</p>
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
                                 <label class="col-md-2 col-form-label">Price</label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="number" name="price" placeholder="Price" value="{{$data->price}}">
                                     @if($errors->first('price'))
                                     <p class="text-danger mb-0">{{ $errors->first('price') }}</p>
                                     @endif
                                 </div>
                             </div>

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Pack Size</label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="text" name="pack_size" placeholder="Pack size" value="{{$data->pack_size}}">
                                     @if($errors->first('pack_size'))
                                     <p class="text-danger mb-0">{{ $errors->first('pack_size') }}</p>
                                     @endif
                                 </div>
                             </div>

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Short Description</label>
                                 <div class="col-md-10">
                                     <textarea class="form-control" name="short_description" rows="3" placeholder="Short description">{{$data->short_description}}</textarea>
                                     @if($errors->first('short_description'))
                                     <p class="text-danger mb-0">{{ $errors->first('short_description') }}</p>
                                     @endif
                                 </div>
                             </div>

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Long Description</label>
                                 <div class="col-md-10">
                                     <textarea class="form-control texteditor" name="long_description" rows="5" placeholder="Long description">{{$data->long_description}}</textarea>
                                     @if($errors->first('long_description'))
                                     <p class="text-danger mb-0">{{ $errors->first('long_description') }}</p>
                                     @endif
                                 </div>
                             </div>

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Related Products</label>
                                 <div class="col-md-10">
                                     <select class="form-control" name="related_products[]" multiple>
                                         @foreach($products as $product)
                                         <option value="{{$product->id}}" @if(in_array($product->id, $data->related_products ?? [])) selected @endif>{{$product->name}}</option>
                                         @endforeach
                                     </select>
                                     @if($errors->first('related_products'))
                                     <p class="text-danger mb-0">{{ $errors->first('related_products') }}</p>
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
                                 <label class="col-md-2 col-form-label">Existing Images</label>
                                 <div class="col-md-10">
                                     @if($data->images->count() > 0)
                                     <div class="row">
                                         @foreach($data->images as $image)
                                         <div class="col-md-3 mb-3">
                                             <img src="{{url('uploads/product/'.$image->image)}}" class="img-thumbnail" width="100">
                                             @if($image->is_primary)
                                             <span class="badge badge-primary">Primary</span>
                                             @endif
                                             <button type="button" class="btn btn-sm btn-danger delete-image" data-id="{{$image->id}}">Delete</button>
                                         </div>
                                         @endforeach
                                     </div>
                                     @else
                                     <p>No images uploaded yet.</p>
                                     @endif
                                 </div>
                             </div>

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Add More HD Images</label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="file" name="images[]" multiple accept="image/*">
                                     <small class="form-text text-muted">Select additional images. Hold Ctrl to select multiple.</small>
                                     @if($errors->first('images'))
                                     <p class="text-danger mb-0">{{ $errors->first('images') }}</p>
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
<script>
$(document).ready(function(){
    $('.delete-image').on('click', function(){
        var imageId = $(this).data('id');
        if(confirm('Are you sure you want to delete this image?')){
            $.ajax({
                url: '{{url("admin")}}/delete-product-image/' + imageId,
                type: 'GET',
                success: function(response){
                    if(response.success){
                        location.reload();
                    }
                }
            });
        }
    });
});
</script>
@endpush