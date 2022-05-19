<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Sản Phẩm
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-ellipsis-h"></i> Sản Phẩm/Danh sách
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xs-2">
        <select name="" id="" class="form-control" onchange="location = this.value;">
            <option value="index.php?ctrl=products/Product&act=select&sl=25" <?php echo isset($_GET['sl']) && $_GET['sl'] == 25 ? 'selected="selected"' : "" ?> >Hiển thị 25</option>
            <option value="index.php?ctrl=products/Product&act=select&sl=50" <?php echo isset($_GET['sl']) && $_GET['sl'] == 50 ? 'selected="selected"' : "" ?> >Hiển thị 50</option>
            <option value="index.php?ctrl=products/Product&act=select&sl=100" <?php echo isset($_GET['sl']) && $_GET['sl'] == 100 ? 'selected="selected"' : "" ?> >Hiển thị 100</option>
        </select>
    </div>
    <div class="col-xs-6"></div>
    <div class="col-xs-4">
        <form action="index.php?ctrl=products/Product&act=search" style="margin-bottom:10px;" method="post">
          <div class="input-group">
            <input type="text" name="search" id="input_search" class="form-control" placeholder="Search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-xs">
        <div class="panel panel-primary">
                <div class="panel-heading">Danh sách sản phẩm</div>
                <Div class="panel-body" >
                    <table class="table table-bordered table-hover text-center" >
                        <tr>
                            <td width="40px">STT</td>
                            <td width="150px">Ảnh</td>
                            <td >Mã sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Danh mục</td>
                            <td>Thương hiệu</td>
                            <td>Loại</td>
                            <td>Giá gốc</td>
                            <td>Giá sale</td>
                            <td>Giá sau</td>
                            <td>Tồn</td>
                            <td></td>
                        </tr>
                        <tbody >
                            <?php
                                $stt=0;
                                foreach ($data as $value) { 
                                    $stt++;
                                    $sql = "select SUM(So_Luong) as Ton from sp_ton where id_SP='".$value['id']."'";
                                    $dataTon = $this->Model->fetchOne($sql);
                                    $sp_gia = $this->Model->fetchOne("select * from sp_gia where id_SP = '".$value['id']."'");
                            ?>

                            <tr>
                                
                                <td><?php echo $stt ?></td>
                                <td><img src="../public/Upload/Products/<?php echo $value['Anh'] ?>" class="img-responsive" width="150px"></td>
                                <td><?php echo $value['Ma_SP'] ?></td>
                                <td><?php echo $value['Ten_SP'] ?></td>
                                <td><?php echo $value['Ma_DM'] ?></td>
                                <td><?php echo $value['Ma_TH'] ?></td>
                                <td><?php echo $value['Loai']?></td>
                                <td><?php echo currency_format($sp_gia['Gia_Truoc']) ?></td>
                                <td><?php echo $sp_gia['Phan_Tram_Giam'] ?></td>
                                <td><?php echo currency_format($sp_gia['Gia_Sau']) ?></td>
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
                </Div>
            </div>
        </div>

    </div>
     
                          

        