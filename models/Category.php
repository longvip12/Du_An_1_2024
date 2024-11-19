<?php
//Lớp Category dùng để Tương tác với bảng categories
class Category extends BaseModel {
    // Phương thức lấy toàn bộ bản ghi  
    public function all(){
        // @soft_delete=0: không xóa 
        // @soft_delete=1: đã xóa
        $sql = "SELECT * FROM categories WHERE soft_delete = 0";
        // chuẩn bị
        $stmt = $this ->conn->prepare($sql);
        // thực thi lệnh truy vấn
        $stmt->execute();
        // lấy dữ liệu trả về cho hàm
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // thêm bản ghi mới
    // @data là mảng dữ liệu cần thêm gồm có key là tên cột
    public function create($data){
        $sql = "INSERT INTO categories(cate_name, type) VALUES(:cate_name, :type)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    // cập nhât dữ liệu
    // @id: mã danh mục cần cập nhât
    //@data: mảng dữ liệu cần cập nhật
    public function update($id, $data){
        $sql = "UPDATE categories SET cate_name=:cate_name, type=:type WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        //Thêm id vào mảng data
        $data['id'] = $id;
        $stmt->execute($data);
    }
    // hàm xóa, là xóa name dữ liệu chỉ chuyển đổi trạng thái chứ không xóa khỏi csdl
    // chuyển đổi trạng thái soft_delete=1
    //@id: là mã danh mục cần xóa
    public function delete($id){
        $sql = "UPDATE categories SET soft_delete=1 WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
    // hàm lấy 1 bản ghi thep id 
    public function find($id){
        $sql = "SELECT * FROM categories WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt ->execute(['id'=>$id]);
        //lấy 1 bản ghi 
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}