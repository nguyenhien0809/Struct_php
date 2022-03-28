<?php

    class login extends Controller{
        public function __construct(){
            parent::__construct();

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $Username = $_POST['Username'];
                $password = $_POST['password'];
                $thong_bao = "";
                $check = $this->Model->fetchOne("select * from user where UserName='$Username'");
                
                if(isset($check['UserName'])){
                    if($check['Password'] == MD5($password)){
                        

                        if($check['Level'] == 0){
                            $thong_tin = $this->Model->fetchOne("select * from info_user where id='".$check['id']."'");
                            
                            $_SESSION['account'] = $Username;
                            $_SESSION['name'] = $thong_tin['Ho_Ten'];



                            header("location: index.php");
                        }else{
                            $thong_bao = "Bạn không đủ quyền!";
                        }
 
                    }else{
                        $thong_bao = "Mật khẩu không đúng!";
                    }
                }else{
                    $thong_bao = "Tài khoản này không tồn tại!";
                }
            }

            include "views/Login.php"; 
        }
    }
    new Login();
    
?>