<?php 
    class trademark extends Controller{
        public function __construct(){
            parent:: __construct();

            $act = isset($_GET['act']) ? $_GET['act'] : '';
            $Ma_TH = isset($_GET['Ma_TH']) ? $_GET['Ma_TH'] : '';

            switch ($act) {
                case 'add':
                    $Ma_TH = isset($_POST['Ma_TH']) ? $_POST['Ma_TH'] : '';
                    $Ten_TH = isset($_POST['Ten_TH']) ? $_POST['Ten_TH'] : '';

                    $this->Model->execute("insert into thuong_hieu(Ma_TH,Ten_TH) values ('$Ma_TH','$Ten_TH')");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=categorys/trademark'>";
                    break;
                case 'edit':
                    $record = $this->Model->fetchOne("select * from thuong_hieu where Ma_TH = '$Ma_TH'");
                    break;
                case 'do_edit':
                    $Ten_TH = isset($_POST['Ten_TH']) ? $_POST['Ten_TH'] : '';

                    $this->Model->execute("update thuong_hieu set Ten_TH = '$Ten_TH' where Ma_TH = '$Ma_TH'");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=categorys/trademark'>";
                    break;
                case 'delete':
                    $this->Model->execute("delete from thuong_hieu where Ma_TH ='$Ma_TH'");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=categorys/trademark'>";
                    break;
            }


            $data = $this->Model->fetch("select * from thuong_hieu");
            include "views/categorys/trademark.php";
        }
    }
    new trademark();
?>