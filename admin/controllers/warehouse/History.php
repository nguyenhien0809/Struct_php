<?php
    class History extends Controller{
        public function __construct()
        {
            parent:: __construct();

            $data = $this->Model->fetch("Select * from tt_kho order by Ngay_Nhap desc");
            include "views/warehouse/History.php";
        }
    }

    new History();
?>