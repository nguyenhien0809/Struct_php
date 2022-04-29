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
    <div class="col-xs-2">
        <select name="" id="" class="form-control" onchange="location = this.value;">
            <option value="index.php?ctrl=users/Info&act=select&sl=25" <?php echo isset($_GET['sl']) && $_GET['sl'] == 25 ? 'selected="selected"' : "" ?> >Hiển thị 25</option>
            <option value="index.php?ctrl=users/Info&act=select&sl=50" <?php echo isset($_GET['sl']) && $_GET['sl'] == 50 ? 'selected="selected"' : "" ?> >Hiển thị 50</option>
            <option value="index.php?ctrl=users/Info&act=select&sl=100" <?php echo isset($_GET['sl']) && $_GET['sl'] == 100 ? 'selected="selected"' : "" ?> >Hiển thị 100</option>
        </select>
    </div>
    <div class="col-xs-6"></div>
    <div class="col-xs-4">
        <form action="index.php?ctrl=users/Info&act=search" style="margin-bottom:10px;" method="post">
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
<?php if (!isset($_GET['act']) || $_GET['act']!="info") { ?>
    <div class="col-xs">
    
        <div class="panel panel-primary">
                <div class="panel-heading">Thông tin tài khoản</div>
                <Div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                        <td width="40px">STT</td>
                            <td width="40px">Ảnh</td>
                            <td width="40px">Tên tài khoản</td>
                            <td>Họ và tên</td>
                            <td>Giới tính</td>
                            <td>Ngày Sinh</td>
                            <td>Số ĐT</td>
                            <td>Email</td>
                            <td>Địa chỉ</td>
                            <td width="55px"></td>
                        </tr>
                        <?php
                            $stt=0;
                            foreach ($data as $value) { 
                                $stt++;
                                $record = $this->Model->fetchOne("select * from user where id='".$value['id_User']."'");
                        ?>
                        <tr>
                            <td width="40px"><?php echo $stt ?></td>
                            <td><img src="../public/Upload/Avatar/<?php echo $value['Anh'] ?>" class="img-responsive" alt="avt" width="100px"></td>
                            <td><?php echo $record['UserName'] ?></td>
                            <td><?php echo $value['Ho_Ten'] ?></td>
                            <td><?php echo $value['Gioi_Tinh']==0? 'Nam' : ($record['Gioi_Tinh']==1? 'Nữ' : 'Khác') ?></td>
                            <td><?php echo $value['Nam_Sinh'] ?></td>
                            <td><?php echo $value['Sdt'] ?></td>
                            <td><?php echo $value['Email'] ?></td>
                            <td><?php echo $value['Dia_Chi'] ?></td>
                            <td>
                                <a href="index.php?ctrl=users/Info&act=edit&id=<?php echo $value['id_User'] ?>" class="btn btn-success btn-sm">Sửa</a>
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
        <div class="col-xs">
            <div class="panel panel-primary">
                <div class="panel-heading">Thông tin tài khoản1</div>
                <Div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td width="100px">Ảnh</td>
                            <td>Tên tài khoản</td>
                            <td>Họ và tên</td>
                            <td>Giới tính</td>
                            <td>Ngày Sinh</td>
                            <td>Số ĐT</td>
                            <td>Email</td>
                            <td>Địa chỉ</td>
                            <td width="55px"></td>
                        </tr>
                        <tr>
                            <td><img src="../public/Upload/Avatar/<?php echo $info['Anh'] ?>" class="img-responsive" alt="avt" width="100px"></td>
                            <td><?php echo $UserN['UserName'] ?></td>
                            <td><?php echo $info['Ho_Ten'] ?></td>
                            <td><?php echo $info['Gioi_Tinh']==0? 'Nam' : ($info['Gioi_Tinh']==1? 'Nữ' : 'Khác') ?></td>
                            <td><?php echo $info['Nam_Sinh'] ?></td>
                            <td><?php echo $info['Sdt'] ?></td>
                            <td><?php echo $info['Email'] ?></td>
                            <td><?php echo $info['Dia_Chi'] ?></td>
                            <td>
                                <a href="index.php?ctrl=users/Info&act=edit&id=<?php echo $info['id_User'] ?>" class="btn btn-success btn-sm">Sửa</a>
                            </td>
                        </tr>
                    </table>
                </Div>
            </div>
        </div>
    <?php } ?>
    
    <!-- edit Account -->
    <div class="col-xs-4">
        <?php if (isset($_GET['act']) && $_GET['act']=="edit") { ?>
            <div class="panel panel-primary">
                <div class="panel-heading">Sửa thông tin tài khoản</div>
                <div class="panel-body">
                    <form action="index.php?ctrl=users/Info&act=do_edit&id=<?php echo $recordd['id_User'] ?>" method="post" enctype="multipart/form-data">
                        <img src="../public/Upload/Avatar/<?php echo $recordd['Anh'] ?>" class="img-responsive img-thumbnail" alt="avt" id="output" class="output" width="150px">
                        <input type="file" name="Image" accept="image/*" onchange="loadFile(event)">
                        <span>Tên đăng nhập:</span>
                        <input type="text" name="UserName" value="<?php echo $UserN['UserName'] ?>" placeholder="Tên đăng nhập" readonly class="form-control" style="margin-bottom:10px;">
                        <span>Họ và tên:</span>
                        <input type="text" name="Ho_Ten" value="<?php echo $recordd['Ho_Ten'] ?>" placeholder="Họ và Tên" require class="form-control" style="margin-bottom:10px;">
                        <span>Ngày Sinh</span>
                        <input type="date" name="Ngay_Sinh" value="<?php echo $recordd['Nam_Sinh'] ?>" require class="form-control" style="margin-bottom:10px;">
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