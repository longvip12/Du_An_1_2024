<?php
class AuthController{
    public function register(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = $_POST;
            dd($data);
            // mã hóa mật khẩu
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);

            // ĐƯA VÀO DATA 
            $data['password'] = $password;
            //insert vào database 
            (new User)->create($data);
            // thông váo 
            $_SESSION['message'] = 'Đăng ký thành công';
            header("location: " . ROOT_URL . "?ctl=login");
            die;
        }
        return view('account.register');
    }
    public function login(){
        if(isset($_SESSION['user'])){
            header('location: ' . ROOT_URL);
            die;
        }
        $erron = null;
        if ($_SERVER['REQUEST_METHOD']=== "POST"){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = (new User)-> findUserOfEmail($email);

            // kiểm tra mật khẩu 
            if ($user) {
                if (password_verify($password,$user['password'])){
                    $_SESSION['user'] = $user;
                    //kiểm tra role =1 vào admin 
                    if($user['role'] == 'admin'){
                    header('Location: ' . ADMIN_URL);
                    die;
                }
                header('Location: ' . ROOT_URL);
                }else{
                    $erron = "Email hoặc mật khẩu không đúng";
                }
            }else{
                    $erron = "Email hoặc mật khẩu không đúng";
                }
            
        }
        $message = session_flash('message');
        return view('account.login', compact('message', 'erron'));
    }
    // đăng xuất
    public function logout(){
        unset($_SESSION['user']);
        header('location: ' . ROOT_URL . '?ctl=login');
        die;
    }

    public function index(){
        $users = (new User)->all();
        return view('admin.users.list', compact('users'));
    }
}