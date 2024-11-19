<?php
// BaseModel dùng để kết nối  đến cơ sở dữ liệu
class BaseModel{
    // thuộc tính lưu trữ đói tượng kết nối
    public $conn = null;

    public function __construct()
    {
        try {
            $this -> conn = new PDO("mysql:localhost=localhost; dbname=da1wd19301; charset=utf8; port=3306", "root", "");
        } catch (PDOException $e) {
            echo "Lỗi kết nối CSDL;" . $e->getMessage();
        }
    }
}