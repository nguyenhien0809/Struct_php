<?php

    class Info extends Controller{
        public function __construct(){
            parent:: __construct();          
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : 0;  
            $thong_bao = "";          
  
            switch ($act) {
                case 'info':
                    $info = $this->Model->fetchOne("select * from info_user where id_User=$id"); 
                    $UserN = $this->Model->fetchOne("select * from user where id=$id");  
                    break;
                case 'edit':
                    $recordd = $this->Model->fetchOne("select * from info_user where id_User=$id"); 
                    $UserN = $this->Model->fetchOne("select * from user where id=$id");                           
                    break;
                case 'do_edit':
                    $Ho_Ten = $_POST['Ho_Ten'];
                    $Gioi_Tinh = $_POST['GioiTinh'];
                    $Ngay_Sinh =$_POST['Ngay_Sinh'];
                    $Sdt = $_POST['Sdt'];
                    $Email = $_POST['Email'];
                    $Dia_Chi = $_POST['Dia_Chi'];
                    $Image = '';
                    if(isset($_FILES['Image']['name']) && !empty($_FILES['Image']['name'])){
                        $check = $this->Model->fetchOne("select * from info_user where id_user=$id"); 
                        file_exists("../public/Upload/Avatar/".$check['Anh']) ? unlink("../public/Upload/Avatar/".$check['Anh']) : '';

                        $Image = time().$_FILES['Image']['name'];
                        move_uploaded_file($_FILES['Image']['tmp_name'],"../public/Upload/Avatar/".time().$_FILES['Image']['name']);
                        $Sql = "update info_user set Ho_Ten = '$Ho_Ten',Gioi_Tinh='$Gioi_Tinh',Nam_Sinh= '$Ngay_Sinh',Sdt = '$Sdt',Email ='$Email',Dia_Chi ='$Dia_Chi',Anh = '$Image' where id_User='$id'";
                    }else{
                        $Sql = "update info_user set Ho_Ten = '$Ho_Ten',Gioi_Tinh='$Gioi_Tinh',Nam_Sinh= '$Ngay_Sinh',Sdt = '$Sdt',Email ='$Email',Dia_Chi ='$Dia_Chi' where id_User='$id'";
                    }

                    $this->Model->execute($Sql);

                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Info'>";
                    break;
            }
            
            $data = $this->Model->fetch("select * from user");
            
            include "views/users/Info.php";
        }
    }
    new Info();

?>