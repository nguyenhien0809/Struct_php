<?php
    class category extends Controller{
        public function __construct(){
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : '' ;
            $id = isset($_GET['id']) ? $_GET['id'] : 0 ;
            $thong_bao ='';
            switch ($act) {
                case 'add':
                    $Ma_DM = isset($_POST['Ma_DM']) ? $_POST['Ma_DM'] :'';
                    $Ten_DM = isset($_POST['Ten_DM']) ? $_POST['Ten_DM'] : '';

                    $this->Model->execute("insert into danh_muc(Ma_DM,Ten_DM) values ('$Ma_DM','$Ten_DM')");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=categorys/category'>";
                    break;
                case 'edit':
                    $record = $this->Model->fetchOne("select * from danh_muc where id = '$id'");
                    break;
                case 'do_edit':
                    $Ma_DM = isset($_POST['Ma_DM']) ? $_POST['Ma_DM'] :'';
                    $Ten_DM = isset($_POST['Ten_DM']) ? $_POST['Ten_DM'] : '';
                    $this->Model->execute("update danh_muc set Ma_DM = '$Ma_DM',Ten_DM = '$Ten_DM' where id='$id'");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=categorys/category'>";
                    break;
                case 'delete':
                    $this->Model->execute("delete from danh_muc where id='$id'");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=categorys/category'>";
                    break;
            }

            $data = $this->Model->fetch("select * from danh_muc");

            include "views/categorys/category.php";
        }
    }

    new category();
?>