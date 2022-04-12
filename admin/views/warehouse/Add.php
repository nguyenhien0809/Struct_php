<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Kho
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-database"></i> Kho/Nhập
            </li>
        </ol>
    </div>
</div>
<div class="col-md">
        <div class="panel panel-primary">
            <div class="panel-heading">Nhập hàng</div>
            <div class="panel-body">
                <form action="index.php?ctrl=warehouse/Add&act=add" method="post">

                    <span>Mã sản phẩm</span>
                    <select name="M_sp" class="form-control" onchange="location = this.value;">
                    <option value=""></option>
                        <?php foreach ($data as $value) { ?> 
                        <option value="index.php?ctrl=warehouse/Add&ma=<?php echo $value['Ma_SP'] ?>"  <?php echo isset($_GET['ma']) ? $_GET['ma']== $value['Ma_SP'] ? 'selected="selected"' :'' : '' ?> >
                            <?php echo $value['Ma_SP'] ?>
                        </option>
                        <?php } ?>
                    </select>
                    
                    <span>Loại bộ nhớ</span>
                    <select name="Dung_Luong" class="form-control">
                        <?php foreach ($check as $valuee) { ?>
                        <option value="<?php echo $valuee['Dung_Luong'] ?>"><?php echo $valuee['Dung_Luong'] ?></option>
                        <input type="hidden" value="<?php echo $valuee['Ma_SP'] ?>" name="Ma_SP">
                        <?php } ?>
                    </select>

                    <span>Màu sắc</span>
                    <select name="Mau" class="form-control">
                        <?php foreach ($check as $valueee) { ?>
                        <option value="<?php echo $valueee['Mau'] ?>"><?php echo $valueee['Mau'] ?></option>
                        <?php } ?>
                    </select>
                    <span>Số lượng</span>
                    <input type="number" name="So_Luong" placeholder="Số lượng" require class="form-control">
                    <input type="submit" value="Thêm" class="btn btn-primary" style="margin-top:10px;">
                </form>
            </div>
        </div>
    
</div>

    
</div>