<?php 

    class Product extends Controller{
        public function __construct()
        {
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            $id_m = isset($_GET['m']) ? $_GET['m'] : "";

            switch ($act) {
                case 'dg':
                    $Ma_SP = isset($_POST['Ma_SP']) ? $_POST['Ma_SP'] : "";
                    $name = isset($_POST['name']) ? $_POST['name'] : "";
                    $email = isset($_POST['email']) ? $_POST['email'] : "";
                    $comment = isset($_POST['comment']) ? $_POST['comment'] : "";
                    $rate = isset($_POST['rate']) ? $_POST['rate'] : "";

                    $this->Model->execute("insert into sp_danh_gia values ('','$Ma_SP','$name','$email','$rate','$comment',current_timestamp())");
                    echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Product&id=$id'>";
                    break;
                

            }

            $data_mau = $this->Model->fetchOne("select * from sp_ton where id_SP = '$id' and id = '$id_m'");

            $data = $this->Model->fetchOne("select * from san_pham where id = '$id'");
            $data_m = $this->Model->fetch("select * from sp_ton where id_SP = '$id'");
            $data_mOne = $this->Model->fetchOne("select * from sp_ton where id_SP = '$id'");
            $data_img = $this->Model->fetchOne("select * from sp_image where id_SP = '$id'");
            $data_ts = $this->Model->fetchOne("select * from sp_Thong_So where id_SP = '$id'");
            $data_dg = $this->Model->fetch("select * from sp_danh_gia where Ma_SP = '".$data['Ma_SP']."' Order by Thoi_Gian DESC limit 0,10");
            include "client/views/Product.php";
        }

    }
    
    new Product();

?>