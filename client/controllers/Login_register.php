<?php
    class Login_register extends Controller{
        public function __construct(){
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? '&id='.$_GET['id'] : "" ;
            $ctrl = isset($_GET['ctrl']) && $_GET['ctrl'] != "Login_register" ? 'ctrl='.$_GET['ctrl'] : "" ;
            
            switch ($act) {
                case "login":
                    $Email = isset($_POST['Email']) ? $_POST['Email'] : "";
                    $Password = isset($_POST['Password']) ? $_POST['Password'] : "";

                    $check = $this->Model->fetchOne("select * from tb_users where email = '$Email'");

                    if (isset($check['email'])) {
                        if ($check['password'] == md5($Password)) {
                            $customer = array(
                                'id' => $check['id'],
                                'email' => $Email,
                                'ho_ten' => $check['ho_ten']
                            );
                            $_SESSION['customer'] = $customer;

                            echo "<meta http-equiv='refresh' content='0; URL=?".$ctrl.$id."'>";
                        }else{
                            ?> <script>alert("Sai mật khẩu!")</script> <?php
                            echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Login_register'>";
                        }
                    }else{
                        ?> <script>alert("Tài khoản không tồn tại!")</script> <?php
                        echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Login_register'>";
                    }
                    break;
                case "register":
                    $Ho_Ten = isset($_POST['Ho_Ten']) ? $_POST['Ho_Ten'] : "";
                    $Email = isset($_POST['Email']) ? $_POST['Email'] : "";
                    $Password = isset($_POST['Password']) ? $_POST['Password'] : "";
                    $re_Password = isset($_POST['re_Password']) ? $_POST['re_Password'] : "";

                    $check = $this->Model->fetchOne("select * from tb_users where Email = '$Email'");

                    if (isset($check['Email'])) {
                        ?> <script>alert("Email này đã đã tồn tại!")</script> <?php
                        echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Login_register'>";
                    }else{
                        if ($Password == $re_Password) {
                            $Password = md5($re_Password);
                            $this->Model->execute("INSERT into `tb_users`(`id`, `Ho_Ten`, `Gioi_Tinh`, `Nam_Sinh`, `Sdt`, `Email`, `Password`, `Dia_Chi`, `Anh`) values('','$Ho_Ten','','','','$Email','$Password','','')");
                            $_SESSION['account'] = $Email;
                            $_SESSION['name'] = $Ho_Ten;
                            echo "<meta http-equiv='refresh' content='0; URL=?ctrl=users_info'>";
                        }else{
                            ?> <script>alert("Mật khẩu không khớp nhau!")</script> <?php
                            echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Login_register'>";
                        }
                    }
                    break;
                
                
            }
            

            include "client/views/Login_register.php";
        }
    }
    
    new Login_register();
?>