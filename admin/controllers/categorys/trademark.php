<?php 
    class trademark extends Controller{
        public function __construct(){
            parent:: __construct();

            $act = isset($_GET['act']) ? $_GET['act'] : '';
            $id = isset($_GET['id']) ? $_GET['id'] : '';

            switch ($act) {
                case 'add':
                    $danh_muc = isset($_POST['danh_muc']) ? $_POST['danh_muc'] : '';
                    $ma_th = isset($_POST['ma_th']) ? $_POST['ma_th'] : '';
                    $ten_th = isset($_POST['ten_th']) ? $_POST['ten_th'] : '';

                    $this->Model->execute("insert into thuong_hieu(id_dm,ma_th,ten_th) values ('$danh_muc','$ma_th','$ten_th')");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=categorys/trademark'>";
                    break;
                case 'edit':
                    $record = $this->Model->fetchOne("select * from thuong_hieu where id = '$id'");
                    break;
                case 'do_edit':
                    $danh_muc = isset($_POST['danh_muc']) ? $_POST['danh_muc'] : '';
                    $ma_th = isset($_POST['ma_th']) ? $_POST['ma_th'] : '';
                    $ten_th = isset($_POST['ten_th']) ? $_POST['ten_th'] : '';

                    $this->Model->execute("update thuong_hieu set id_dm= '$danh_muc',ma_th = '$ma_th',ten_th = '$ten_th' where id='$id'");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=categorys/trademark'>";
                    break;
                case 'delete':
                    $this->Model->execute("delete from thuong_hieu where id ='$id'");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=categorys/trademark'>";
                    break;
            }

            $danh_muc = $this->Model->fetch("select * from danh_muc");
            $data = $this->Model->fetch("select * from thuong_hieu");
            include "views/categorys/trademark.php";
        }
    }
    new trademark();
?>