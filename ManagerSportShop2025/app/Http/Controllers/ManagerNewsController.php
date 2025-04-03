<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;

 class ManagerNewsController extends Controller{
        public function listNew(){
            $news = news::paginate(5);
            return view('page.manager_news',compact('news'));
        }


        public function create(){
            return view('page.manager_news_create');
        }

        public function store(Request $req){
            $req -> validate([
                'title' => 'nullable|string',
                'content' => 'nullable|string',
                'image' => 'nullable|string|max:2048' 
            ]);


            $new = new news();
            $new->title = $req->title;
            $new->content = $req->content;
            $new->image = $req->image;
            $new->save();

            return redirect()->route('manager_news')->with('success', 'Thêm tin tức mới thành công!');
            
        }

        public function edit($id){
            $new = news::findOrFail($id);
            return view('page.manager_news_edit', compact('new'));

        }

        public function update(Request $req,$id){
            
            $req -> validate([
                'title' => 'nullable|string',
                'content' => 'nullable|string',
                'image' => 'nullable|string|max:2048' 
            ]);
            $new = news::findOrFail($id);
            $new->title = $req->title;
            $new->content = $req->content;
            $new->image = $req->image;
            $new->save();

           return redirect()->route('manager_news')->with('success', 'Cập nhật tin tức mới thành công!');

        }


        public function destroy($id){
            $new = news::findOrFail($id);
            $new-> delete();
            return redirect()->route('manager_news')->with('success', 'xóa tin tức thành công!');

        }


        
 }