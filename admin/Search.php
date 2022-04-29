
<table class="table table-bordered table-hover text-center" >
    <tr>
        <td width="40px">STT</td>
        <td width="150px">Ảnh</td>
        <td >Mã sản phẩm</td>
        <td>Tên sản phẩm</td>
        <td>Danh mục</td>
        <td>Thương hiệu</td>
        <td>Loại</td>
        <td>Giá</td>
        <td>Tồn</td>
        <td></td>
    </tr>
    <tbody >
        <?php
            $stt=0;
            foreach ($data as $value) { 
                $stt++;
                $sql = "select SUM(So_Luong) as Ton from ton_sp where id_SP='".$value['id']."'";
                $dataTon = $this->Model->fetchOne($sql);
        ?>

        <tr>
            
            <td><?php echo $stt ?></td>
            <td><img src="../public/Upload/Products/<?php echo $value['Anh'] ?>" class="img-responsive" width="150px"></td>
            <td><?php echo $value['Ma_SP'] ?></td>
            <td><?php echo $value['Ten_SP'] ?></td>
            <td><?php echo $value['Ma_DM'] ?></td>
            <td><?php echo $value['Ma_TH'] ?></td>
            <td><?php echo $value['Loai']?></td>
            <td><?php echo currency_format($value['Gia']) ?></td>
            <td><?php echo $dataTon['Ton'] ?></td>
            <td>
                <a href="index.php?ctrl=products/Info&act=info&id=<?php echo $value['id'] ?>" class="btn btn-success">Thông tin</a>
                <a data-toggle="modal" data-target="#myModal<?php echo $value['id'] ?>" class="btn btn-warning">Xóa</a>

                <!-- Modal -->
                <div class="modal fade" id="myModal<?php echo $value['id'] ?>" role="dialog">
                    <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thông báo!</h4>
                        </div>
                        <div class="modal-body">
                        <p>Bạn có chắc chắn muốn xóa sản phẩm <?php echo $value['Ten_SP']."-".$value['Loai'] ?> không ?.</p>
                        </div>
                        <div class="modal-footer">
                        <a href="index.php?ctrl=products/Product&act=delete&id=<?php echo $value['id'] ?>" class="btn btn-warning">Có</a>	
                        <a  class="btn btn-success" data-dismiss="modal">Close</a>
                        </div>
                    </div>
                    
                </div> 
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table> 