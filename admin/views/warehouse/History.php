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
    <div class="col-xs-2">
        <select name="" id="" class="form-control" onchange="location = this.value;">
            <option value="index.php?ctrl=warehouse/History&act=select&sl=25" <?php echo isset($_GET['sl']) && $_GET['sl'] == 25 ? 'selected="selected"' : "" ?> >Hiển thị 25</option>
            <option value="index.php?ctrl=warehouse/History&act=select&sl=50" <?php echo isset($_GET['sl']) && $_GET['sl'] == 50 ? 'selected="selected"' : "" ?> >Hiển thị 50</option>
            <option value="index.php?ctrl=warehouse/History&act=select&sl=100" <?php echo isset($_GET['sl']) && $_GET['sl'] == 100 ? 'selected="selected"' : "" ?> >Hiển thị 100</option>
        </select>
    </div>
    <div class="col-xs-6"></div>
    <div class="col-xs-4">
        <form action="index.php?ctrl=warehouse/History&act=search" style="margin-bottom:10px;" method="post">
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
                <div class="panel-heading">Lịch sử nhập hàng</div>
                <Div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td width="40px">STT</td>
                            <td >Mã sản phẩm</td>
                            <td>Màu sắc</td>
                            <td>Tông Số lượng</td>
                            <td>Số lượng nhập</td>
                            <td>Thời gian</td>
                        </tr>
                        <?php
                            $stt=0;
                            foreach ($data as $value) { 
                                $stt++;
                        ?>
                        <tr>
                            
                            <td><?php echo $stt ?></td>
                            <td><?php echo $value['id_SP'] ?></td>
                            <td style="background:<?php echo $value['Mau'] ?>;"><?php echo $value['Mau'] ?></td>
                            <td><?php echo $value['So_Luong_Tong'] ?></td>
                            <td><?php echo $value['So_Luong_Nhap'] ?></td>
                            <td><?php echo $value['Ngay_Nhap'] ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </Div>
            </div>
        </div> 