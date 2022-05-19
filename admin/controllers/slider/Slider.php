<?php
    class Slider extends Controller{
        public function __construct()
        {
            parent:: __construct();
            $act = isset($_GET['act']) ? $_GET['act'] : '';
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            switch ($act) {
                case 'add':
                    $ten = isset($_POST['Ten']) ? $_POST['Ten'] : '';
                    $tinh_Trang = isset($_POST['Tinh_Trang']) ? $_POST['Tinh_Trang'] : '';

                    if(!isset($_FILES['Image']['name']) || empty($_FILES['Image']['name']) ){
                        ?> <script> window.alert("Chưa có dữ liệu thêm ảnh") </script> <?php
                    }else{
                        $anh = time().$_FILES['Image']['name'];
                        move_uploaded_file($_FILES['Image']['tmp_name'],"../public/Upload/Slider/".time().$_FILES['Image']['name']);
                        $this->Model->execute("insert into slider(id, Ten_Slider, Anh, Tinh_Trang) values ('','$ten','$anh','$tinh_Trang')");

                        ?> <script> window.alert("Thêm thành công") </script> <?php  
                    }
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=slider/Slider'>";
                    break;

                case 'edit':
                    $e_data = $this->Model->fetchOne("select * from slider where id = '$id'");
                    $data = $this->Model->fetch("SELECT * from slider order by id desc limit 25");
                    break;

                case 'do_edit':
                    $ten = isset($_POST['Ten']) ? $_POST['Ten'] : '';
                    $tinh_Trang = isset($_POST['Tinh_Trang']) ? $_POST['Tinh_Trang'] : '';
                    if(isset($_GET['tt'])){
                        $tt = $_GET['tt'];
                        $this->Model->execute("update slider set Tinh_Trang='$tt' where id = '$id'");
                    }else{
                        if(!isset($_FILES['Image']['name']) || empty($_FILES['Image']['name']) ){
                            $this->Model->execute("update slider set Ten_Slider='$ten',Tinh_Trang='$tinh_Trang' where id = '$id'");
                            ?> <script> window.alert("Sửa thành công") </script> <?php  
                        }else{
                            $check = $this->Model->fetchOne("Select Anh from slider where id = '$id'");
                            file_exists("../public/Upload/Slider/".$check['Anh']) ? unlink("../public/Upload/Slider/".$check['Anh']) : '';

                            $anh = time().$_FILES['Image']['name'];
                            move_uploaded_file($_FILES['Image']['tmp_name'],"../public/Upload/Slider/".time().$_FILES['Image']['name']);
                            $this->Model->execute("update slider set Ten_Slider='$ten',Anh='$anh',Tinh_Trang='$tinh_Trang' where id = '$id'");

                            ?> <script> window.alert("Sửa thành công") </script> <?php  
                        }
                    }
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=slider/Slider'>";
                    break;

                case 'delete':
                    $check = $this->Model->fetchOne("Select Anh from slider where id = '$id'");
                    file_exists("../public/Upload/Slider/".$check['Anh']) ? unlink("../public/Upload/Slider/".$check['Anh']) : '';
                    $this->Model->execute("delete from slider where id = '$id'");

                    ?> <script> window.alert("Xóa thành công") </script> <?php

                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=slider/Slider'>";
                    break;
                case 'search':
                    $sr = isset($_POST['search']) ? $_POST['search'] : "";
                    $data = $this->Model->fetch("select * from slider where Ten_Slider like '%$sr%' order by id desc limit 25");
                    break;
                case 'select':
                    $sl = isset($_GET['sl']) ? $_GET['sl'] : "";
                    $data = $this->Model->fetch("select * from slider order by id desc limit $sl");
                    break;  
                default:
                    $data = $this->Model->fetch("SELECT * from slider order by id desc limit 25");
                break;
            }

            include "views/slider/Slider.php";
        }
    }
    new Slider();
?>