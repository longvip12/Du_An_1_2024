<?php

class Order extends BaseModel{
    //Lưu trạng thái đơn hàng
        public $status_details=[
        1 => 'chờ xử lý',
        2=> 'Đang xử lý',
        3 => 'Hoàn Thành',
        4 => 'Đã Hủy'
    ];
    //tất cả hóa đơn
    public function all(){
        $sql = "SELECT o.*, fullname, email, address, phone FROM orders o JOIN users u ON o.user_id=u.id ORDER BY o.id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //chi tiết hóa đơn
    public function find($id){
        $sql = "SELECT o.*, fullname, email, address, phone 
        FROM orders o JOIN users u ON o.user_id=u.id 
        WHERE o.id=:id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // danh sách sản phẩm $id: mã hóa đơn
    public function listOrderDetail($id){
        $sql = "SELECT od.*, name, image
        FROM Orders o JOIN order_details od  
        ON o.id = od.order_id
        JOIN products p 
        ON od.product_id = p.id
        WHERE o.id=:id";
         $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //thêm hóa đơn
    public function create($data) {
        $sql = "INSERT INTO orders (user_id, status, payment_method, total_price
        VALUES(:user_id, :status, :payment_method, :total_price)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);

        return $this->conn->lastInsertId();
    }
    //Cập nhật trạng thái
    public function updateStatus($id, $status) {
        $sql = "UPDATE orders SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id, 'status' => $status]);
    }

    //Thêm chi tiết đơn hàng
    public function createOrderDetail($data) {
        $sql = "INSERT INTO order_details(order_id, product_id, price, quantity)
        VALUES(:order_id, :product_id, :price, :quantity)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
}