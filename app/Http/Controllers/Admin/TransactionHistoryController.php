<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Carbon\Carbon;

class TransactionHistoryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        // Filter parameters
        $search = $request->get('search', '');
        $fromDate = $request->get('from-date', '');
        $toDate = $request->get('to-date', '');
        $status = $request->get('status', '');

        // Query builder
        $query = Order::with('user');

        // Apply search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('invoice_number', 'like', '%' . $search . '%')
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'like', '%' . $search . '%');
                  });
            });
        }

        // Apply date filters
        if ($fromDate) {
            $query->whereDate('created_at', '>=', $fromDate);
        }
        if ($toDate) {
            $query->whereDate('created_at', '<=', $toDate);
        }

        // Apply status filter
        if ($status) {
            if ($status === 'lunas') {
                $query->whereIn('status', ['paid', 'proses', 'selesai']);
            } elseif ($status === 'belum') {
                $query->where('status', 'unpaid');
            }
        }

        // Get transactions with pagination
        $transactions = $query->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.transaction-history', compact('transactions', 'search', 'fromDate', 'toDate', 'status'));
    }
} 