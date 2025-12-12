@extends('backend/layouts/main')
@section('title', 'Login Logs | River Edge')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Login Logs</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Login Logs</li>
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

                        <!-- Filters -->
                        <div class="row mb-4">
                            <div class="col-md-3 mb-3">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                         <div class="col-md-6 mb-3">
                                 <label for="username">Username/Email</label>
                                 <input type="text" class="form-control" id="username" name="username" placeholder="Username or Email">
                             </div>

                        </div>

                             <div class="col-md-6 mb-3">
                                 <label>&nbsp;</label>
                                 <div class="d-flex gap-2">
                                     <button type="button" class="btn btn-primary" id="filterBtn">Filter</button>
                                     <button type="button" class="btn btn-success" id="exportCsvBtn">Export CSV</button>
                                     <button type="button" class="btn btn-info" id="exportExcelBtn">Export Excel</button>
                                 </div>
                             </div>
                        </div>

                        <table id="loginLogsTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
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
$(document).ready(function () {
    var table = $('#loginLogsTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 10,
        ajax: {
            url: '{{route("admin.login.logs.data")}}',
           data: function(d) {
                 d.start_date = $('#start_date').val();
                 d.end_date = $('#end_date').val();
                 d.username = $('#username').val();
             }
        },
       columns: [
             { data: 'id', name: 'id' },
             { data: 'username_display', name: 'username' },
             { data: 'email_display', name: 'email' },
             { data: 'created_at_formatted', name: 'created_at' }
         ],
        order: [[3, 'desc']]
    });

    // Leave dates empty for default today's data filtering

    $('#filterBtn').on('click', function() {
        table.ajax.reload();
    });

    // Export buttons
    $('#exportCsvBtn').on('click', function() {
        exportData('csv');
    });

    $('#exportExcelBtn').on('click', function() {
        exportData('excel');
    });

   function exportData(format) {
         var params = {
             start_date: $('#start_date').val(),
             end_date: $('#end_date').val(),
             username: $('#username').val(),
             format: format
         };

        var url = '{{ route("admin.login.logs.export") }}?' + $.param(params);
        window.open(url, '_blank');
    }

  // Auto filter on input change
     $('#start_date, #end_date, #username').on('change keyup', function() {
         table.ajax.reload();
     });
});
</script>
@endpush