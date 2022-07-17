<?php
    class category extends Controller{
        public function __construct(){
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : '' ;
            $id = isset($_GET['id']) ? $_GET['id'] : '' ;
            $thong_bao ='';
            switch ($act) {
                case 'add':
                    $ma_dm = isset($_POST['ma_dm']) ? $_POST['ma_dm'] :'';
                    $ten_dm = isset($_POST['ten_dm']) ? $_POST['ten_dm'] : '';

                    $this->Model->execute("insert into danh_muc(ma_dm,ten_dm) values ('$ma_dm','$ten_dm')");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=categorys/category'>";
                    break;
                case 'edit':
                    $record = $this->Model->fetchOne("select * from danh_muc where id = '$id'");
                    break;
                case 'do_edit':
                    $ma_dm = isset($_POST['ma_dm']) ? $_POST['ma_dm'] :'';
                    $ten_dm = isset($_POST['ten_dm']) ? $_POST['ten_dm'] : '';
                    $this->Model->execute("update danh_muc set ma_dm='$ma_dm',ten_dm = '$ten_dm' where id = '$id'");
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