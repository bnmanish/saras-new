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
        $query = LoginLog::leftJoin('users', 'login_logs.user_id', '=', 'users.id')
                         ->select('login_logs.*', 'users.email as user_email');

        // Apply filters - default to today's data if no dates provided
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
                  ->orWhere('users.email', 'like', '%' . $request->username . '%');
            });
        }
        if ($request->has('ip_address') && $request->ip_address) {
            $query->where('ip_address', 'like', '%' . $request->ip_address . '%');
        }
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('username', function ($log) {
                return $log->username ?: ($log->user_email ?: 'N/A');
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
            ->orderColumn('username', function ($query, $order) {
                $query->orderByRaw("COALESCE(login_logs.username, users.email, 'N/A') $order");
            })
            ->orderColumn('location_info', function ($query, $order) {
                $query->orderBy('login_logs.ip_address', $order);
            })
            ->rawColumns(['status_badge'])
            ->make(true);
    }

    public function export(Request $request)
    {
        $query = LoginLog::leftJoin('users', 'login_logs.user_id', '=', 'users.id')
                         ->select('login_logs.*', 'users.email as user_email');

        // Apply the same filters as getData - default to today's data if no dates provided
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
                  ->orWhere('users.email', 'like', '%' . $request->username . '%');
            });
        }
        if ($request->has('ip_address') && $request->ip_address) {
            $query->where('ip_address', 'like', '%' . $request->ip_address . '%');
        }
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
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

            fputcsv($file, ['ID', 'Username', 'IP Address', 'Location', 'Status', 'Created At']);

            foreach ($logs as $log) {
                fputcsv($file, [
                    $log->id,
                    $log->username ?: ($log->user_email ?: 'N/A'),
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
