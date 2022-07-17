<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Danh mục
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-bookmark"></i> Danh mục/Danh mục
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-8">
    
        <div class="panel panel-primary">
            <div class="panel-heading">Danh sách danh mục</div>
            <Div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td width="40px">STT</td>
                        <td >Mã danh mục</td>
                        <td>Tên danh mục</td>
                        <td width="110px"></td>
                    </tr>
                    <?php
                        $stt=0;
                        foreach ($data as $value) { 
                            $stt++;
                    ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $stt ?></td>
                        <td><?php echo $value['ma_dm'] ?></td>
                        <td><?php echo $value['ten_dm'] ?></td>
                        <td>
                            <a href="index.php?ctrl=categorys/category&act=edit&id=<?= $value['id'] ?>" class="btn btn-success btn-sm">Sửa</a>
                            <a href="index.php?ctrl=categorys/category&act=delete&id=<?= $value['id'] ?>" class="btn btn-sm btn-warning">Xoá</a>
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
                <div class="panel-heading">Sửa danh mục</div>
                <div class="panel-body">
                    <form action="index.php?ctrl=categorys/category&act=do_edit&id=<?= $record['id'] ?>" method="post">
                        <input type="text" name="ma_dm" value="<?= $record['ma_dm'] ?>" required minlength="2" class="form-control">
                        <input type="text" name="ten_dm" value="<?= $record['ten_dm'] ?>" required minlength="3" class="form-control" style="margin-top:10px;">
                        <input type="submit" value="Sửa" class="btn btn-primary" style="margin-top:10px;">                        
                        <a  href="index.php?ctrl=categorys/category"  class="btn btn-primary" style="margin-top:10px;">Thoát</a>
                    </form>
                </div>
            </div>    
        <?php } ?>
       
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm danh mục</div>
            <div class="panel-body">
                <form action="index.php?ctrl=categorys/category&act=add" method="post">
                    <?php if (isset($thong_bao)) {?>
                        <Span style="color:red;"><?php echo($thong_bao); ?></Span> 
                    <?php } ?>
                    <input type="text" name="ma_dm" placeholder="Mã danh mục" required id="UserName" class="form-control">
                    <input type="text" name="ten_dm" placeholder="Tên danh mục" required id="Password" class="form-control" style="margin-top:10px;">
                    <input type="submit" id="Them" value="Thêm" class="btn btn-primary" style="margin-top:10px;">
                </form>
            </div>
        </div>
    </div>
</div>