<?php
    session_start();
    include "../config/Config.php";
    include "../config/Model.php";
    include "../config/Controller.php";
    include "../config/RemoveUnicode.php";
    include "../config/Token.php";

    if(isset($_GET['act']) && $_GET['act'] =='logout'){
        unset($_SESSION['account']);
    }


    if (isset($_SESSION['account'])) {
        $ctrl = isset($_GET['ctrl']) ? "controllers/".$_GET['ctrl'].".php" : "controllers/Home.php";
        include "../layout/admin/admin.php";
    } else{
        include "controllers/Login.php";
    }

?>