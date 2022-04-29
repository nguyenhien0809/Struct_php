<?php
    class Add extends Controller{
        public function __construct()
        {
            parent:: __construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            $d_mau_sac ="";
            $dataOne = array('id' => "");

            switch ($act) {
                case 'select':
                    $d_mau_sac = $this->Model->fetch("select * from ton_sp where id_SP = '$id' ");
                    $dataOne = $this->Model->fetchOne("Select * from san_pham where id='$id'");
                    break;
                case 'add':
                    $Mau = isset($_POST['Mau']) ? $_POST['Mau'] : "";
                    $So_Luong = isset($_POST['So_Luong']) ? $_POST['So_Luong'] : "";
        
                    $sql = "insert into kho values ('','$id','$Mau','$So_Luong',NOW())";
                    $this->Model->execute($sql);
                    ?> <script> window.alert("Thêm thành công") </script> <?php  
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=warehouse/Add'>";
                    break;
            }

            
            $data = $this->Model->fetch("Select * from san_pham");
            include "views/warehouse/Add.php";
        }
    }
    new Add();
?>