<?php

    class Add extends Controller{
        public function __construct()
        {
            parent::__construct();

            include "views/users/Add.php";
        }
    }
    new Add();

?>