<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoginLog;
use Yajra\DataTables\DataTables;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LoginLogController extends Controller
{
    public function index()
    {
        return view('backend.login_log.list_login_logs');
    }

    public function getData(Request $request)
    {
        $query = LoginLog::with('user');

        // Default to today's data if no date filters provided
        if (!$request->has('start_date') || !$request->start_date) {
            $query->whereDate('created_at', '>=', today());
        } else {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if (!$request->has('end_date') || !$request->end_date) {
            $query->whereDate('created_at', '<=', today());
        } else {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->has('username') && $request->username) {
            $query->where(function($q) use ($request) {
                $q->where('username', 'like', '%' . $request->username . '%')
                  ->orWhereHas('user', function($userQuery) use ($request) {
                      $userQuery->where('email', 'like', '%' . $request->username . '%');
                  });
            });
        }
        if ($request->has('ip_address') && $request->ip_address) {
            $query->where('ip_address', 'like', '%' . $request->ip_address . '%');
        }
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        return DataTables::of($query)
            ->addColumn('id', function ($log) {
                return $log->id;
            })
            ->addColumn('username', function ($log) {
                return $log->username ?: ($log->user ? $log->user->email : 'N/A');
            })
            ->addColumn('location_info', function ($log) {
                return $log->ip_address . ($log->location ? ' (' . $log->location . ')' : '');
            })
            ->addColumn('status_badge', function ($log) {
                return $log->status == 'success' ?
                    '<span class="badge bg-success">Success</span>' :
                    '<span class="badge bg-danger">Fail</span>';
            })
            ->addColumn('created_at_formatted', function ($log) {
                return $log->created_at->format('Y-m-d H:i:s');
            })
            ->rawColumns(['status_badge'])
            ->make(true);
    }

    public function export(Request $request)
    {
        $query = LoginLog::with('user');

        // Apply the same filters as getData
        if (!$request->has('start_date') || !$request->start_date) {
            $query->whereDate('created_at', '>=', today());
        } else {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if (!$request->has('end_date') || !$request->end_date) {
            $query->whereDate('created_at', '<=', today());
        } else {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->has('username') && $request->username) {
            $query->where(function($q) use ($request) {
                $q->where('username', 'like', '%' . $request->username . '%')
                  ->orWhereHas('user', function($userQuery) use ($request) {
                      $userQuery->where('email', 'like', '%' . $request->username . '%');
                  });
            });
        }
        if ($request->has('ip_address') && $request->ip_address) {
            $query->where('ip_address', 'like', '%' . $request->ip_address . '%');
        }
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $logs = $query->orderBy('created_at', 'desc')->get();

        $format = $request->get('format', 'csv');

        if ($format === 'excel') {
            // For Excel, we'll use CSV with Excel headers for now
            // In a real app, you'd use a package like maatwebsite/excel
            return $this->exportAsCsv($logs, 'login_logs.xlsx');
        }

        return $this->exportAsCsv($logs);
    }

    private function exportAsCsv($logs, $filename = 'login_logs.csv')
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($logs) {
            $file = fopen('php://output', 'w');

            // CSV headers
            fputcsv($file, ['ID', 'Username', 'IP Address', 'Location', 'Status', 'Created At']);

            // CSV data
            foreach ($logs as $log) {
                fputcsv($file, [
                    $log->id,
                    $log->username ?: ($log->user ? $log->user->email : 'N/A'),
                    $log->ip_address,
                    $log->location ?: '',
                    $log->status,
                    $log->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
