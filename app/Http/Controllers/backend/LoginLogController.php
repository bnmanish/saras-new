<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoginLog;
use Yajra\DataTables\DataTables;

class LoginLogController extends Controller
{
    public function index()
    {
        return view('backend.login_log.list_login_logs');
    }

    public function getData(Request $request)
    {
        $query = LoginLog::query();

        if ($request->has('start_date') && $request->start_date) {
            $query->whereDate('login_logs.created_at', '>=', $request->start_date);
        } else {
            $query->whereDate('login_logs.created_at', '>=', today());
        }

        if ($request->has('end_date') && $request->end_date) {
            $query->whereDate('login_logs.created_at', '<=', $request->end_date);
        } else {
            $query->whereDate('login_logs.created_at', '<=', today());
        }

        if ($request->has('username') && $request->username) {
            $query->where(function($q) use ($request) {
                $q->where('login_logs.username', 'like', '%' . $request->username . '%')
                  ->orWhere('login_logs.email', 'like', '%' . $request->username . '%');
            });
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('username_display', function ($log) {
                return $log->username ?: 'N/A';
            })
            ->addColumn('email_display', function ($log) {
                return $log->email ?: 'N/A';
            })
            ->addColumn('status_badge', function ($log) {
                return '<span class="badge bg-success">Success</span>';
            })
            ->addColumn('created_at_formatted', function ($log) {
                return $log->created_at->format('Y-m-d H:i:s');
            })
            ->orderColumn('username_display', function ($query, $order) {
                $query->orderBy('login_logs.username', $order);
            })
            ->rawColumns(['status_badge'])
            ->make(true);
    }

    public function export(Request $request)
    {
        $query = LoginLog::query();

        if ($request->has('start_date') && $request->start_date) {
            $query->whereDate('login_logs.created_at', '>=', $request->start_date);
        } else {
            $query->whereDate('login_logs.created_at', '>=', today());
        }

        if ($request->has('end_date') && $request->end_date) {
            $query->whereDate('login_logs.created_at', '<=', $request->end_date);
        } else {
            $query->whereDate('login_logs.created_at', '<=', today());
        }

        if ($request->has('username') && $request->username) {
            $query->where(function($q) use ($request) {
                $q->where('login_logs.username', 'like', '%' . $request->username . '%')
                  ->orWhere('login_logs.email', 'like', '%' . $request->username . '%');
            });
        }

        $logs = $query->orderBy('login_logs.created_at', 'desc')->get();

        $format = $request->get('format', 'csv');

        if ($format === 'excel') {
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

            fputcsv($file, ['ID', 'Username', 'Email', 'Created At']);

            foreach ($logs as $log) {
                fputcsv($file, [
                    $log->id,
                    $log->username ?: 'N/A',
                    $log->email ?: 'N/A',
                    $log->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}