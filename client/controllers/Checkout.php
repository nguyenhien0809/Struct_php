<?php 
    class Checkout extends Controller{
        public function __construct()
        {
            parent::__construct();

            if(isset($_SESSION['customer'])){
                $user = $_SESSION['customer']['id'];
                $data = $this->Model->fetchOne("Select * from tb_users where id = '".$user."'");

                if(isset($_POST['TToff'])){
                    $ma_dh = isset($_POST['ma_dh']) ? $_POST['ma_dh'] : date(" YmdHis");
                    $ho_ten = isset($_POST['ho_ten']) ? $_POST['ho_ten'] : "";
                    $dia_chi = isset($_POST['dia_chi']) ? $_POST['dia_chi'] : "";
                    $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : "";
                    $yeu_cau = isset($_POST['yeu_cau']) ? $_POST['yeu_cau'] : "";
                    $user = isset($_SESSION['customer']) ? $_SESSION['customer']['id'] : "";
    
                    $this->Model->execute("UPDATE tb_users set ho_ten='$ho_ten',dia_chi='$dia_chi',sdt='$sdt' Where id = '$user'");

                    if(isset($_SESSION['gio_hang'])){
                        foreach($_SESSION['gio_hang'] as $id_sp => $sl){ 
                            $data_sp = $this->Model->fetchOne("select * from sp_view where id_loai = '$id_sp'");
                            $thanh_tien = $sl * $data_sp['gia'];
                            $sql = "INSERT INTO `don_hang`(`id`, `id_user`, `ma_dh`, `id_loai`,`ma_sp`,  `ten_sp`, `loai`, `mau`, `so_luong`, `gia`, `thanh_tien`, `ho_ten`, `sdt`, `dia_chi`, `yeu_cau`, `id_tinh_trang`, `thoi_gian_dh`) 
                                        VALUES ('','$user','$ma_dh','$id_sp','".$data_sp['ma_sp']."','".$data_sp['ten_sp']."','".$data_sp['loai']."','".$data_sp['ten_mau']."','$sl','".$data_sp['gia']."','$thanh_tien','$ho_ten','$sdt','$dia_chi','$yeu_cau','1',current_timestamp())";
                            $this->Model->execute($sql);

                            unset($_SESSION['gio_hang'][$id_sp]);
                        }
                    }
                    
                    ?><script>alert("C???m ??n b???n ???? tin t?????ng v?? ?????t h??ng ??? c???a h??ng ch??ng t??i! Nh??n vi??n t?? v???n c???a ch??ng t??i s??? li??n h??? v???i b???n s???m nh???t ????? x??c nh???n ????n h??ng c???a b???n! ") </script> <?php
                }


                
                include "Client/views/Checkout.php";
            }else{
                include "Client/views/Login_register.php";
            }
            
            
            
        }
    }
    new Checkout();
?>