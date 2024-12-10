<?php

class OrderController{
    public function index(){
        $orders = (new Order)->all();
        return view("admin.orders.list", compact('orders'));
    }
    public function showOrder(){
        $id = $_GET['id'];
        $message ="";
        if($_SERVER['REQUEST_METHOD']==="POST"){    
            $status = $_POST['status'];
            (new Order) ->updateStatus($id,$status);
            $message = "Cập nhật trạng thái thành công";
        }
        $order = (new Order)->find($id);
        $order_details = (new Order)->listOrderDetail($id);
        $status = (new Order) -> status_details;
        
        return view("admin.orders.detail", compact('order', 'order_details','status', 'message'));
    } 
    // Hiển thị hóa đơn danh sách của user id 
    public function showOrderUser(){
        $user_id = $_SESSION['user']['id'];
        $orders = (new Order)->finOrderUser($user_id);
        $categories = (new Category)  ->all();
        $user = $_SESSION['user'];
        $totalPriceInOrder = (new CartController)->totalPriceInOrder();
        $totalQuantity = (new CartController)->totalQuantityCart();
        return view("admin.users.list-order", compact('orders', 'categories','user','totalPriceInOrder','totalQuantity'));
    }
    public function detailOrderUser(){
        $id = $_GET['id'];
        if($_SERVER['REQUEST_METHOD'] === "POST"){    
            (new Order) ->updateStatus($id, 4);
            
        }
        $order = (new Order)->find($id);
        $order_details = (new Order)->listOrderDetail($id);
        $status = (new Order) -> status_details;
        $categories = (new Category)->all();
        $totalPriceInOrder = (new CartController)->totalPriceInOrder();
        $totalQuantity = (new CartController)->totalQuantityCart();
        return view("admin.users.detail-order", compact('order', 'order_details','status','totalPriceInOrder','totalQuantity','categories'));
    }
}