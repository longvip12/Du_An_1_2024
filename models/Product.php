<?php
/**
 * lớp Product dùng để thao tác dữ liệu của bảng products
 * 
 */
class Product extends BaseModel{
    /**
     * hàm all lấy ra tất cả sản phảm 
     */
    public function all(){
         $sql = "SELECT  p.*, c.cate_name FROM products p JOIN categories c ON p.category_id=c.id";
         $stmt = $this->conn->prepare($sql);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // lấy danh sách sản phẩm theo danh mục @id là mã danh mục
    public function listProductInCategory($id){
         $sql = "SELECT  p.*, c.cate_name FROM products p JOIN categories c ON p.category_id=c.id WHERE c.id = :id";
         $stmt = $this->conn->prepare($sql);
         $stmt->execute(['id'=>$id]);
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // lấy sản phẩm là mỹ phẩm cao cấp type =1
    public function listCosmetics(){
         $sql = "SELECT  p.*, c.cate_name FROM products p JOIN categories c 
         ON p.category_id=c.id WHERE type = 1 ORDER BY p.id DESC LIMIT 8";
         $stmt = $this->conn->prepare($sql);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // lấy các sản phẩm mỹ phẩm cơ bản type = 0
    public function listBasicCosmetics(){
         $sql = "SELECT  p.*, c.cate_name FROM products p JOIN categories c 
         ON p.category_id=c.id WHERE type = 0 ORDER BY p.id DESC LIMIT 8";
         $stmt = $this->conn->prepare($sql);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * function create: thêm dữ liệu sản phẩm 
     * @data: mảng dữ liệu cần thêm 
     */
   public  function create($data){
    $sql = "INSERT INTO PRODUCTS(name, image, price, quantity, description, status, category_id)
            VALUES (:name, :image, :price, :quantity, :description, :status, :category_id)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);
   }
   /**
    * function update: cập nhật dữ liệu
    *  @id: mã sản phẩm cần cập nhật dữ liệu 
    * @data: mảng dữ liệu cần cập nhật 
    */
    public function update($id, $data){
        $sql = "UPDATE products SET name = :name, image = :image, price = :price, quantity = :quantity, description = :description, status = :status, category_id = :category_id WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        //thêm id vào mảng data
        $data['id'] = $id;
        $stmt->execute($data);
    }
    /**
     * function delete: xóa bản ghi
     * @id: mã sản phẩm cần xóa 
     */
    // public function delete($id){
    //     try {
    //         $sql = "DELETE FROM products WHERE id=:id";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute(['id'=>$id]);
    //         return true;
    //     } catch (PDOException $e) {
    //         return false;
    //     }
    // }
    /**
     * function find: lấy ra 1 bản ghi theo id  
     * @id: mã sản phẩm cần tìm
     */
    public function find($id){
        $sql = "SELECT * FROM products WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // xóa sản phẩm
    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
        public function search($keyword = null){
        $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}