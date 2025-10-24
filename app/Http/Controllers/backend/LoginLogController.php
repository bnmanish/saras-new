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
        $query = LoginLog::with('user');

        // Apply filters
        if ($request->has('start_date') && $request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->has('end_date') && $request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        if ($request->has('username') && $request->username) {
            $query->where('username', 'like', '%' . $request->username . '%');
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
}
