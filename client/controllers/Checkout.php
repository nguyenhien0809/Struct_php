<?php 
    class Checkout extends Controller{
        public function __construct()
        {
            parent::__construct();

            if(isset($_SESSION['account'])){
                $Email = $_SESSION['account'];
                $data = $this->Model->fetchOne("Select * from tb_users where Email = '$Email'");

                if(isset($_POST['TToff'])){
                    $Ma_HD = isset($_POST['Ma_HD']) ? $_POST['Ma_HD'] : date(" YmdHis");
                    $Ho_Ten = isset($_POST['Ho_Ten']) ? $_POST['Ho_Ten'] : "";
                    $Dia_Chi = isset($_POST['Dia_Chi']) ? $_POST['Dia_Chi'] : "";
                    $SDT = isset($_POST['SDT']) ? $_POST['SDT'] : "";
                    $YeuCau = isset($_POST['YeuCau']) ? $_POST['YeuCau'] : "";
                    $Email = isset($_SESSION['account']) ? $_SESSION['account'] : "";
    
                    $this->Model->execute("UPDATE tb_users set Ho_Ten='$Ho_Ten',Dia_Chi='$Dia_Chi',Sdt='$SDT' Where Email = '$Email'");

                    if(isset($_SESSION['gio_hang'])){
                        foreach($_SESSION['gio_hang'] as $id_sp => $sl){ 
                            $data_sp = $this->Model->fetchOne("select * from view_sp where id = '$id_sp'");
                            foreach($_SESSION['gio_hang'][$id_sp] as $id_m => $sll){ 
                                $data_m = $this->Model->fetchOne("select * from sp_ton where id = '$id_m'");
                                $tt = $data_sp['Gia_Giam'] * $sll;

                                echo $sql = "insert into don_hang values('','$Ma_HD','".$data['id']."','$id_sp','".$data_sp['Ten_SP']."','$id_m','$sll','".$data_sp['Gia_Giam']."','$tt','$YeuCau','1','1',current_timestamp())";
                                $this->Model->execute($sql);

                                if(count($_SESSION['gio_hang'][$id_sp]) > 1){
                                    unset($_SESSION['gio_hang'][$id_sp][$id_m]);
                                }else{
                                    unset($_SESSION['gio_hang'][$id_sp]);
                                }
                            }
                        }
                    }
                    
                    ?><script>alert("Cảm ơn bạn đã tin tưởng và đặt hàng ở của hàng chúng tôi! Nhân viên tư vấn của chúng tôi sẽ liên hệ với bạn sớm nhất để xác nhận đơn hàng của bạn! ") </script> <?php
                }
    
                if(isset($_POST['vnpay'])){
                    ?><script>alert("Thankssss") </script> <?php
                }

                
                include "Client/views/Checkout.php";
            }else{
                include "Client/views/Login_register.php";
            }
            
            
            
        }
    }
    new Checkout();
?>