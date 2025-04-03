<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;

class ManagerCustomerController extends Controller {
    public function ListCustomer() {
        $customers = Customer::paginate(5);
        return view('page.manager_customers', compact('customers'));
    }

    public function create() {
        return view('page.manager_customer_create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:100',
            'gender' => 'nullable|string|max:10',
            'email' => 'nullable|email|max:50',
            'address' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'note' => 'nullable|string|max:200',
            'image' => 'nullable|string|max:2048',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->note = $request->note;
        $customer->image = $request->image;

        $customer->save();

        return redirect()->route('manager_customers')->with('success', 'Thêm khách hàng thành công!');
    }

    public function edit($id) {
        $customer = Customer::findOrFail($id);
        return view('page.manager_customer_edit', compact('customer'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:100',
            'gender' => 'nullable|string|max:10',
            'email' => 'nullable|email|max:50',
            'address' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'note' => 'nullable|string|max:200',
            'image' => 'nullable|string|max:2048',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->note = $request->note;
        $customer->image = $request->image;

        $customer->save();

        return redirect()->route('manager_customers')->with('success', 'Cập nhật khách hàng thành công!');
    }

    public function destroy($id) {
        $customer = Customer::findOrFail($id);
        if ($customer->bills()->count() > 0) {
            return redirect()->route('manager_customers')->with('error', 'Không thể xóa! Vẫn còn hóa đơn của khách hàng này.');
        }
        $customer->delete();
        return redirect()->route('manager_customers')->with('success', 'Xóa khách hàng thành công!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $customers = Customer::where('name', 'LIKE', "%$query%")
            ->orWhere('email', 'LIKE', "%$query%")
            ->paginate(5);

        return view('page.manager_customers', compact('customers'));
    }
}
