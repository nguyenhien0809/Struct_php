<?php

    class Position extends Controller{
        public function __construct(){
            parent:: __construct();          
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : 0;            
  
            switch ($act) {
                
                case 'add':   
                    $position = $_POST['position'];
                    $describe = $_POST['describe']; 
                    $check = $this->Model->fetchOne("select * from user_position where Level='$position'");
                    if(isset($check['Level'])){
                
                    }else{          
                        $this->Model->execute("insert into user_position(`Level`, `Ghi_Chu`) values ('$position', '$describe')");
                        echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Position'>";
                    }
                    break;
                case 'delete':
                    $this->Model->execute("delete from user_position where id=$id");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Position'>";
                    break;
                case 'edit':
                    $record = $this->Model->fetchOne("select * from user_position where id=$id");                           
                    break;
                case 'do_edit':
                    $position = $_POST['position'];
                    $describe = $_POST['describe'];
                    $this->Model->execute("update user_position set Level = '$position',Ghi_Chu='$describe' where id='$id'");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Position'>";
                    break;
            }
          
            $data = $this->Model->fetch("select * from user_position");
            
            include "views/users/Position.php";
        }
    }
    new Position();

?>