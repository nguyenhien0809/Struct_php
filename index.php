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
                    unset($_SESSION['customer']);

                    echo "<meta http-equiv='refresh' content='0; URL=?'>";
                    break;  
                case 'add':
                    switch ($dm) {
                        case 'gio_hang':
                            $sl = isset($_POST['so_luong']) ? $_POST['so_luong'] : 1;
                            if(isset($_SESSION['gio_hang'][$id])){
                                $_SESSION['gio_hang'][$id] += 1 ;
                            }else{
                                $_SESSION['gio_hang'][$id] = $sl;
                            }
                            
                            if(isset($_GET['ctrl'])){
                                echo "<meta http-equiv='refresh' content='0; URL=?ctrl=".$_GET['ctrl'] ."&id=$id'>";
                            }else{
                                echo "<meta http-equiv='refresh' content='0; URL=?'>";
                            }
                            break;
                        case 'yeu_thich':

                            if(isset($_SESSION['customer'])){
                                $id_user = $_SESSION['customer']['id'];
                                $data = $this->Model->fetch("select * from yeu_thich where id_user = '$id_user'");

                                $this->Model->execute("INSERT INTO `yeu_thich`(`id`, `id_user`, `id_sp`) VALUES ('','$id_user','$id')");

                                if(isset($_GET['ctrl'])){
                                    echo "<meta http-equiv='refresh' content='0; URL=?ctrl=".$_GET['ctrl'] ."&id=$id'>";
                                }else{
                                    echo "<meta http-equiv='refresh' content='0; URL=?'>";
                                }
                            }else{
                                include "client/views/Login_register.php";
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
                                echo "<meta http-equiv='refresh' content='0; URL=?ctrl=".$_GET['ctrl']."&id=$id '>";
                            }else{
                                echo "<meta http-equiv='refresh' content='0; URL=?'>";
                            }
                            break;

                    }
                    break;
                      
                    
            }
            if(isset($_SESSION['customer'])) {
                $id_user = $_SESSION['customer']['id'];
                $yeu_thich = $this->Model->count("select * from yeu_thich where id_user = '$id_user'");
            }
            $data_dmm = $this->Model->fetch("select * from danh_muc");

            $ctrl = isset($_GET['ctrl']) ? "client/controllers/".$_GET['ctrl'].".php" : "client/controllers/Home.php";

            include "layout/client/index.php";
        }
    }
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
    new index();
?>