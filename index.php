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
            
            switch ($act) {
                case 'logout':
                    unset($_SESSION['account']);

                    echo "<meta http-equiv='refresh' content='0; URL=?'>";
                    break;  
                case 'add':
                    switch ($dm) {
                        case 'gio_hang':
                            if(isset($_SESSION['gio_hang'][$id])){
                                $_SESSION['gio_hang'][$id] +=1;
                            }else{
                                $_SESSION['gio_hang'][$id]=1;
                            }
                            
                            if(isset($_GET['ctrl'])){
                                echo "<meta http-equiv='refresh' content='0; URL=?ctrl=".$_GET['ctrl'] ."'>";
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
                                echo "<meta http-equiv='refresh' content='0; URL=?ctrl=".$_GET['ctrl'] ."'>";
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
                                unset($_SESSION['gio_hang'][$id]);
                            }
                            
                            if(isset($_GET['ctrl'])){
                                echo "<meta http-equiv='refresh' content='0; URL=?ctrl=".$_GET['ctrl'] ."'>";
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

        
            $ctrl = isset($_GET['ctrl']) ? "client/controllers/".$_GET['ctrl'].".php" : "client/controllers/Home.php";
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