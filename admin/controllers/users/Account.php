<?php

    class Account extends Controller{
        public function __construct(){
            parent:: __construct();          
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : 0;  
            $thong_bao = "";          
  
            switch ($act) {
                case 'add':   
                    $UserName = isset($_POST['UserName']) ? $_POST['UserName'] : '';
                    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
                    $re_Password = isset($_POST['re_Password']) ? $_POST['re_Password'] : '';
                    $Level = isset($_POST['Level']) ? $_POST['Level'] : '';
                    $check = $this->Model->fetchOne("select * from user where UserName='$UserName'");

                    if(isset($check)){
                        $thong_bao = "Tài khoản đã tồn tại!";
                    }else{
                        if($_POST['Password'] != $_POST['re_Password']){
                            $thong_bao = "Mật khẩu không khớp!";
                        }else{          
                            $this->Model->execute("insert into user(UserName,Password,Level) values ('$UserName', '$Password','$Level')");
                            $this->Model->execute("insert into info_user(id,Ho_Ten,Gioi_Tinh,Sdt,Email,Dia_Chi,Anh) values ('','','','','','','')");
                            echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Account'>";
                        }
                    }
                    
                    break;
                case 'delete':
                    $this->Model->execute("delete from user where id=$id");
                    $this->Model->execute("delete from info_user where id=$id");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Account'>";
                    break;
                case 'edit':
                    $record = $this->Model->fetchOne("select * from user where id=$id");                           
                    break;
                case 'do_edit':
                    $UserName = $_POST['UserName'];
                    $Password = md5($_POST['Password']);
                    $Level = $_POST['Level'];
                    $this->Model->execute("update user set UserName = '$UserName',Password='$Password',Level = '$Level' where id='$id'");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Account'>";
                    break;
            }
          
            $data = $this->Model->fetch("select * from user");
            $user_position = $this->Model->fetch("select * from user_position");
            
            include "views/users/Account.php";
        }
    }
    new Account();

?>