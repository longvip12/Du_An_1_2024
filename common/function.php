<?php
// hàm render view
function view($path_view, $data=[]){
    extract($data);
    
    $path_view = str_replace(".", "/", $path_view);
    include_once ROOT_DIR . "views/$path_view.php";
}
// hàm dd dùng để debug lỗi 
function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
function session_flash($key)
{
    $message = $_SESSION[$key] ?? '';
    unset($_SESSION[$key]);
    return $message;
}
// chuyển đổi trạng thái đơn hàng
function getOderStatus($status){
    $status_details=[
        1 => 'chờ xử lý',
        2=> 'Đang xử lý',
        3 => 'Hoàn Thành',
        4 => 'Đã Hủy'
    ];
    return $status_details[$status];
}

function clearCart(){
        unset($_SESSION['cart']);
        unset($_SESSION['totalQuantity']);
        unset($_SESSION['URI']);
    }
