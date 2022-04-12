<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Kho
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-database"></i> Kho/lịch sử nhập
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <div class="panel panel-primary">
                <div class="panel-heading">Lịch sử nhập hàng</div>
                <Div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td width="40px">STT</td>
                            <td >Mã sản phẩm</td>
                            <td>Loại dung lượng</td>
                            <td>Màu sắc</td>
                            <td>Tổng số lượng</td>
                            <td>Số lượng nhập</td>
                            <td>Thời gian</td>
                        </tr>
                        <?php
                            $stt=0;
                            foreach ($data as $value) { 
                                $stt++;
                                $record = $this->Model->fetchOne("select * from info_user where id='".$value['id']."'");
                        ?>
                        <tr>
                            <td><img src="../public/Upload/Avatar/<?php echo $record['Anh'] ?>" alt="avt" width="100px"></td>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $value['Ma_SP'] ?></td>
                            <td><?php echo $value['Dung_Luong']==0? 'Nam' : ($record['Gioi_Tinh']==0? 'Nữ' : 'Khác') ?></td>
                            <td><?php echo $value['Mau'] ?></td>
                            <td><?php echo $value['So_Luong_Tong'] ?></td>
                            <td><?php echo $value['So_Luong_Nhap'] ?></td>
                            <td><?php echo $value['Ngay_Nhap'] ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </Div>
            </div>
        </div> 