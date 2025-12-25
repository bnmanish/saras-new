@extends('backend/layouts/main')
@section('title', 'Add Product | River Edge')
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
                    <h4 class="mb-sm-0">Add Product</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
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
                        <form method="post" action="{{route('admin.store.product')}}" enctype="multipart/form-data">
                            @csrf

                              <div class="mb-3 row">
                                  <label class="col-md-2 col-form-label">Product Name <span class="text-danger">*</span></label>
                                  <div class="col-md-10">
                                      <input class="form-control" type="text" name="name" placeholder="Product name *" value="{{old('name')}}">
                                      @if($errors->first('name'))
                                      <p class="text-danger mb-0">{{ $errors->first('name') }}</p>
                                      @endif
                                  </div>
                              </div>

                              <div class="mb-3 row">
                                  <label class="col-md-2 col-form-label">Slug</label>
                                  <div class="col-md-10">
                                      <input class="form-control" type="text" name="slug" placeholder="Slug (leave empty to auto-generate)" value="{{old('slug')}}">
                                      @if($errors->first('slug'))
                                      <p class="text-danger mb-0">{{ $errors->first('slug') }}</p>
                                      @endif
                                  </div>
                              </div>

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Category <span class="text-danger">*</span></label>
                                 <div class="col-md-10">
                                     <select class="form-control" name="category_id">
                                         <option value="">Select Category</option>
                                         @foreach($categories as $category)
                                         <option value="{{$category->id}}" @if(old('category_id') == $category->id) selected @endif>{{$category->title}}</option>
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
                                     <input class="form-control" type="number" name="price" placeholder="Price" value="{{old('price')}}">
                                     @if($errors->first('price'))
                                     <p class="text-danger mb-0">{{ $errors->first('price') }}</p>
                                     @endif
                                 </div>
                             </div>

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Pack Size</label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="text" name="pack_size" placeholder="Pack size" value="{{old('pack_size')}}">
                                     @if($errors->first('pack_size'))
                                     <p class="text-danger mb-0">{{ $errors->first('pack_size') }}</p>
                                     @endif
                                 </div>
                             </div>

                              <div class="mb-3 row">
                                  <label class="col-md-2 col-form-label">Short Description</label>
                                  <div class="col-md-10">
                                      <textarea class="form-control texteditor" name="short_description" rows="3" placeholder="Short description">{{old('short_description')}}</textarea>
                                      @if($errors->first('short_description'))
                                      <p class="text-danger mb-0">{{ $errors->first('short_description') }}</p>
                                      @endif
                                  </div>
                              </div>

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Long Description</label>
                                 <div class="col-md-10">
                                     <textarea class="form-control texteditor" name="long_description" rows="5" placeholder="Long description">{{old('long_description')}}</textarea>
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
                                         <option value="{{$product->id}}" @if(in_array($product->id, old('related_products', []))) selected @endif>{{$product->name}}</option>
                                         @endforeach
                                     </select>
                                     @if($errors->first('related_products'))
                                     <p class="text-danger mb-0">{{ $errors->first('related_products') }}</p>
                                     @endif
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

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Status <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input status" type="radio" name="status" id="enable" value="1" @if(old('status') == '1') checked @endif>
                                        <label class="form-check-label" for="enable">
                                            Enable
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input status" type="radio" name="status" id="diasble" value="0" @if(old('status') == '0') checked @endif>
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
                                 <label class="col-md-2 col-form-label">HD Images <span class="text-danger">*</span></label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="file" name="images[]" multiple accept="image/*">
                                     <small class="form-text text-muted">Select at least one image. Hold Ctrl to select multiple.</small>
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
@endpush