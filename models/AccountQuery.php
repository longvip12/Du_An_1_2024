<?php
class AccountQuery extends BaseModel{
    public function checkLogin($email,$password){
        try {
            $sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password' LIMIT 0, 25";
            $data = $this->conn->query($sql)->fetch();
            if($data === false){
                return $data;
            }else{
                $account = new Account();
                $account->id = $data['id'];
                $account->fullname = $data['fullname'];
                $account->username = $data['username'];
                $account->password = $data['password'];
                $account->email = $data['email'];
                $account->phone = $data['phone'];
                $account->address = $data['address'];
                $account->role = $data['role'];
                $account->role_id = $data['role_id'];
                return $account;
            }
        } catch (Exception $e) {
            //throw $th;
        }
    }
}