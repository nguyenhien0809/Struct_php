<?php
    class Wishlist extends Controller{
        public function __construct(){
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            
            
            

            include "client/views/Wishlist.php";
        }
    }
    
    new Wishlist();
?>