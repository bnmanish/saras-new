@extends('backend/layouts/main')
@section('title', 'Edit Gallery Category | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Gallery Category</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Gallery Category</li>
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
                        <form method="post" action="{{route('admin.edit.store.gallery_category',$data->id)}}">
                            @csrf

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Name <span class="text-danger">*</span></label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="text" name="name" placeholder="Category Name *" value="{{$data->name}}">
                                     @if($errors->first('name'))
                                     <p class="text-danger mb-0">{{ $errors->first('name') }}</p>
                                     @endif
                                 </div>
                             </div>

                             <div class="mb-3 row">
                                 <label class="col-md-2 col-form-label">Status <span class="text-danger">*</span></label>
                                 <div class="col-md-10">
                                     <select class="form-control" name="status">
                                         <option value="1" {{ $data->status == '1' ? 'selected' : '' }}>Active</option>
                                         <option value="0" {{ $data->status == '0' ? 'selected' : '' }}>Inactive</option>
                                     </select>
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