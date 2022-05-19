<?php
    session_start();
    include "config/Config.php";
    include "config/Model.php";
    include "config/Controller.php";
    include "config/RemoveUnicode.php";
    include "config/Token.php";

    
    class index extends Controller{
        public function __construct()
        {
            parent::__construct();
            $act= isset($_GET['act']) ? $_GET['act'] : "";
            $dm = isset($_GET['dm']) ? $_GET['dm'] : "";
            $id= isset($_GET['id']) ? $_GET['id'] : "";
            $id_m = isset($_GET['m']) ? $_GET['m'] : "";
            
            switch ($act) {
                case 'logout':
                    unset($_SESSION['account']);
                    unset($_SESSION['name']);

                    echo "<meta http-equiv='refresh' content='0; URL=?'>";
                    break;  
                case 'add':
                    switch ($dm) {
                        case 'gio_hang':
                            $sl = isset($_POST['So_Luong']) ? $_POST['So_Luong'] : 1;
                            if(isset($_SESSION['gio_hang'][$id][$id_m])){
                                $_SESSION['gio_hang'][$id][$id_m] += 1 ;
                            }else{
                                $_SESSION['gio_hang'][$id][$id_m] = $sl;
                            }
                            
                            if(isset($_GET['ctrl'])){
                                echo "<meta http-equiv='refresh' content='0; URL=?ctrl=".$_GET['ctrl'] ."&id=$id'>";
                            }else{
                                echo "<meta http-equiv='refresh' content='0; URL=?'>";
                            }
                            break;
                        case 'yeu_thich':
                            if(isset($_SESSION['yeu_thich'][$id])){
                                $_SESSION['yeu_thich'][$id]=1;
                            }else{
                                $_SESSION['yeu_thich'][$id]=1;
                            }

                            if(isset($_GET['ctrl'])){
                                echo "<meta http-equiv='refresh' content='0; URL=?ctrl=".$_GET['ctrl'] ."&id=$id'>";
                            }else{
                                echo "<meta http-equiv='refresh' content='0; URL=?'>";
                            }
                            break;
                    }   
                    break;    
                case 'delete':
                    switch ($dm) {
                        case 'gio_hang':
                            if(isset($_SESSION['gio_hang'][$id])){
                                if(count($_SESSION['gio_hang'][$id]) > 1){
                                    unset($_SESSION['gio_hang'][$id][$id_m]);
                                }else{
                                    unset($_SESSION['gio_hang'][$id]);
                                }
                                
                            }
                            
                            if(isset($_GET['ctrl'])){
                                echo "<meta http-equiv='refresh' content='0; URL=?ctrl=".$_GET['ctrl']."&id=$id '>";
                            }else{
                                echo "<meta http-equiv='refresh' content='0; URL=?'>";
                            }
                            break;
                        case 'yeu_thich':
                            if(isset($_SESSION['yeu_thich'][$id])){
                                unset($_SESSION['yeu_thich'][$id]);
                            }
                            
                            if(isset($_GET['ctrl'])){
                                echo "<meta http-equiv='refresh' content='0; URL=?ctrl=".$_GET['ctrl'] ."'>";
                            }else{
                                echo "<meta http-equiv='refresh' content='0; URL=?'>";
                            }
                            break;
                    }
                    break;
                      
                    
            }
            $data_dmm = $this->Model->fetch("select * from danh_muc");
            $data_ban_chay = $this->Model->fetch("select * from sp_ban_chay limit 10");
            $anh_sp = $this->Model->fetch("select * from sp_image");
            $ctrl = isset($_GET['ctrl']) ? "client/controllers/".$_GET['ctrl'].".php" : "client/controllers/Home.php";
            //session_unset();
            include "layout/client/index.php";
        }
    }
    function currency_format($number, $suffix = 'đ') {
        //if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        //}
    }
    new index();
?>