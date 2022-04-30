<?php
    class Login_register extends Controller{
        public function __construct(){
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";

            
            switch ($act) {
                case "login":

                    break;
                case "register":
                
                    break;
                
                
            }
            

            include "client/views/Login_register.php";
        }
    }
    
    new Login_register();
?>