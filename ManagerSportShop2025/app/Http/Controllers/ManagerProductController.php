<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\typeproduct;

class ManagerProductController extends Controller{
        public function getListProduct()
        {
            $products = product::paginate(5);
            return view('page.manager_products', compact('products'));
        }

        
        public function create()
        {
            $type_product = typeproduct::all();
            return view('page.manager_product_create',compact('type_product'));
        }
    
        // Xử lý thêm sản phẩm
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'id_type' => 'required|integer',
                'description' => 'nullable|string',
                'unit_price' => 'required|numeric',
                'promotion_price' => 'nullable|numeric',
                'image' => 'nullable|string|max:2048' 
            ]);
        
            $product = new Product();
            $product->name = $request->name;
            $product->id_type = $request->id_type;
            $product->description = $request->description;
            $product->unit_price = $request->unit_price;
            $product->promotion_price = $request->promotion_price;
            $product->image = $request->image; // Lưu trực tiếp URL ảnh vào database
        
            $product->save();
        
            return redirect()->route('manager_products')->with('success', 'Thêm sản phẩm thành công!');
        }
        
    
        public function edit($id)
        {
            $product = product::findOrFail($id);
            $type_product = typeproduct::all();

            return view('page.manager_product_edit', compact('product','type_product'));
        }
    
        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'id_type' => 'required|integer',
                'description' => 'nullable|string',
                'unit_price' => 'required|numeric',
                'promotion_price' => 'nullable|numeric',
                'image' => 'nullable|string|max:2048' 
            ]);
        
            $product = product::findOrFail($id);
            $product->name = $request->name;
            $product->id_type = $request->id_type;
            $product->description = $request->description;
            $product->unit_price = $request->unit_price;
            $product->promotion_price = $request->promotion_price;
            $product->image = $request->image; 
        
            $product->save();
        
            return redirect()->route('manager_products')->with('success', 'Cập nhật sản phẩm thành công!');
        }
        
    
        // Xóa sản phẩm
        public function destroy($id)
        {
            $product = product::findOrFail($id);
            if($product->bill_detail()->count()>0){
                return redirect()->route('manager_products')->with('error', 'Không thể xóa! Vẫn còn hóa đơn chứa sản phẩm này.');

            }
            $product->delete();
            return redirect()->route('manager_products')->with('success', 'Xóa sản phẩm thành công!');
        }

        public function search(Request $request)
        {
            $query = $request->input('query');

            $products = product::where('name', 'LIKE', "%$query%")
                ->orWhere('description', 'LIKE', "%$query%")
                ->paginate(5);

            return view('page.manager_products', compact('products'));
        }
}