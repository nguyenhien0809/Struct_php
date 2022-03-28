<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Người dùng
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i> Người dùng/Danh sách
            </li>
        </ol>
    </div>
</div>

<div class="row">
<?php if (!isset($_GET['act']) || $_GET['act']!="info") { ?>
    <div class="col-md-10">
    
        <div class="panel panel-primary">
                <div class="panel-heading">Thông tin tài khoản</div>
                <Div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td width="40px">Ảnh</td>
                            <td width="40px">Tên tài khoản</td>
                            <td>Họ và tên</td>
                            <td>Giới tính</td>
                            <td>Số ĐT</td>
                            <td>Email</td>
                            <td>Địa chỉ</td>
                            <td width="55px"></td>
                        </tr>
                        <?php
                            $stt=0;
                            foreach ($data as $value) { 
                                $stt++;
                                $record = $this->Model->fetchOne("select * from info_user where id='".$value['id']."'");
                        ?>
                        <tr>
                            <td><img src="../public/Upload/Avatar/<?php echo $record['Anh'] ?>" alt="avt" width="100px"></td>
                            <td><?php echo $value['UserName'] ?></td>
                            <td><?php echo $record['Ho_Ten'] ?></td>
                            <td><?php echo $record['Gioi_Tinh']==0? 'Nam' : ($record['Gioi_Tinh']==0? 'Nữ' : 'Khác') ?></td>
                            <td><?php echo $record['Sdt'] ?></td>
                            <td><?php echo $record['Email'] ?></td>
                            <td><?php echo $record['Dia_Chi'] ?></td>
                            <td>
                                <a href="index.php?ctrl=users/Info&act=edit&id=<?php echo $value['id'] ?>" class="btn btn-success btn-sm">Sửa</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </Div>
            </div>
        </div>
        <?php } ?>                            
    <!-- info Account -->
    <?php if (isset($_GET['act']) && $_GET['act']=="info") { ?>
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">Thông tin tài khoản1</div>
                <Div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td width="40px">Ảnh</td>
                            <td width="40px">Tên tài khoản</td>
                            <td>Họ và tên</td>
                            <td>Giới tính</td>
                            <td>Số ĐT</td>
                            <td>Email</td>
                            <td>Địa chỉ</td>
                            <td width="55px"></td>
                        </tr>
                        <tr>
                            <td><img src="../public/Upload/Avatar/<?php echo $info['Anh'] ?>" alt="avt" width="100px"></td>
                            <td><?php echo $UserN['UserName'] ?></td>
                            <td><?php echo $info['Ho_Ten'] ?></td>
                            <td><?php echo $info['Gioi_Tinh']==0? 'Nam' : ($info['Gioi_Tinh']==0? 'Nữ' : 'Khác') ?></td>
                            <td><?php echo $info['Sdt'] ?></td>
                            <td><?php echo $info['Email'] ?></td>
                            <td><?php echo $info['Dia_Chi'] ?></td>
                            <td>
                                <a href="index.php?ctrl=users/Info&act=edit&id=<?php echo $info['id'] ?>" class="btn btn-success btn-sm">Sửa</a>
                            </td>
                        </tr>
                    </table>
                </Div>
            </div>
        </div>
    <?php } ?>
    
    <!-- add Account -->
    <div class="col-md-4">
        <?php if (isset($_GET['act']) && $_GET['act']=="edit") { ?>
            <div class="panel panel-primary">
                <div class="panel-heading">Sửa thông tin tài khoản</div>
                <div class="panel-body">
                    <form action="index.php?ctrl=users/Info&act=do_edit&id=<?php echo $recordd['id'] ?>" method="post" enctype="multipart/form-data">
                        <img src="../public/Upload/Avatar/<?php echo $recordd['Anh'] ?>" alt="avt" id="output" class="output" width="150px">
                        <input type="file" name="Image" accept="image/*" onchange="loadFile(event)">
                        <span>Tên đăng nhập:</span>
                        <input type="text" name="UserName" value="<?php echo $UserN['UserName'] ?>" placeholder="Tên đăng nhập" readonly class="form-control" style="margin-bottom:10px;">
                        <span>Họ và tên:</span>
                        <input type="text" name="Ho_Ten" value="<?php echo $recordd['Ho_Ten'] ?>" placeholder="Họ và Tên" require class="form-control" style="margin-bottom:10px;">
                        <!--  -->
                        <span>Giới tính:</span>
                        <select name="GioiTinh" class="form-control" style="margin-bottom:10px;">
                            <option value="0" <?php echo $recordd['Gioi_Tinh']==0 ? 'selected="selected"' :'' ?> >Nam</option>
                            <option value="1" <?php echo $recordd['Gioi_Tinh']==1 ? 'selected="selected"' :'' ?> >Nữ</option>
                            <option value="2" <?php echo $recordd['Gioi_Tinh']==2 ? 'selected="selected"' :'' ?> >Khác</option>
                        </select>
                        <!--  --> 
                        <span>Số điện thoại:</span>
                        <input type="number" name="Sdt" value="<?php echo $recordd['Sdt'] ?>" placeholder="Số điện thoại" require class="form-control" style="margin-bottom:10px;">
                        <span>Email:</span>
                        <input type="text" name="Email" value="<?php echo $recordd['Email'] ?>" placeholder="Email" require class="form-control" style="margin-bottom:10px;">
                        <span>Địa chỉ:</span>
                        <input type="text" name="Dia_Chi" value="<?php echo $recordd['Dia_Chi'] ?>" placeholder="Địa chỉ" require class="form-control" >
                        <input type="submit" value="Sửa" class="btn btn-primary" style="margin-top:10px;">                        
                        <a  href="index.php?ctrl=users/Info"  class="btn btn-primary" style="margin-top:10px;">Thoát</a>
                    </form>
                </div>
            </div>    
        <?php } ?>
       
        <!-- <div class="panel panel-primary">
            <div class="panel-heading">Thêm tài khoản</div>
            <div class="panel-body">
                <form action="index.php?ctrl=users/Position&act=add" method="post">
                    <input type="text" name="position" placeholder="Tên chức vụ" require class="form-control">
                    <textarea name="describe" require class="form-control" style="width:100%; margin:10px 0; height:100px;" placeholder="Mô tả nhiệm vụ"></textarea>
                    <input type="submit" value="Thêm" class="btn btn-primary" style="margin-top:10px;">
                </form>
            </div>
        </div> -->
    </div>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };                               
    </script>
</div>