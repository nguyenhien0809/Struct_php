<?php

    class login extends Controller{
        public function __construct(){
            parent::__construct();

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $Username = $_POST['Username'];
                $password = $_POST['password'];
                $thong_bao = "";
                $check = $this->Model->fetchOne("select * from tb_admin where UserName='$Username'");
                
                if(isset($check['UserName'])){
                    if($check['Password'] == MD5($password)){
                        

                        if($check['id_positon'] == 1){
                            $_SESSION['account'] = $Username;


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