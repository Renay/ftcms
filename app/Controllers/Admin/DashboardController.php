<?php

namespace App\Controllers\Admin;

use App\Models\Dashboard;
use App\Models\User;
use Engine\Helper\Cookie;

class DashboardController extends AdminController
{
    public function index()
    {
        if (User::find(Cookie::get('auth_user_id'))['role'] == 'admin') {
            return view('admin.dashboard.view', [
                'pieChart' => (new Dashboard)->pieChart(),
                'lineChart' => (new Dashboard)->lineChart(),
                'income' => (new Dashboard)->getIncomeToday(),
                'orders' => (new Dashboard)->getOrdersToday()
            ]);
        }

        return view('admin.console.view');
    }
}