<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bills;

class ManagerBillStatisticsController extends Controller
{
    public function index()
    {
        $totalBills = bills::count();
        $totalRevenue = bills::sum('total');
        
        $paymentMethods = bills::selectRaw('payment, COUNT(*) as count')
            ->groupBy('payment')
            ->get();

        $revenueByMonth = bills::selectRaw('MONTH(date_order) as month, SUM(total) as revenue')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('page.manager_bills_statistics', compact('totalBills', 'totalRevenue', 'paymentMethods', 'revenueByMonth'));
    }
}
