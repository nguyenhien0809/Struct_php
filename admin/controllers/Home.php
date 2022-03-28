<?php
    class home extends Controller{
        public function __construct(){
            parent::__construct();
            include "views/Home.php";
        }
    }
    new home();
?>