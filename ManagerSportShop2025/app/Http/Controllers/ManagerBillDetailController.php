<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\billdetail;
use App\Models\bills;
use App\Models\product;

class ManagerBillDetailController extends Controller
{
    public function listBillDetails()
    {
        $billDetails = billdetail::with(['bill', 'product'])->get();
        return view('page.manager_bill_detail_list', compact('billDetails'));
    }

    public function create()
    {
        $bills = bills::all();
        $products = product::all();
        return view('page.manager_bill_detail_create', compact('bills', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bill' => 'required|exists:bills,id',
            'id_product' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0'
        ]);
        $billDetail = new billdetail();
        $billDetail->id_bill= $request->id_bill;
        $billDetail->id_product= $request->id_product;
        $billDetail->quantity= $request->quantity;
        $billDetail->unit_price= $request->unit_price;
        $billDetail->save();
        return redirect()->route('manager_bill_details')->with('success', 'Thêm chi tiết hóa đơn thành công!');
    }

    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $billDetail = billdetail::findOrFail($id);
        $bills = bills::all();
        $products = product::all();
        return view('page.manager_bill_detail_edit', compact('billDetail', 'bills', 'products'));
    }

    // Xử lý cập nhật chi tiết hóa đơn
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_bill' => 'required|exists:bills,id',
            'id_product' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0'
        ]);
        
        $billDetail = billdetail::findOrFail($id);
        $billDetail->id_bill= $request->id_bill;
        $billDetail->id_product= $request->id_product;
        $billDetail->quantity= $request->quantity;
        $billDetail->unit_price= $request->unit_price;
        $billDetail->save();
        return redirect()->route('manager_bill_details')->with('success', 'Cập nhật chi tiết hóa đơn thành công!');
    }

    // Xóa chi tiết hóa đơn
    public function destroy($id)
    {
        billdetail::findOrFail($id)->delete();
        return redirect()->route('manager_bill_details')->with('success', 'Xóa chi tiết hóa đơn thành công!');
    }
}