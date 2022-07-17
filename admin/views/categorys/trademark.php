<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Danh mục
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i> Danh mục/Thương hiệu
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-8">
    
        <div class="panel panel-primary">
            <div class="panel-heading">Danh sách thương hiệu</div>
            <Div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td width="40px">STT</td>
                        <td >Mã thương hiệu</td>
                        <td>Tên thương hiệu</td>
                        <td >Danh mục</td>
                        <td width="110px"></td>
                    </tr>
                    <?php
                        $stt=0;
                        foreach ($data as $value) { 
                            $stt++;
                            $dm = $this->Model->fetchOne("select * from danh_muc where id = '".$value['id_dm']."'");
                    ?>
                    <tr>
                        <td style="text-align:center;"><?= $stt ?></td>
                        <td><?= $value['ma_th'] ?></td>
                        <td><?= $value['ten_th'] ?></td>
                        <td><?= $dm['ten_dm'] ?></td>
                        <td>
                            <a href="index.php?ctrl=categorys/trademark&act=edit&id=<?= $value['id'] ?>" class="btn btn-success btn-sm">Sửa</a>
                            <a href="index.php?ctrl=categorys/trademark&act=delete&id=<?= $value['id'] ?>" class="btn btn-sm btn-warning">Xoá</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </Div>
        </div>
        
        
    </div>
    
    <!-- add dm -->
    <div class="col-xs-4">

        <?php if (isset($_GET['act']) && $_GET['act']=="edit") { ?>
            <div class="panel panel-primary">
                <div class="panel-heading">Sửa thương hiệu</div>
                <div class="panel-body">
                    <form action="index.php?ctrl=categorys/trademark&act=do_edit&id=<?= $record['id'] ?>" method="post">
                        <span>Mã thương hiệu</span>
                        <input type="text" name="ma_th" value="<?= $record['ma_th'] ?>" required class="form-control" style="margin-bottom:10px;">
                        <span>Danh mục</span>
                        <select name="danh_muc" id="" required class="form-control" style="margin-bottom:10px;">
                            <?php foreach ($danh_muc as $val_dm){ ?>
                            <option value="<?= $val_dm['id'] ?> >" <?= $record['id'] == $val_dm['id'] ? 'selected' :'' ?> ><?= $val_dm['ten_dm'] ?></option>
                            <?php } ?>
                        </select>
                        <span>Tên thương hiệu</span>
                        <input type="text" name="ten_th" value="<?= $record['ten_th'] ?>" required class="form-control" style="margin-bottom:10px;">
                        <input type="submit" value="Sửa" class="btn btn-primary" style="margin-top:10px;">                        
                        <a  href="index.php?ctrl=categorys/trademark"  class="btn btn-primary" style="margin-top:10px;">Thoát</a>
                    </form>
                </div>
            </div>    
        <?php } ?>
       
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm thương hiệu</div>
            <div class="panel-body">
                <form action="index.php?ctrl=categorys/trademark&act=add" method="post">
                    <?php if (isset($thong_bao)) {?>
                        <Span style="color:red;"><?php echo($thong_bao); ?></Span> 
                    <?php } ?>
                    <span>Mã thương hiệu</span>
                    <input type="text" name="ma_th" placeholder="Mã Thương hiệu" required  class="form-control" style="margin-bottom:10px;">
                    <span>Danh mục</span>
                    <select name="danh_muc" id="" required class="form-control" style="margin-bottom:10px;">
                        <?php foreach ($danh_muc as $val_dm){ ?>
                            <option value="<?= $val_dm['id'] ?> >" ><?= $val_dm['ten_dm'] ?></option>
                        <?php } ?>
                    </select>
                    <span>Tên thương hiệu</span>
                    <input type="text" name="ten_th" placeholder="Tên thương hiệu" required  class="form-control" style="margin-bottom:10px;">
                    <input type="submit" id="Them" value="Thêm" class="btn btn-primary" style="margin-top:10px;">
                </form>
            </div>
        </div>
    </div>
</div>