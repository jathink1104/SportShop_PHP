<?php
namespace App\Models;

class cart{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    
    public function __construct($oldCart){
        if($oldCart){
            $this ->items = $oldCart -> items;
            $this ->totalQty = $oldCart -> totalQty;
            $this->totalPrice = $oldCart->totalPrice; 
        }
    }


    public function add($item,$id){
        $giohang = ['qty'=>0,'price'=>$item->unit_price,'item'=>$item];
        if($this -> items){
            if(array_key_exists($id,$this->items)){
                $giohang = $this -> items[$id];
            }
        }
        $giohang['qty']++;
        $giohang['price'] = $item->unit_price  * $giohang['qty'];
        $this -> items[$id] = $giohang;
        $this->totalQty++;
        $this->totalPrice += $item->unit_price;

    }


    // public function add($item, $id)
    // {
    //     // Kiểm tra xem giỏ hàng đã được khởi tạo chưa
    //     // if (!$this->items) {
    //     //     $this->items = [];
    //     // }
    
    //     // Khởi tạo giỏ hàng cho sản phẩm nếu chưa có
    //     $giohang = ['qty' => 0, 'price' => $item->unit_price, 'item' => $item];
    
    //    if($this->items){
    //         if (array_key_exists($id, $this->items)) {
    //             $giohang = $this->items[$id]; // Lấy thông tin sản phẩm từ giỏ hàng
    //         }
    //     }
    
    //     // Tăng số lượng sản phẩm trong giỏ
    //     $giohang['qty']++;
    //     $giohang['price'] = $item->unit_price * $giohang['qty']; // Cập nhật giá trị sản phẩm dựa trên số lượng
    
    //     // Cập nhật lại giỏ hàng
    //     $this->items[$id] = $giohang;
    
    //     // Cập nhật tổng số lượng và tổng giá trị giỏ hàng
    //     $this->totalQty++;
    //     $this->totalPrice += $item->unit_price; // Sửa lại để cộng thêm giá trị của sản phẩm với số lượng
    // }

    public function reduceByOne($id)
    {
        $this->items[$id]['qty']--;
        $this ->items[$id]['price'] -=$this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -=$this->items['id']['price'];
        if($this->items[$id]['qty']<=0){
            unset($this->items[$id]);
        } 
    }


    public function removeItem($id){
        $this->totalQty -=$this->items[$id]['qty'];
        $this->totalPrice = $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
