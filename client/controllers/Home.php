<?php
    class Home extends Controller{
        public function __construct(){
            parent::__construct();
            $data_dm = $this->Model->fetch("select * from danh_muc");
            $data_sp_moi = $this->Model->fetch("select * from view_sp where So_Luong > 0 limit 10");
            $data_noi_bat = $this->Model->fetch("select * from view_sp where Sale > 0 and So_Luong > 0 limit 10");

            $slider = $this->Model->fetch("select * from slider where Tinh_Trang = 0");

            include "client/views/Home.php";
        }
    }
    
    new Home();
?>