<?php
class CartController
{
    public function addCart()
    {
        $carts = $_SESSION['cart'] ?? []; //tạo giỏ hàng
        //lấy id để thêm vào giỏ hàng
        $id = $_GET['id'];
        //lấy sản phẩm theo id
        $product = (new Product)->find($id);
        //Kiểm tra sản phẩm có trong giỏ hàng
        if (isset($carts[$id])) {
            $carts[$id]['quantity'] += 1;
        } else {
            $carts[$id] = [
                'name' => $product['name'],
                'image' => $product['image'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        }
        //Lưu giỏ hàng vào session
        $_SESSION['cart'] = $carts;
        $uri = $_SESSION['URI']; //Lấy đường dẫn
        header("location: " . $uri);
    }
    //tình tổng số lượng sản phẩm trong giỏ hàng
    public function totalQuantityCart()
    {
        $carts = $_SESSION['cart'] ?? [];
        $totalQuantity = 0;
        foreach ($carts as $cart) {
            $totalQuantity += $cart['quantity'];
        }
        
        return $totalQuantity;
    }
}