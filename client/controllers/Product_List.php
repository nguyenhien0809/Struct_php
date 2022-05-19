<?php
    class Product_List extends Controller{
        public function __construct()
        {
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $order = isset($_GET['order']) ? $_GET['order'] : "";
            $act_name = "";


            
            $nb_item = 10;
            $pg = isset($_GET['pg']) ? $_GET['pg'] : 1 ;
            $pagi = ($pg-1)*$nb_item;
            switch ($act) {
                case 'spnb':
                    $act_name = "Sản phẩm nổi bật";
                    $data_nb = $this->Model->fetch("select * from view_sp where Sale > 0");
                    switch ($order) {
                        case 'az':
                            $data = $this->Model->fetch("select * from view_sp where Sale > 0 order by Ten_SP ASC limit $pagi,$nb_item ");
                            break;
                        case 'za':
                            $data = $this->Model->fetch("select * from view_sp where Sale > 0 order by Ten_SP DESC limit $pagi,$nb_item ");
                            break;
                        case 'gial':
                            $data = $this->Model->fetch("select * from view_sp where Sale > 0 order by Gia_Giam DESC limit $pagi,$nb_item ");
                            break;
                        case 'giah':
                            $data = $this->Model->fetch("select * from view_sp where Sale > 0 order by Gia_Giam ASC limit $pagi,$nb_item ");
                            break;
                        default:
                            $data = $this->Model->fetch("select * from view_sp where Sale > 0 order by Sale DESC limit $pagi,$nb_item ");
                            break;
                    }
                    break;
                case 'sp':
                    $act_name = "";
                    $dm = isset($_GET['dm']) && !empty($_GET['dm']) ? $_GET['dm'] : "%";
                    $th = isset($_GET['th']) && !empty($_GET['th']) ? $_GET['th'] : "%";
                    
                    $data_nb = $this->Model->fetch("select * from view_sp where Ma_DM like '$dm' AND MA_TH like '$th'");
                    echo count($data_nb);
                    switch ($order) {
                        case 'az':
                            $data = $this->Model->fetch("select * from view_sp where Ma_DM like '$dm' AND MA_TH like '$th' order by Ten_SP ASC limit $pagi,$nb_item ");
                            break;
                        case 'za':
                            $data = $this->Model->fetch("select * from view_sp where Ma_DM like '$dm' AND MA_TH like '$th' order by Ten_SP DESC limit $pagi,$nb_item ");
                            break;
                        case 'gial':
                            $data = $this->Model->fetch("select * from view_sp where Ma_DM like '$dm' AND MA_TH like '$th' order by Gia_Giam DESC limit $pagi,$nb_item ");
                            break;
                        case 'giah':
                            $data = $this->Model->fetch("select * from view_sp where Ma_DM like '$dm' AND MA_TH like '$th' order by Gia_Giam ASC limit $pagi,$nb_item ");
                            break;
                        default:
                            $data = $this->Model->fetch("select * from view_sp where Ma_DM like '$dm' AND MA_TH like '$th' order by id DESC limit $pagi,$nb_item ");
                            break;
                    }
                    break;
                case 'search':
                    $act_name = "Kết quả tìm kiếm";
                    $name  = isset($_GET['name']) ? $_GET['name'] : "";
                    $data_nb = $this->Model->fetch("select * from view_sp where Ma_SP like '%$name%' OR Ten_SP like '%$name%'");
                    switch ($order) {
                        case 'az':
                            $data = $this->Model->fetch("select * from view_sp where Ma_SP like '%$name%' OR Ten_SP like '%$name%' order by Ten_SP ASC limit $pagi,$nb_item ");
                            break;
                        case 'za':
                            $data = $this->Model->fetch("select * from view_sp where Ma_SP like '%$name%' OR Ten_SP like '%$name%' order by Ten_SP DESC limit $pagi,$nb_item ");
                            break;
                        case 'gial':
                            $data = $this->Model->fetch("select * from view_sp where Ma_SP like '%$name%' OR Ten_SP like '%$name%' order by Gia_Giam DESC limit $pagi,$nb_item ");
                            break;
                        case 'giah':
                            $data = $this->Model->fetch("select * from view_sp where Ma_SP like '%$name%' OR Ten_SP like '%$name%' order by Gia_Giam ASC limit $pagi,$nb_item ");
                            break;
                        default:
                            $data = $this->Model->fetch("select * from view_sp where Ma_SP like '%$name%' OR Ten_SP like '%$name%' order by id DESC limit $pagi,$nb_item ");
                            break;
                    }
                    break;
                default:
                    $data_nb = $this->Model->fetch("select * from view_sp ");
                    switch ($order) {
                        case 'az':
                            $data = $this->Model->fetch("select * from view_sp  order by Ten_SP ASC limit $pagi,$nb_item ");
                            break;
                        case 'za':
                            $data = $this->Model->fetch("select * from view_sp  order by Ten_SP DESC limit $pagi,$nb_item ");
                            break;
                        case 'gial':
                            $data = $this->Model->fetch("select * from view_sp  order by Gia_Giam ASC limit $pagi,$nb_item ");
                            break;
                        case 'giah':
                            $data = $this->Model->fetch("select * from view_sp  order by Gia_Giam DESC limit $pagi,$nb_item ");
                            break;
                        case 'rate':
                            $data = $this->Model->fetch("select * from view_sp  order by Danh_Gia DESC limit $pagi,$nb_item ");
                            break;
                        default:
                            $data = $this->Model->fetch("select * from view_sp order by Sale DESC limit $pagi,$nb_item ");
                            break;
                    }
                    break;
            }
            echo count($data_nb);
            $data_dm = $this->Model->fetch("select * from danh_muc");
            $data_th = $this->Model->fetch("select * from thuong_hieu");
            include "client/views/Product_List.php";
        }
    }
    new Product_List();
?>