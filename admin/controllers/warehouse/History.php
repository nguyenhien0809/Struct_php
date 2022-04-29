<?php
    class History extends Controller{
        public function __construct()
        {
            parent:: __construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            
            switch ($act) {
                case 'search':
                    $sr = isset($_POST['search']) ? $_POST['search'] : "";
                    $data = $this->Model->fetch("select * from tt_kho where id_SP like '%$sr%' OR Mau like '%$sr%' OR Ngay_Nhap like '%$sr%' order by Ngay_Nhap desc limit 25");
                    break;
                case 'select':
                    $sl = isset($_GET['sl']) ? $_GET['sl'] : "";
                    $data = $this->Model->fetch("select * from tt_kho order by Ngay_Nhap desc limit $sl");
                    break;  
                default:
                    $data = $this->Model->fetch("SELECT * from tt_kho order by Ngay_Nhap desc limit 25");
                break;
            }

            //$data = $this->Model->fetch("Select * from tt_kho order by Ngay_Nhap desc");
            include "views/warehouse/History.php";
        }
    }

    new History();
?>