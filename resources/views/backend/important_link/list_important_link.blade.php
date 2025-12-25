@extends('backend/layouts/main')
@section('title', 'Important Links List | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Important Links List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Important Links List</li>
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

                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Great!</strong> {{Session::get('success')}}
                        </div>
                        @endif

                        <div class="row mb-4 border-bottom">
                            <div class="col-6">
                                <h4 class="card-title">Manage Important Links</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="card-title text-end"><a href="{{route('admin.add.important_link')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a></h4>
                            </div>
                        </div>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php $sl = 1; @endphp
                                @foreach($data as $dataRow)
                                <tr>
                                    <td>{{$sl}}</td>
                                    <td>{{$dataRow->title}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info me-1" onclick="copyToClipboard('{{$dataRow->link}}')" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy Link"><i class="fas fa-copy"></i></button>
                                        <a href="{{$dataRow->link}}" target="_blank" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Open Link"><i class="fas fa-external-link-alt"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.edit.important_link',$dataRow->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('admin.delete.important_link',$dataRow->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Really! Do you want to delete?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @php $sl++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@stop
@push('scripts')
<script>
function copyToClipboard(link) {
    navigator.clipboard.writeText(link).then(function() {
        // Show flash message
        showFlashMessage('Copied to clipboard!');
    });
}

function showFlashMessage(message) {
    // Create or find a flash message div
    let flashDiv = document.getElementById('flash-message');
    if (!flashDiv) {
        flashDiv = document.createElement('div');
        flashDiv.id = 'flash-message';
        flashDiv.className = 'alert alert-success alert-dismissible fade show position-fixed';
        flashDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        flashDiv.innerHTML = '<button type="button" class="btn-close" data-bs-dismiss="alert"></button><strong>Success!</strong> <span id="flash-text"></span>';
        document.body.appendChild(flashDiv);
    }
    document.getElementById('flash-text').textContent = message;
    flashDiv.classList.add('show');
    setTimeout(function() {
        flashDiv.classList.remove('show');
    }, 3000);
}
</script>
@endpush