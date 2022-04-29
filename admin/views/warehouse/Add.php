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
<div class="col-xs">
        <div class="panel panel-primary">
            <div href="javascript:0;" class="panel-heading" >Nhập hàng</div>
            <div class="panel-body">
                <form action="index.php?ctrl=warehouse/Add&act=add&id=<?php echo $dataOne['id'] ?>" method="post">

                    <span>Mã sản phẩm</span>
                    <select name="M_sp" class="form-control" onchange="location = this.value;">
                    <option value=""></option>
                        <?php foreach ($data as $value) { ?> 
                        <option 
                        value="index.php?ctrl=warehouse/Add&act=select&id=<?php echo $value['id'] ?>"  
                            <?php echo isset($_GET['id']) ? $_GET['id']== $value['id'] ? 'selected="selected"' :'' : '' ?> 
                        >
                            <?php echo $value['Ma_SP']." - ".$value['Loai'] ?>
                        </option>
                        <?php } ?>
                    </select>


                    <span>Màu sắc</span>
                    <select name="Mau" class="form-control">
                    <option value=""></option>
                        <?php foreach ($d_mau_sac as $mau) { ?>
                            <option value="<?php echo $mau['Ma_Mau'] ?>">
                                <?php echo $mau['Ten_Mau'] ?>
                            </option>
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