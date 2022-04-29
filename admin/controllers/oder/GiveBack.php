<?php 
    class GiveBack extends Controller{
        public function __construct()
        {
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";

            switch ($act) {
                case 'search':
                    $sr = isset($_POST['search']) ? $_POST['search'] : "";
                    $data = $this->Model->fetch("select * from don_hang where id_SP like '%$sr%'  OR id_User like '%$sr%' OR Ten_SP like '%$sr%' order by Thoi_Gian_DH desc limit 25");
                break;
                case 'select':
                    $sl = isset($_GET['sl']) ? $_GET['sl'] : "";
                    $data = $this->Model->fetch("select * from don_hang where id_Tinh_Trang = 5 order by Thoi_Gian_DH desc limit $sl");
                break;  
                default:
                    $data = $this->Model->fetch("SELECT * from don_hang where id_Tinh_Trang = 5 order by Thoi_Gian_DH desc limit 25");
                break;
            }

            $dataTT = $this->Model->fetch("SELECT * from tinh_trang_dh");
            include "views/oder/GiveBack.php";
        }
    }
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
    new GiveBack();
?>