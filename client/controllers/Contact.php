<?php
class Contact extends Controller{
    public function __construct(){
        parent::__construct();
        $act = isset($_GET['atc']) ? $_GET['atc'] : '';

        switch ($act){
            case 'send':
                $ho_ten = isset($_POST['ho_ten']) ? $_POST['ho_ten'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
                $noi_dung = isset($_POST['noi_dung']) ? $_POST['noi_dung'] : '';

                $sql= "INSERT INTO `tb_contact`(`id`, `ho_ten`, `email`, `sdt`, `noi_dung`,`seen`) VALUES ('','$ho_ten','$email','$sdt','$noi_dung',0)";
                $this->Model->execute($sql);
                header('localtion: ?');
                break;
        }

        include "client/views/contact.php";
    }
}
new Contact();
?>