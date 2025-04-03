<?php
namespace App\Http\Controllers;

class AdminController extends Controller{
    public function getDashBoard(){
        return view('page.dashboard');
    }
}