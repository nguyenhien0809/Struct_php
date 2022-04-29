<?php
    class category extends Controller{
        public function __construct(){
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : '' ;
            $Ma_DM = isset($_GET['Ma_DM']) ? $_GET['Ma_DM'] : '' ;
            $thong_bao ='';
            switch ($act) {
                case 'add':
                    $Ma_DM = isset($_POST['Ma_DM']) ? $_POST['Ma_DM'] :'';
                    $Ten_DM = isset($_POST['Ten_DM']) ? $_POST['Ten_DM'] : '';

                    $this->Model->execute("insert into danh_muc(Ma_DM,Ten_DM) values ('$Ma_DM','$Ten_DM')");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=categorys/category'>";
                    break;
                case 'edit':
                    $record = $this->Model->fetchOne("select * from danh_muc where Ma_DM = '$Ma_DM'");
                    break;
                case 'do_edit':
                    $Ten_DM = isset($_POST['Ten_DM']) ? $_POST['Ten_DM'] : '';
                    $this->Model->execute("update danh_muc set Ten_DM = '$Ten_DM' where Ma_DM='$Ma_DM'");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=categorys/category'>";
                    break;
                case 'delete':
                    $this->Model->execute("delete from danh_muc where Ma_DM='$Ma_DM'");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=categorys/category'>";
                    break;
            }

            $data = $this->Model->fetch("select * from danh_muc");

            include "views/categorys/category.php";
        }
    }

    new category();
?>