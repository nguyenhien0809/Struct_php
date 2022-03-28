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
    <div class="col-md-8">
    
        <div class="panel panel-primary">
            <div class="panel-heading">Danh sách thương hiệu</div>
            <Div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td width="40px">STT</td>
                        <td >Mã thương hiệu</td>
                        <td>Tên thương hiệu</td>
                        <td width="110px"></td>
                    </tr>
                    <?php
                        $stt=0;
                        foreach ($data as $value) { 
                            $stt++;
                    ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $stt ?></td>
                        <td><?php echo $value['Ma_TH'] ?></td>
                        <td><?php echo $value['Ten_TH'] ?></td>
                        <td>
                            <a href="index.php?ctrl=categorys/trademark&act=edit&id=<?php echo $value['id'] ?>" class="btn btn-success btn-sm">Sửa</a>
                            <a href="index.php?ctrl=categorys/trademark&act=delete&id=<?php echo $value['id'] ?>" class="btn btn-sm btn-warning">Xoá</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </Div>
        </div>
        
        
    </div>
    
    <!-- add dm -->
    <div class="col-md-4">

        <?php if (isset($_GET['act']) && $_GET['act']=="edit") { ?>
            <div class="panel panel-primary">
                <div class="panel-heading">Sửa danh mục</div>
                <div class="panel-body">
                    <form action="index.php?ctrl=categorys/trademark&act=do_edit&id=<?php echo $record['id'] ?>" method="post">
                        <input type="text" name="Ma_TH" value="<?php echo $record['Ma_TH'] ?>" require class="form-control">
                        <input type="text" name="Ten_TH" value="<?php echo $record['Ten_TH'] ?>" require class="form-control" style="margin-top:10px;">
                        <input type="submit" value="Sửa" class="btn btn-primary" style="margin-top:10px;">                        
                        <a  href="index.php?ctrl=categorys/trademark"  class="btn btn-primary" style="margin-top:10px;">Thoát</a>
                    </form>
                </div>
            </div>    
        <?php } ?>
       
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm danh mục</div>
            <div class="panel-body">
                <form action="index.php?ctrl=categorys/trademark&act=add" method="post">
                    <?php if (isset($thong_bao)) {?>
                        <Span style="color:red;"><?php echo($thong_bao); ?></Span> 
                    <?php } ?>
                    <input type="text" name="Ma_TH" placeholder="Mã Thương hiệu" require id="UserName" class="form-control">
                    <input type="text" name="Ten_TH" placeholder="Tên thương hiệu" require id="Password" class="form-control" style="margin-top:10px;"> 
                    <input type="submit" id="Them" value="Thêm" class="btn btn-primary" style="margin-top:10px;">
                </form>
            </div>
        </div>
    </div>
</div>