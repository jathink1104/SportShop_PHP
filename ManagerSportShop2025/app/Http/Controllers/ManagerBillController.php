<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bills;
use App\Models\customer;
use App\Models\billdetail;

class ManagerBillController extends Controller
{
    public function listBill()
    {
        $bills = bills::with('bill_detail', 'bill')->get();
        return view('page.manager_bill_list', compact('bills'));
    }

    public function show($id)
    {
        $bill = Bills::with('bill_detail', 'bill')->findOrFail($id);
        return view('page.manager_bill_show', compact('bill'));
    }

    public function create()
    {
        $customers = customer::all();
        return view('page.manager_bill_create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_customer' => 'required|exists:customer,id',
            'date_order' => 'required|date',
            'total' => 'required|numeric',
            'payment' => 'required|string|max:200',
            'note' => 'nullable|string|max:500',
        ]);

        $bill = new bills();
        $bill->id_customer = $request->id_customer;
        $bill->date_order = $request->date_order;
        $bill->total = $request->total;
        $bill->payment = $request->payment;
        $bill->note = $request->note;
        $bill->save();

        return redirect()->route('manager_bills')->with('success', 'Thêm hóa đơn thành công!');
    }

    public function edit($id)
    {
        $bill = bills::findOrFail($id);
        $customers = customer::all();
        return view('page.manager_bill_edit', compact('bill', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_customer' => 'required|exists:customer,id',
            'date_order' => 'required|date',
            'total' => 'required|numeric',
            'payment' => 'required|string|max:200',
            'note' => 'nullable|string|max:500',
        ]);

        $bill = bills::findOrFail($id);
        $bill->id_customer = $request->id_customer;
        $bill->date_order = $request->date_order;
        $bill->total = $request->total;
        $bill->payment = $request->payment;
        $bill->note = $request->note;
        $bill->save();

        return redirect()->route('manager_bills')->with('success', 'Cập nhật hóa đơn thành công!');
    }

    // Xóa hóa đơn
    public function destroy($id)
    {
        $bill = bills::findOrFail($id);
        $bill->delete();

        return redirect()->route('manager_bills')->with('success', 'Xóa hóa đơn thành công!');
    }
}
