<?php 

    class Product extends Controller{
        public function __construct()
        {
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : "";

            switch ($act) {
                case 'delete':
                    $this->Model->execute("delete from san_pham where id = '$id'");
                    ?> <script> window.alert("Xóa thành công") </script> <?php  
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=products/Product'>";
                    break;

                case 'search':
                    $sr = isset($_POST['search']) ? $_POST['search'] : "";
                    $data = $this->Model->fetch("select * from san_pham where Ma_SP like '%$sr%'  OR Ten_SP like '%$sr%' order by id desc limit 25");
                    break;
                case 'select':
                    $sl = isset($_GET['sl']) ? $_GET['sl'] : "";
                    $data = $this->Model->fetch("select * from san_pham order by id desc limit $sl");
                    break;    
                default:
                    $data = $this->Model->fetch("select * from san_pham order by id desc limit 25");
                break;
            }

            include "views/products/Product.php";
            
        }
    }
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
    new Product();
?>
