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
        //Tính tổng tiền trong giỏ hàng
    public function totalPriceInOrder()
    {
        $carts = $_SESSION['cart'] ?? [];

        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['price'] * $cart['quantity'];
        }
        return $total;
    }

    //Hiển thị giỏ hàng
    public function viewCart()
    {
        $carts = $_SESSION['cart'] ?? [];
        $totalPriceInOrder = $this->totalPriceInOrder();
        $categories = (new Category)->all();
        $totalQuantity = (new CartController)->totalQuantityCart($carts);

        return view('clients.carts.cart', compact('carts', 'totalPriceInOrder', 'categories', 'totalQuantity'));
    }

    //Xóa sản phẩm trong giỏ hàng
    public function deleteProductInCart()
    {
        //lấy id sản phẩm
        $id = $_GET['id'];
        //Xóa sản phẩm trong giỏ hàng
        unset($_SESSION['cart'][$id]);
        //chuyển về giỏ hàng
        $_SESSION['totalQuantity'] = (new CartController)->totalQuantityCart();
        return header("location: " . ROOT_URL . '?ctl=view-cart');
    }

    //Cập nhật giỏ hàng
    public function updateCart()
    {

        $quantities = $_POST['quantity'];
        foreach ($quantities as $id => $qty) {
            $_SESSION['cart'][$id]['quantity'] = $qty;
        }
        return header("Location: " . ROOT_URL . '?ctl=view-cart');
    }
        //Hiển thị thông tin thanh toán
    public function viewCheckout() {
        //kiểm tra xem người dùng đăng nhập chưa, nếu chưa thì vào login
        if (!isset($_SESSION['user'])) {
            return header("location: " . ROOT_URL . '?ctl=login');
    }

    $user = $_SESSION['user'];
    $carts = $_SESSION['cart'] ?? [];
    $categories = (new Category)->all();

    $totalPriceInOrder = (new CartController)->totalPriceInOrder($carts);
    $totalQuantity = (new CartController)->totalQuantityCart($carts);

    return view("clients.carts.checkout", compact('user', 'carts', 'totalPriceInOrder', 'totalQuantity', 'categories'));
}
        //THanh toán
    public function checkout() {
        //Lấy thông tin người dùng
        $user = [
            'id' => $_POST['id'],
            'fullname' => $_POST['fullname'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'role' => $_SESSION['user']['role'],
            'active' => $_SESSION['user']['active'],
        ];
        $payment_method = $_POST['payment_method'];
        dd($payment_method);
        if ($payment_method === null) {
        // Trả về lỗi hoặc thông báo cho người dùng chọn phương thức thanh toán
        // die("Vui lòng chọn phương thức thanh toán");
        // echo ("Thanh toán thành công");
        // die;
        header("Location: " . ROOT_URL . "?ctl=success");
        exit();
        }

        //Lấy thông tin thanh toán
        $order = [
            'user_id' => $_POST['id'],
            'status' => 1,
            'payment_method' => $_POST['payment_method'],
            'total_price' => $this->totalPriceInOrder()
        ];

        (new User)->update($user['id'], $user);
        $order_id = (new Order)-> create($order);
        $carts = $_SESSION['cart'];
        foreach( $carts as $id => $cart ){
            $or_detail = [
                'order_id' => $order_id,
                'product_id' => $id,
                'price' => $cart['price'],
                'quantity' => $cart['quantity']
            ];
            (new Order)->createOrderDetail($or_detail);
        }
        clearCart(); //Xóa thông tin giỏ hàng
        //echo "Đặt hàng thành công";
        return header("Location: " . ROOT_URL . "?ctl=success");

    }   
    //xóa giỏ hàng
    public function success() {
        clearCart(); //Xóa thông tin giỏ hàng
        $categories = (new Category)->all();
        $totalPriceInOrder = (new CartController)->totalPriceInOrder();
        $totalQuantity = (new CartController)->totalQuantityCart();
        return view("clients.carts.success",  compact(  'totalPriceInOrder', 'totalQuantity', 'categories'));

    }
    

}