<?php
    class AccountController{
        public $accountQuery;
        public $categories;
        public function __construct(){
            $this->accountQuery=new AccountQuery();
            $this->categories=new Category();
        }
        public function __destruct(){}
        public function login(){
            //xử lý logic
            //lấy thông tin email và password người dùng nhập vào -> gọi tới acccountQuery để kiểm tra
            // khi người dùng nhán nút login
            if(isset($_POST["submitLogin"])){
                $email = trim($_POST["email"]);
                $password = trim($_POST["password"]);
                // gọi hamg checkLogin
                $result = $this->accountQuery->checkLogin($email,$password);
                if ($result === false) {
                    echo "sai tài khoản hoặc mật khẩu";
                    
                }else{
                    echo "đăng nhập thành công";
                    // lưu thông tin đăng nhập váo session
                    $_SESSION["user_name"] = $result->fullname;
                    $_SESSION["user_id"] = $result->id;
                    $_SESSION["user_role"] = $result->role;
                    header("Location: ?ctl=home");

                    // print_r($_SESSION["account"]);
                }
            }
           
            //hiển thị view login 
            $listCategory = $this->categories->all();
            include "views/account/login.php";
        }
       public function logout() {
        if (isset($_SESSION['user_name'])) {
            unset($_SESSION['user_name']);
            header("Location: ?ctl=home");
        } else {
            header("Location: ?ctl=login");
        }
        exit(); // Dừng thực thi sau khi chuyển hướng
    }
    }