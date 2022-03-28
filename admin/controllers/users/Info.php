<?php

    class Info extends Controller{
        public function __construct(){
            parent:: __construct();          
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : 0;  
            $thong_bao = "";          
  
            switch ($act) {
                case 'info':
                    $info = $this->Model->fetchOne("select * from info_user where id=$id"); 
                    $UserN = $this->Model->fetchOne("select * from user where id=$id");  
                    break;
                case 'edit':
                    $recordd = $this->Model->fetchOne("select * from info_user where id=$id"); 
                    $UserN = $this->Model->fetchOne("select * from user where id=$id");                           
                    break;
                case 'do_edit':
                    $Ho_Ten = $_POST['Ho_Ten'];
                    $Gioi_Tinh = $_POST['GioiTinh'];
                    $Sdt = $_POST['Sdt'];
                    $Email = $_POST['Email'];
                    $Dia_Chi = $_POST['Dia_Chi'];
                    if(!empty($_FILES['Image']['name'])){
                        $Image = time().$_FILES['Image']['name'];
                        move_uploaded_file($_FILES['Image']['tmp_name'],"../public/Upload/Avatar/".time().$_FILES['Image']['name']);

                        $this->Model->execute("update info_user set Ho_Ten = '$Ho_Ten',Gioi_Tinh='$Gioi_Tinh',Sdt = '$Sdt',Email ='$Email',Dia_Chi ='$Dia_Chi',Anh = '$Image' where id='$id'");         
                    }else{
                        $this->Model->execute("update info_user set Ho_Ten='$Ho_Ten',Gioi_Tinh='$Gioi_Tinh',Sdt='$Sdt',Email='$Email',Dia_Chi='$Dia_Chi' WHERE id ='$id'");    
                    }
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Info'>";
                    break;
            }
            
            $data = $this->Model->fetch("select * from user");
            
            include "views/users/Info.php";
        }
    }
    new Info();

?>