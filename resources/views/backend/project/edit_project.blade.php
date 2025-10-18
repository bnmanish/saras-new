@extends('backend/layouts/main')
@section('title', 'Edit Project | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Project</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Project</li>
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
                        <form id="projectForm" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="title" value="{{$data->title}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Slug <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="slug" value="{{$data->url}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Price <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="price" value="{{$data->price}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Sequence</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="sequence" placeholder="enter no 1 or 2" value="{{$data->sequence}}">
                                    @if($errors->first('sequence'))
                                    <p class="text-danger mb-0">{{ $errors->first('sequence') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Meta Title</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="meta_title" value="{{$data->meta_title}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Meta Keywords</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="meta_keywords" value="{{$data->meta_keywords}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Meta Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" type="text" name="meta_description">{{$data->meta_description}}</textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Project Details </label>
                                <div class="col-md-10">
                                    <textarea class="form-control texteditor" type="text" name="project_details">{{$data->project_details}}</textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Description <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <textarea  class="form-control texteditor" type="text" name="description">{{$data->description}}</textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Project For</label>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input status" type="radio" name="project_for" id="sale" value="sale" @if($data->project_for == 'sale') checked @endif>
                                        <label class="form-check-label" for="sale">
                                            Sale
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input status" type="radio" name="project_for" id="rent" value="rent" @if($data->project_for == 'rent') checked @endif>
                                        <label class="form-check-label" for="rent">
                                            Rent
                                        </label>
                                    </div>

                                     <div class="form-check form-check-inline">
                                        <input class="form-check-input status" type="radio" name="project_for" id="lease" value="lease" @if($data->project_for == 'lease') checked @endif>
                                        <label class="form-check-label" for="lease">
                                            Lease
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Rera Approved</label>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input rera_approved" type="radio" name="rera_approved" id="yes" value="1" @if($data->is_rera_approved == '1') checked @endif>
                                        <label class="form-check-label" for="yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input rera_approved" type="radio" name="rera_approved" id="disable" value="0" @if($data->is_rera_approved == '0') checked @endif>
                                        <label class="form-check-label" for="disable">
                                            No
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Amenities</label>
                                <div class="col-md-10 row">
                                    @foreach($amenities as $amenity)
                                    <div class="col-md-3 mb-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="amenity-{{$amenity->id}}" style="height: 26px;width: 26px;" name="amenity[]" value="{{$amenity->id}}" @if(in_array($amenity->id,$assignedAmenities)) checked @endif>
                                            <label class="form-check-label ms-4" for="amenity-{{$amenity->id}}"><img src="{{url('uploads/amenity/'.$amenity->image)}}" width="30px"> &nbsp;&nbsp;&nbsp;({{$amenity->title}})
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">City <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <select class="form-select" name="city">
                                        <option value="">Select City</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}" @if($data->city_id == $city->id) selected @endif>{{$city->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Brand <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <select class="form-select" name="brand">
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" @if($data->brand_id == $brand->id) selected @endif>{{$brand->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Type <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <select class="form-select" name="type">
                                        <option value="">Select Type</option>
                                        @foreach($types as $type)
                                        <option value="{{$type->id}}" @if($data->type_id == $type->id) selected @endif>{{$type->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Video URL</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="video_url" value="{{$data->video}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Map </label>
                                <div class="col-md-10">
                                    <textarea  class="form-control" type="text" name="map">{{$data->map}}</textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Address </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="address" value="{{$data->address}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Cover Image <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="file" name="cover_image">
                                    <div class="row mt-2">
                                        <div class="col-1">
                                            <a target="_blank" href="{{url('uploads/project/cover/'.$data->cover_image)}}"><img class="border p-2 w-100 h-100" src="{{url('uploads/project/cover/'.$data->cover_image)}}" title="cover image"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Slider Image </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="file" name="slider_images[]" multiple>
                                    <div class="row mt-2">
                                        @foreach($sliderImages as $siRow)
                                        <div class="col-1 position-relative slidercolms-{{ $siRow->id }}">
                                            <a target="_blank" href="{{url('uploads/project/slider/'.$siRow->file)}}"><img class="border p-2 w-100 h-100" src="{{url('uploads/project/slider/'.$siRow->file)}}" title="Slider Images"></a>

                                            <div class="position-absolute top-0 end-0">
                                                <a href="javascript:;" class="text-danger" onclick="deleteSliderImage({{ $siRow->id }})"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                             <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Floor Plans </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="file" name="floor_plans[]" multiple>
                                    <div class="row mt-2">
                                        @foreach($sliderFloorPlan as $sfRow)
                                        <div class="col-1 position-relative floorplancolms-{{ $sfRow->id }}">
                                            <a target="_blank" href="{{url('uploads/project/floor_plan/'.$sfRow->file)}}"><img class="border p-2 w-100 h-100" src="{{url('uploads/project/floor_plan/'.$sfRow->file)}}" title="Floor Plans"></a>

                                            <div class="position-absolute top-0 end-0">
                                                <a href="javascript:;" class="text-danger" onclick="deleteFloorPlan({{ $sfRow->id }})"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Section</label>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input section" type="radio" name="section" id="featured" value="featured" @if($data->section == 'featured') checked @else checked @endif>
                                        <label class="form-check-label" for="featured">
                                            Featured
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input section" type="radio" name="section" id="luxury" value="luxury" @if($data->section == 'luxury') checked @endif>
                                        <label class="form-check-label" for="luxury">
                                            Luxury
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input section" type="radio" name="section" id="popular" value="popular" @if($data->section == 'popular') checked @endif>
                                        <label class="form-check-label" for="popular">
                                            Popular
                                        </label>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Status</label>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input status" type="radio" name="status" id="enable" value="1" @if($data->status == '1') checked @else checked @endif>
                                        <label class="form-check-label" for="enable">
                                            Enable
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input status" type="radio" name="status" id="disable" value="0" @if($data->status == '0') checked @endif>
                                        <label class="form-check-label" for="disable">
                                            Disable
                                        </label>
                                    </div>

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
        $('#projectForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{route('admin.edit.store.project',$data->id)}}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response.status == true){
                        $("html, body").animate({ scrollTop: 0 }, "slow");
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

    function deleteSliderImage(id){

        var conf = confirm('Do you really want to delete this item ?')
        if(!conf){
            return false;
        }
        $.ajax({
            url: "{{route('admin.delete.project.slider')}}",
            type: "POST",
            data: {_token:'{{csrf_token()}}',id:id},
            success: function(response) {
                if(response.status == true){
                    $('.slidercolms-'+id).hide();
                }
            },
        });
    }

    function deleteFloorPlan(id){
        var conf = confirm('Do you really want to delete this item ?')
        if(!conf){
            return false;
        }
        $.ajax({
            url: "{{route('admin.delete.project.floor.plan')}}",
            type: "POST",
            data: {_token:'{{csrf_token()}}',id:id},
            success: function(response) {
                if(response.status == true){
                    $('.floorplancolms-'+id).hide();
                }
            },
        });
    }
</script>
@endpush