<?php

namespace App\Controllers\Admin;

use App\Models\Payment;

class PaymentController extends AdminController
{
    public function index()
    {
        return view('admin.payments.view', [
            'payments' => Payment::select([
                'payments.*',
                'date_format(created_at, "%d.%m.%Y в %H:%i") as created_at'
            ])->orderBy(['id' => 'desc'])
               ->limit(20)
               ->get()
        ]);
    }

    public function load()
    {
        return view('admin.payments.payment', [
            'payments' => Payment::select([
                'payments.*',
                'date_format(created_at, "%d.%m.%Y в %H:%i") as created_at'
            ])->orderBy(['id' => 'desc'])
               ->limit(10, (int) $this->request->post('load'))
               ->get()
        ]);
    }

    public function search()
    {
        $like = $this->request->post('search');
        return view('admin.payments.payment', [
            'payments' => Payment::select([
                'payments.*',
                'date_format(created_at, "%d.%m.%Y в %H:%i") as created_at'
            ])->where([
                "username LIKE ? OR pay_id LIKE ?" => ["{$like}%", "{$like}%"]
            ])->orderBy(['id' => 'desc'])
               ->get()
        ]);
    }
}