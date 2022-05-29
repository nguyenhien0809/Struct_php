<?php
    class Cart extends Controller{
        public function __construct(){
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            
            switch ($act) {
                case 'update':
                    $idsp = isset($_POST['idSP']) ? $_POST['idSP'] : "";
                    $idmau = isset($_POST['idmau']) ? $_POST['idmau'] : "";
                    $sl = isset($_POST['so_luong']) ? $_POST['so_luong'] : "";

                    
                    
                        foreach($idsp as $ind => $val_id  ){
                            $check = $this->Model->fetchOne("Select * from sp_ton where id = '$idmau[$ind]' and id_SP = '$val_id'");
                            if($sl[$ind] > $check['So_Luong']){
                                echo '<!-- Showing alert -->
                                <div id="alert" class="alert alert-danger">
                                    Sản phẩm đã hết hàng không thể tăng số lượng!.
                                </div>';
                                ?><script type="text/javascript">
                                    setTimeout(function () {
                                        $('#alert').alert('close');
                                    }, 5000);
                                </script><?php
                            }else{
                                
                                if(isset($_SESSION['gio_hang'][$val_id][$idmau[$ind]])){
                                    if($sl[$ind] <= 0){
                                        if(count($_SESSION['gio_hang'][$val_id]) > 1){
                                            unset($_SESSION['gio_hang'][$val_id][$idmau[$ind]]);
                                        }else{
                                            unset($_SESSION['gio_hang'][$val_id]);
                                        }
                                    }else {
                                        $_SESSION['gio_hang'][$val_id][$idmau[$ind]] = $sl[$ind];
                                    }
                                }
                                
                            }
                            
                        }
                    //echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Cart'>";
                    break;
                
            }
            

            include "client/views/Cart.php";
        }
    }
    
    new Cart();
?>