<?php

    class Add extends Controller{
        public function __construct()
        {
            parent:: __construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";

            if($act == "add"){
                $Ma_SP = isset($_POST['Ma_SP']) ? trim(strtoupper($_POST['Ma_SP'])) : "";
                $Ma_DM = isset($_POST['Danh_Muc']) ? $_POST['Danh_Muc'] : "";
                $Ma_TH = isset($_POST['Thuong_Hieu']) ? $_POST['Thuong_Hieu'] : "";
                $Ten_SP = isset($_POST['Ten_SP']) ? $_POST['Ten_SP'] : "";
                $Loai = isset($_POST['Loai']) ? trim(strtoupper($_POST['Loai'])) : "";
                $Mo_Ta = isset($_POST['Mo_Ten']) ? $_POST['Mo_Ta'] : "";
                $Gia = isset($_POST['Gia']) ? $_POST['Gia'] : "";
                if(empty($Ma_SP) || empty($Ma_DM) || empty($Ma_TH) || empty($Gia) || empty($Ten_SP)){
                    ?> <script> window.alert("Vui lòng nhập đủ thông tin") </script> <?php
                }else{
                    if(isset($_FILES['Image']['name']) && empty($_FILES['Image']['name'])){ 
                        ?> <script> window.alert("Thiếu ảnh minh họa sản phẩm") </script> <?php
                    }else{
                        $Anh = time().$_FILES['Image']['name'];
                        move_uploaded_file($_FILES['Image']['tmp_name'], "../public/Upload/Products/".time().$_FILES['Image']['name'] );
                        $check = $this->Model->fetchOne("select * from san_pham where Ma_SP = '$Ma_SP' AND Loai='$Loai'");
                        
                        if (!empty($check['Ma_SP']) || !empty($check['Ma_SP']) && !empty($check['Loai'])) {
                            ?> <script> window.alert("Sản phẩm đã tồn tại") </script> <?php
                        }else{
                            try {
                                $sql = "insert into san_pham values ('','$Ma_SP','$Ma_DM','$Ma_TH','$Ten_SP','$Loai','$Gia','$Mo_Ta','$Anh')";
                                $this->Model->execute($sql);
                                
        
                                if(isset($_POST['Ma_Mau']) && isset($_POST['Ten_Mau'])){
                                    $Ma_Mau = $_POST['Ma_Mau'];
                                    $Ten_Mau = $_POST['Ten_Mau'];
        
                                    for ($i=0; $i < count($Ma_Mau); $i++) { 
                                        $sql_mau = "insert into ton_sp values ('','$Ma_SP','$Loai','$Ma_Mau[$i]','$Ten_Mau[$i]',0)";
                                        $this->Model->execute($sql_mau);
        
                                    } 
                                }
        
                                ?> <script> window.alert("Thêm thành công!") </script> <?php
                            } catch (\Throwable $th) {
                                ?> <script> window.alert("Thêm không thành công!") </script> <?php
                            }
                        }
                        
                    }
                }
                echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=products/Add'>";
            }

            $data_th = $this->Model->fetch("select * from thuong_hieu");
            $data_dm = $this->Model->fetch("select * from danh_muc");
            include "views/products/Add.php";
        }
    }
    new Add();
?>
