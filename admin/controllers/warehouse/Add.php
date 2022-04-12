<?php
    class Add extends Controller{
        public function __construct()
        {
            parent:: __construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            $today = date("Y-m-d");
            if( isset($_GET['ma']) ){
                $ma_sp = $_GET['ma'];
                $check = $this->Model->fetch("Select * from Kieu_SP where Ma_SP = '$ma_sp'");
            }
            if ($act == "add") {
                $ma_sp = isset($_POST['Ma_SP']) ? $_POST['Ma_SP'] : "";
                $Dung_Luong = isset($_POST['Dung_Luong']) ? $_POST['Dung_Luong'] : "";
                $Mau = isset($_POST['Mau']) ? $_POST['Mau'] : "";
                $So_Luong = isset($_POST['So_Luong']) ? $_POST['So_Luong'] : "";
                $sql = "insert into kho(id, Ma_SP, Dung_Luong, Mau, So_Luong_Nhap, Ngay_Nhap) values ('','$ma_sp','$Dung_Luong','$Mau','$So_Luong',NOW())";
                $this->Model->execute($sql);
                echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=warehouse/Add'>";
            }

            $data = $this->Model->fetch("Select * from san_pham");
            include "views/warehouse/Add.php";
        }
    }
    new Add();
?>