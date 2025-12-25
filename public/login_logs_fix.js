$(document).ready(function() {
    var table;
    
    // Initialize DataTable with error handling
    function initializeDataTable() {
        table = $('#loginLogsTable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            ajax: {
                url: '{{ route("admin.login.logs.data") }}',
                data: function (d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                    d.username = $('#username').val();
                    d.ip_address = $('#ip_address').val();
                    d.status = $('#statusInput').val();
                }
            },
            columns: [
                { data: 'id', name: 'id', orderable: true, searchable: false },
                { data: 'username', name: 'username', orderable: true, searchable: true },
                { data: 'location_info', name: 'ip_address', orderable: true, searchable: true },
                { data: 'created_at_formatted', name: 'created_at', orderable: true, searchable: false },
                { data: 'status_badge', name: 'status', orderable: true, searchable: false }
            ],
            order: [[3, 'desc']],
            language: {
                processing: "Processing...",
                zeroRecords: "No matching records found",
                emptyTable: "No data available in table",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "Showing 0 to 0 of 0 entries",
                infoFiltered: "Showing _START_ to _END_ of _TOTAL_ entries (filtered from _MAX_ total entries)",
                lengthMenu: "Show _MENU_ entries",
                search: "Search:",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                },
                aria: {
                    sortAscending: ": activate to sort column ascending",
                    sortDescending: ": activate to sort column descending"
                }
            },
            error: function (xhr, settings, help) {
                console.error('DataTables Error:', xhr.responseText);
                console.error('Status:', xhr.status);
                console.error('Response:', xhr.responseText);
                alert('There was an error loading the login logs. Please check the console for details.');
            }
        });
    }
    
    // Try to initialize
    try {
        initializeDataTable();
    } catch (e) {
        console.error('DataTable initialization error:', e);
        alert('There was an error initializing the login logs table. Please refresh the page.');
    }
});