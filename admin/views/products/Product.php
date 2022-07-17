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
                            <td >Mã sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Danh mục</td>
                            <td>Thương hiệu</td>
                            <td>Đánh giá</td>
                            <td>Ngày nhập</td>
                            <td></td>
                        </tr>
                        <tbody >
                            <?php
                                $stt=0;
                                foreach ($data as $value) { 
                                    $stt++;
                            ?>

                            <tr>
                                
                                <td><?php echo $stt ?></td>
                                <td><?php echo $value['ma_sp'] ?></td>
                                <td><?php echo $value['ten_sp'] ?></td>
                                <td><?php echo $value['id_dm'] ?></td>
                                <td><?php echo $value['id_th'] ?></td>
                                <td><?php echo $value['diem_danh_gia'] ?></td>
                                <td><?php echo $value['ngay_nhap'] ?></td>
                                <td>
                                    <a href="index.php?ctrl=products/Product&act=edit&id=<?php echo $value['id'] ?>" class="btn btn-success">Thông tin</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </Div>
            </div>
        </div>

    </div>


