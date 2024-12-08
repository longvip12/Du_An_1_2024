<?php
//AdminProductController Điều sản phẩm
class AdminProductController{
    public function __construct(){
    $user = $_SESSION['user']??[];
    if(!$user || $user['role'] != 'admin'){
        header("location: " . ROOT_URL);
        }
    }
    //hàm index để hiển thị danh sách sản phẩm
    public function index(){
        // lấy thông tin message từ session 
        $message = $_SESSION['message'] ?? '';
        unset($_SESSION['message']);
        $products = (new Product)->all();
        return view("admin.products.list", compact('products', 'message'));
    }
    // Hàm create hiển thị form thêm mới
    public function create(){
        $categories = (new Category)->all();
        $title = "Thêm sản phẩm";
        return view("admin.products.add", compact('categories', 'title'));
    }
    // Hàm store dùng để lưu dữ liệu thêm vào database
    public function store(){
        $data = $_POST;
        $image = ""; // khi người dùng không upload ảnh
        // nếu người dùng uplload ảnh
        $file = $_FILES['image'];
        if ($file['size']>0) {
            // lấy ảnh 
            $image = "img/" . $file['name'];
            // upload ảnh
            move_uploaded_file($file['tmp_name'], ROOT_DIR . $image);
        }
        // đưa ảnh vào $data
        $data['image'] = $image;
        $product = new Product;
        $product->create($data);
        header("location: " . ADMIN_URL . "?ctl=listsp");
    }
    // Hàm edit dùng để hiển thị forrm cập nhật
    public function edit(){
        $id = $_GET['id'];
        $product = (new Product)->find($id);
        $categories = (new Category)->all();
        $title = "cập nhật sản phẩm: " . $product['name'];
        return view("admin.products.edit", compact('product', 'categories', 'title'));
    }
    // cập nhật sản phẩm 
    public function update(){
        $data = $_POST;
        
        // lấy sản phẩm hiện tại
        $product = new Product;
        $item = $product->find($data['id']);
        $image = $item['image'];
         $image = ""; // khi người dùng không upload ảnh
        // nếu người dùng uplload ảnh
        $file = $_FILES['image'];
        if ($file['size']>0) {
            // lấy ảnh 
            $image = "img/" . $file['name'];
            // upload ảnh
            move_uploaded_file($file['tmp_name'], ROOT_DIR . $image);
        }
        // đưa ảnh vào $data
        $data['image'] = $image;

        $product->update($data['id'], $data);

        header("location: " . ADMIN_URL . "?ctl=listsp");
        die;
    }

    // xóa sản phẩm
    public function delete(){
        $id = $_GET['id'];
        //xóa sp 
        (new Product)->delete($id);
        //session lưu thông báo khi xóa thành công
        $_SESSION['message'] = 'xóa dữ liệu thành công';
        // về giao diện khi danh sách sản phẩm
        header("location: " . ADMIN_URL . "?ctl=listsp");
        die;
    }
}