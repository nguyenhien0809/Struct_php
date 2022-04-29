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
                    $id_positon = isset($_POST['id_positon']) ? $_POST['id_positon'] : '';
                    $check = $this->Model->fetchOne("select * from user where UserName='$UserName'");

                    if(isset($check)){
                        $thong_bao = "Tài khoản đã tồn tại!";
                    }else{
                        if($_POST['Password'] != $_POST['re_Password']){
                            $thong_bao = "Mật khẩu không khớp!";
                        }else{          
                            $this->Model->execute("insert into user(id,UserName,Password,id_positon) values ('','$UserName', '$Password','$id_positon')");
                            echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Account'>";
                        }
                    }
                    
                    break;
                case 'delete':
                    $this->Model->execute("delete from user where id=$id");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Account'>";
                    break;
                case 'edit':
                    $record = $this->Model->fetchOne("select * from user where id=$id");      
                    $data = $this->Model->fetch("SELECT * from user order by id desc limit 25");                     
                    break;
                case 'do_edit':
                    $UserName = $_POST['UserName'];
                    $Password = md5($_POST['Password']);
                    $id_positon = $_POST['id_positon'];
                    $this->Model->execute("update user set UserName = '$UserName',Password='$Password',id_positon = '$id_positon' where id='$id'");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Account'>";
                    break;
                case 'search':
                    $sr = isset($_POST['search']) ? $_POST['search'] : "";
                    $data = $this->Model->fetch("select * from user where UserName like '%$sr%' order by id desc limit 25");
                    break;
                case 'select':
                    $sl = isset($_GET['sl']) ? $_GET['sl'] : "";
                    $data = $this->Model->fetch("select * from user order by id desc limit $sl");
                    break;  
                default:
                    $data = $this->Model->fetch("SELECT * from user order by id desc limit 25");
                break;
            }
          
            //$data = $this->Model->fetch("select * from user");
            $user_position = $this->Model->fetch("select * from user_position");
            
            include "views/users/Account.php";
        }
    }
    new Account();

?>