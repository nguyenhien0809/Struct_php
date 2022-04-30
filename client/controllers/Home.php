<?php
    class Home extends Controller{
        public function __construct(){
            parent::__construct();
            
            $data_sp_moi = $this->Model->fetch("select * from view_sp limit 10");
            $data_noi_bat = $this->Model->fetch("select * from view_sp where Phan_Tram_Giam > 0");
            $data_ban_chay = $this->Model->fetch("select * from sp_ban_chay limit 10");
            $data_dt = $this->Model->fetch("select * from view_sp where Ma_DM = 'DT'");
            $data_pk = $this->Model->fetch("select * from view_sp where Ma_DM = 'PK'");
            $anh_sp = $this->Model->fetch("select * from anh_ct_sp");

            include "client/views/Home.php";
        }
    }
    
    new Home();
?>