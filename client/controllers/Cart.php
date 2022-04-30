<?php
    class Cart extends Controller{
        public function __construct(){
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            
            switch ($act) {
                case 'update':
                    $idsp = isset($_POST['idSP']) ? $_POST['idSP'] : "";
                    $sl = isset($_POST['so_luong']) ? $_POST['so_luong'] : "";

                    foreach($idsp as $ind => $val_id  ){
                        if(isset($_SESSION['gio_hang'][$val_id])){
                            $_SESSION['gio_hang'][$val_id] = $sl[$ind ];
                        }
                    }

                    echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Cart'>";
                    break;
                
                
                
            }
            

            include "client/views/Cart.php";
        }
    }
    
    new Cart();
?>