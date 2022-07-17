<?php 

    class Product extends Controller{
        public function __construct()
        {
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : "";

            $data = $this->Model->fetchOne("select * from sp_view where id_loai = '$id'");
            switch ($act) {
                case 'dg':
                    $ma_sp = isset($_POST['ma_sp']) ? $_POST['ma_sp'] : "";
                    $name = isset($_POST['name']) ? $_POST['name'] : "";
                    $email = isset($_POST['email']) ? $_POST['email'] : "";
                    $comment = isset($_POST['comment']) ? $_POST['comment'] : "";
                    $rate = isset($_POST['rate']) ? $_POST['rate'] : "";

                    $this->Model->execute("insert into sp_danh_gia values ('','$ma_sp','$name','$email','$rate','$comment',current_timestamp())");
                    echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Product&id=$id'>";
                    break;

            }

            $data_loai = $this->Model->fetch("select * from sp_view where ma_sp = '".$data['ma_sp']."' group by loai");
            $data_mau = $this->Model->fetch("select * from sp_view where ma_sp = '".$data['ma_sp']."' and loai = '".$data['loai']."' GROUP by ma_mau");
            $data_img = $this->Model->fetch("select * from sp_image where ma_sp = '".$data['ma_sp']."'");
            $data_dg = $this->Model->fetch("select * from view_danh_gia where ma_sp = '".$data['ma_sp']."' limit 0,10");
            include "client/views/Product.php";
        }

    }
    
    new Product();

?>