<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        // جلب العقود مع آخر فاتورة
        $contracts = \App\Models\Contract::with(['bills' => function($q) {
            $q->latest('due_date');
        }])->get();

        // تجهيز البيانات للتصميم
        $contracts = $contracts->map(function($contract) {
            $lastBill = $contract->bills->first();
            return [
                'id' => $contract->contract_number,
                'name' => $contract->title,
                'type' => 'electricite', // يمكنك التغيير حسب قاعدة البيانات
                'status' => ucfirst($contract->status),
                'address' => 'Adresse non renseignée', // أضف عمود address إذا كان متوفر
                'amount' => $lastBill ? $lastBill->amount : $contract->total_amount,
                'consumption' => null, // أضف استهلاك إذا كان متوفر
                'last_invoice_date' => $lastBill ? $lastBill->due_date : null,
            ];
        });

        return view('contracts.index', ['contracts' => $contracts]);
    }
}
