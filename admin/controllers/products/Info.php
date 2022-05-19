<?php 

    class Info extends Controller{
        public function __construct()
        {
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            $tb = isset($_GET['tb']) ? $_GET['tb'] : "";

            switch ($act) {
                case 'info':
                    $dataOne = $this->Model->fetchOne("select * from san_pham where id ='$id' ");
                    $dataMau = $this->Model->fetch("select * from sp_ton where id_SP ='$id'");
                    $dataAnh = $this->Model->fetchOne("select * from sp_image where id_SP ='$id'");
                    $dataTS = $this->Model->fetchOne("select * from sp_thong_so where id_SP ='$id'");
                    $sp_gia = $this->Model->fetchOne("select * from sp_gia where id_SP = '$id'");
                    break;
                case 'do_edit':
                    switch ($tb) {
                        case 'sp':
                            $Ma_SP = isset($_POST['Ma_SP']) ? $_POST['Ma_SP'] : "";
                            $Ma_DM = isset($_POST['Danh_Muc']) ? $_POST['Danh_Muc'] : "";
                            $Ma_TH = isset($_POST['Thuong_Hieu']) ? $_POST['Thuong_Hieu'] : "";
                            $Ten_SP = isset($_POST['Ten_SP']) ? $_POST['Ten_SP'] : "";
                            $Loai = isset($_POST['Loai']) ? $_POST['Loai'] : "";
                            $Mo_Ta = isset($_POST['Mo_Ta']) ? $_POST['Mo_Ta'] : "";
                            
                            
                            $sql = "UPDATE san_pham set Ma_SP='$Ma_SP',Ma_DM='$Ma_DM',Ma_TH='$Ma_TH',Ten_SP='$Ten_SP',Loai='$Loai',Gia='$Gia',Mo_Ta='$Mo_Ta' where id='$id'";
                            $this->Model->execute($sql);
                            
                            $Gia = isset($_POST['Gia_goc']) ? $_POST['Gia_goc'] : 0;
                            $PT_sale = isset($_POST['PT_sale']) ? $_POST['PT_sale'] : 0;
                            $GiaSau = $Gia*((100 - $PT_sale)/100);

                            $sql_gia = "UPDATE sp_gia set Gia_Truoc='$Gia',Phan_Tram_Giam = '$PT_sale' ,Gia_Sau='$GiaSau' where id_SP='$id'";
                            $this->Model->execute($sql_gia);

                            // Sửa lại màu
                            if(isset($_POST['id_Mau'])){
                                $id_Mau = $_POST['id_Mau'];
                                $Ma_Mau = isset($_POST['Ma_Mau']) ? $_POST['Ma_Mau'] : "";
                                $Ten_Mau = isset($_POST['Ten_Mau']) ? $_POST['Ten_Mau'] : "";
                                $So_Luong = isset($_POST['So_Luong']) ? $_POST['So_Luong'] : "";
    
                                foreach($Ma_Mau as $keys => $names) { 
                                    $sqlMau = "UPDATE sp_ton set Ma_Mau='$Ma_Mau[$keys]', Ten_Mau='$Ten_Mau[$keys]',So_Luong='$So_Luong[$keys]' where id_SP='$id' AND id = '$id_Mau[$keys]'";
                                    $this->Model->execute($sqlMau);
                                }
                            }

                            // Thêm màu
                            if(isset($_POST['Ma_Mau1'])){
                                $Ma_Mau1 = $_POST['Ma_Mau1'];
                                $Ten_Mau1 = $_POST['Ten_Mau1'];

                                foreach($Ma_Mau1 as $key => $name){
                                    echo $sqlMau1 = "INSERT into sp_ton values('','$id','$Ma_Mau1[$key]','$Ten_Mau1[$key]',0)";
                                    $this->Model->execute($sqlMau1);
                                }
                            }
                            ?> <script> window.alert("Cập nhật thông tin thành công") </script> <?php  
                            echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=products/Info&act=info&id=$id&#san_p'>";
                            break;
                        case 'asp':
                            $Ma_SP = isset($_POST['Ma_SP']) ? $_POST['Ma_SP'] : "";
                            
                            if(isset($_FILES['ImageMain']) && !empty($_FILES['ImageMain']['name'])){
                                $Anh = time().$_FILES['ImageMain']['name'];

                                $check = $this->Model->fetchOne("select * from san_pham where Ma_SP='$Ma_SP'"); 
                                file_exists("../public/Upload/Avatar/".$check['Anh']) ? unlink("../public/Upload/Avatar/".$check['Anh']) : '';

                                move_uploaded_file($_FILES['ImageMain']['tmp_name'], "../public/Upload/Products/".time().$_FILES['ImageMain']['name'] );

                                $sql = "UPDATE san_pham set Anh='$Anh' where Ma_SP='$Ma_SP'";
                                $this->Model->execute($sql);
                            }
                            
                            if(isset($_FILES['Image'])){
                                foreach($_FILES['Image']['tmp_name'] as $key => $tmp_name){
                                    if(!empty($_FILES['Image']['name'][$key])){
                                        
                                        $check = $this->Model->fetchOne("select * from sp_image where id_SP='$id'"); 
                                        file_exists("../public/Upload/Products/".$check["Anh".$key]) ? unlink("../public/Upload/Products/".$check["Anh".$key]) : '';
    
                                        move_uploaded_file($_FILES['Image']['tmp_name'][$key], "../public/Upload/Products/".time().$_FILES['Image']['name'][$key] );
    
                                        $sql = "UPDATE sp_image set Anh".$key."='".time().$_FILES['Image']['name'][$key]."' where id_SP='$id'";
                                        $this->Model->execute($sql);
                                    }
                                }
                            }
                            ?> <script> window.alert("Cập nhật hình ảnh thành công") </script> <?php  
                            echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=products/Info&act=info&id=$id&#a_san_p'>";

                            break;
                        case 'tssp':
                            $Ma_SP = isset($_POST['Ma_SP']) ? $_POST['Ma_SP'] : "";
                            $Thong_So = isset($_POST['Thong_So']) ? $_POST['Thong_So'] : "";

                            foreach($Thong_So as $key => $TSo){

                                $sql = "UPDATE sp_thong_so set Thong_So".$key." = '$TSo' where id_SP = '$id'";
                                $this->Model->execute($sql);
                            }
                            ?> <script> window.alert("Cập nhật thông số thành công") </script> <?php  
                            echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=products/Info&act=info&id=$id&#ts_san_p'>";
                            break;
                    }
                    
                break;
                
            }
            
            $data_dm = $this->Model->fetch("select * from danh_muc");
            $data_th = $this->Model->fetch("select * from thuong_hieu");
            $data = $this->Model->fetch("select * from san_pham");
            include "views/products/Info.php";
        }
    }
    new Info();

?>