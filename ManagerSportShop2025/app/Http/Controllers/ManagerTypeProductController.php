<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\typeproduct;

class ManagerTypeProductController extends Controller{
    public function getListTypeProduct(){
        $type_products = typeproduct::all();
        return view('page.manager_type_products',compact('type_products'));
    }

    public function create(){
        return view('page.manager_type_product_create');
    }

    public function store(Request $req){
        $req->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:2048' 
        ]);


        $type_product = new typeproduct();
        $type_product-> name = $req->name;
        $type_product -> description = $req->description;
        $type_product -> image = $req -> image;
        $type_product ->save();
        return redirect()->route('manager_type_products')->with('success', 'Thêm loại sản phẩm thành công!');
    }


    public function edit($id){
        $type_product = typeproduct::findOrFail($id);
        return view('page.manager_type_products_edit',compact('type_product'));
    }
    

    public function update(Request $req,$id){
        $req->validate([
            'name'=> 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:2048' 
        ]);

        $type_product = typeproduct::findOrFail($id);
        $type_product-> name = $req->name;
        $type_product -> description = $req->description;
        $type_product -> image = $req -> image;
        $type_product ->save();
        return redirect()->route('manager_type_products')->with('success', 'cập nhật loại sản phẩm thành công!');

    }


    public function destroy($id)
    {
        $type_product = typeproduct::findOrFail($id);
        
        if ($type_product->product()->count() > 0) {
            return redirect()->route('manager_type_products')->with('error', 'Không thể xóa! Vẫn còn sản phẩm thuộc loại này.');
        }
    
        $type_product->delete();
        return redirect()->route('manager_type_products')->with('success', 'Xóa loại sản phẩm thành công!');
    }
    
}