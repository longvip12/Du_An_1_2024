<?php
class DasboardController{
    public function __construct(){
        $user = $_SESSION['user']??[];
        if(!$user || $user['role'] != 'admin'){
            header("location: " . ROOT_URL);
        }
    }
    public function index()
    {
        return view('admin.dashboard');
    }
}