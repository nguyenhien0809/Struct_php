<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Người dùng
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i> Người dùng/Chức vụ
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xs-8">
    
        <div class="panel panel-primary">
            <div class="panel-heading">Danh sách chức vụ</div>
            <Div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td width="40px">STT</td>
                        <td width="150px">Level</td>
                        <td>Công việc</td>
                        <td width="110px"></td>
                    </tr>
                    <?php
                        $stt=0;
                        foreach ($data as $value) { 
                            $stt++;
                    ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $stt ?></td>
                        <td><?php echo $value['Level'] ?></td>
                        <td><?php echo $value['Ghi_Chu'] ?></td>
                        <td>
                            <a href="index.php?ctrl=users/Position&act=edit&id=<?php echo $value['id'] ?>" class="btn btn-success btn-sm">Sửa</a>
                            <a href="index.php?ctrl=users/Position&act=delete&id=<?php echo $value['id'] ?>" class="btn btn-sm btn-warning">Xoá</a>
                        
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </Div>
        </div>

    </div>
    <!-- add Position -->
    <div class="col-xs-4">

        <?php if (isset($_GET['act']) && $_GET['act']=="edit") { ?>
            <div class="panel panel-primary">
                <div class="panel-heading">Sửa chức vụ</div>
                <div class="panel-body">
                    <form action="index.php?ctrl=users/Position&act=do_edit&id=<?php echo $record['id'] ?>" method="post">
                        <input type="text" name="position" value="<?php echo $record['Level'] ?>" require class="form-control">
                        <textarea name="describe" require class="form-control" style="width:100%; margin:10px 0; height:100px;" ><?php echo $record['Ghi_Chu'] ?></textarea>
                        <input type="submit" value="Sửa" class="btn btn-primary" style="margin-top:10px;">                        
                        <a  href="index.php?ctrl=users/Position"  class="btn btn-primary" style="margin-top:10px;">Thoát</a>
                    </form>
                </div>
            </div>    
        <?php } ?>
       
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm chức vụ</div>
            <div class="panel-body">
                <form action="index.php?ctrl=users/Position&act=add" method="post">
                    <input type="text" name="position" placeholder="Tên chức vụ" require class="form-control">
                    <textarea name="describe" require class="form-control" style="width:100%; margin:10px 0; height:100px;" placeholder="Mô tả nhiệm vụ"></textarea>
                    <input type="submit" value="Thêm" class="btn btn-primary" style="margin-top:10px;">
                </form>
            </div>
        </div>
    </div>
</div>