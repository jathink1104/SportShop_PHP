<?php
namespace App\Http\Controllers;

use App\Models\bills;

class HistoryOrderController extends Controller
{
   public function getHistoryOrder(){
    $bill = bills::paginate(3);
    return view('page.HistoryOrder',compact('bill'));
   }






}
