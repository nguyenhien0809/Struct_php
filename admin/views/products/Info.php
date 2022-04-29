<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Sản Phẩm
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-ellipsis-h"></i> Sản Phẩm/Thông tin sản phẩm
            </li>
        </ol>
    </div>
</div>
<div class="row-10">
    <div class="col-xs">
        <div class="panel panel-primary">
            <select name="san_pham" id="" class="form-control" onchange="location = this.value;">
                <option value=""></option>
                <?php foreach($data as $value) ?>
                <option value="index.php?ctrl=products/Info&act=info&id=<?php echo $value['id'] ?>"  <?php echo isset($_GET['act']) && $_GET['act'] == "info" && $value['id'] == $dataOne['id'] ? 'selected="selected"' : '' ?> > 
                    <?php echo $value['Ten_SP']."-".$value['Loai'] ?> 
                </option>
            </select>
        </div>
    </div>
</div>
<?php if(isset($_GET['act']) && $_GET['act'] == "info"){ ?>
<div class="row">
    <!-- thông tin cơ bản về sản phẩm -->
    <div class="col-xs-12" id="san_p">
        <div class="panel panel-primary">
            <div class="panel-heading">Sản phẩm</div>
            <div class="panel-body">
                <form action="index.php?ctrl=products/Info&act=do_edit&tb=sp&id=<?php echo $dataOne['id'] ?>"  method="post">
                    <div id="form">
                        <p class="alert alert-warning">Có dấu (*) là bắt buộc phải điền!</p>
                        <span>Mã sản phẩm*</span>
                        <input type="text" name="Ma_SP" minlength="3" value="<?php echo $dataOne['Ma_SP'] ?>"  <?php echo isset($_GET['edit']) ? '' : 'disabled="disabled"' ; ?> placeholder="Mã sản phẩm*" require class="form-control" >
                        <span>Tên sản phẩm*</span>
                        <input type="text" name="Ten_SP" minlength="3" value="<?php echo $dataOne['Ten_SP'] ?>"  <?php echo isset($_GET['edit']) ? '' : 'disabled="disabled"' ; ?> placeholder="Tên sản phâm*" require class="form-control" >
                        <span>Danh mục*</span>
                        <select name="Danh_Muc" class="form-control">
                            <option value=""></option>
                            <?php foreach($data_dm as $values) { ?>
                                <option value="<?php echo $values['Ma_DM'] ?>" <?php echo $values['Ma_DM'] == $dataOne['Ma_DM'] ? 'selected="selected"' : '' ?>  <?php echo isset($_GET['edit']) ? '' : 'disabled="disabled"' ; ?> > 
                                    <?php echo $values['Ten_DM'] ?> 
                                </option>
                            <?php } ?>
                        </select>
                        <span>Thương hiệu*</span>
                        <select name="Thuong_Hieu" class="form-control">
                            <option value=""></option>
                            <?php foreach($data_th as $val){ ?>
                                <option value="<?php echo $val['Ma_TH'] ?>" <?php echo $val['Ma_TH'] == $dataOne['Ma_TH'] ? 'selected="selected"' : '' ?> <?php echo isset($_GET['edit']) ? '' : 'disabled="disabled"' ; ?>  > 
                                    <?php echo $val['Ten_TH'] ?> 
                                </option>
                            <?php } ?>
                        </select>
                        <span>Loại</span>
                        <input type="text" name="Loai" value="<?php echo $dataOne['Loai'] ?>" <?php echo isset($_GET['edit']) ? '' : 'disabled="disabled"' ; ?> placeholder="Loại" require class="form-control" >
                        <span>Mô tả</span>
                        <textarea name="Mo_Ta" value="" <?php echo isset($_GET['edit']) ? '' : 'disabled="disabled"' ; ?> require class="form-control" style="width:100%; height:100px;" placeholder="Mô tả"><?php echo $dataOne['Mo_Ta'] ?></textarea>
                        <span>Gía sản phẩm*</span>
                        <input type="number" value="<?php echo $dataOne['Gia'] ?>" name="Gia" <?php echo isset($_GET['edit']) ? '' : 'disabled="disabled"' ; ?> minlength="3" placeholder="Giá sản phẩm*" require class="form-control" style="margin-bottom:10px;">
                        
                        <span >Màu sản phẩm:</span>
                        <?php foreach($dataMau as $mausp){ ?>
                        <div class="row" style="margin-bottom:10px;">
                            <input type="hidden" name="id_Mau[]" value="<?php echo $mausp['id'] ?>" readonly>
                            <div class="col-xs-4">
                                <span>Mã màu</span>
                                <input type="text" name="Ma_Mau[]" value="<?php echo $mausp['Ma_Mau'] ?>" <?php echo isset($_GET['edit']) ? '' : 'disabled="disabled"' ; ?> class="form-control" style="background:<?php echo $mausp['Ma_Mau'] ?>;" >
                            </div>
                            <div class="col-xs-4">
                                <span>Tên màu</span>
                                <input type="text" name="Ten_Mau[]" value="<?php echo $mausp['Ten_Mau'] ?>" <?php echo isset($_GET['edit']) ? '' : 'disabled="disabled"' ; ?> class="form-control">
                            </div>
                            <div class="col-xs-4">
                                <span>Số lượng</span>
                                <input type="number" name="So_Luong[]" value="<?php echo $mausp['So_Luong'] ?>" <?php echo isset($_GET['edit']) ? '' : 'disabled="disabled"' ; ?> class="form-control">
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="index.php?ctrl=products/Info&act=info&id=<?php echo $dataOne['id'] ?>&edit&#san_p" <?php echo isset($_GET['edit'])  ? 'disabled="disabled"' : '' ; ?> class="btn btn-success" style="margin-top:10px;">Sửa</a>
                            <input type="submit" value="Cập nhật" <?php echo isset($_GET['edit']) ? '' : 'disabled="disabled"' ; ?> class="btn btn-primary" style="margin-top:10px;">
                            <a href="index.php?ctrl=products/Info&act=info&id=<?php echo $dataOne['id'] ?>&#san_p" <?php echo isset($_GET['edit']) ? '' : 'disabled="disabled"' ; ?> class="btn btn-warning" style="margin-top:10px;">Hủy</a>  
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ảnh sản phẩm -->
    <div class="col-xs-6" id="a_san_p">
        <div class="panel panel-primary">
            <div class="panel-heading">Ảnh sản phẩm</div>
            <div class="panel-body">
                <form action="index.php?ctrl=products/Info&act=do_edit&tb=asp&id=<?php echo $dataOne['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <span>Ảnh chính</span></br>
                            <img src="../public/Upload/Products/<?php echo $dataOne['Anh'] ?>" alt="ảnh" id="output" class="img-responsive img-thumbnail" width="350px">
                            <input type="file" <?php echo isset($_GET['edit_a']) ? '' : 'disabled="disabled"' ; ?> name="ImageMain" accept="image/*" onchange="loadFile(event)">
                        </div>
                    </div>
                    <div class="row text-center" style="margin-top:15px;">
                        <?php 
                        for ($i=0; $i < 5; $i++) { ?>
                        <div class="col-xs-4" style="margin-top:10px;">
                            <span>Ảnh <?php echo $i ?> </span>
                            <img src="../public/Upload/Products/<?php echo $dataAnh["Anh".$i.""] ?>" class="img-responsive img-thumbnail" alt="ảnh" id="<?php echo "output".$i  ?>" class="img-thumbnail" width="350px">
                            <input type="file" <?php echo isset($_GET['edit_a']) ? '' : 'disabled="disabled"' ; ?> name="Image[]" accept="image/*" onchange="<?php echo "loadFile".$i."(event)" ?>">
                        </div>
                        <?php } ?>
                    </div>
                        
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="index.php?ctrl=products/Info&act=info&id=<?php echo $dataOne['id'] ?>&edit_a&#a_san_p" <?php echo isset($_GET['edit_a'])  ? 'disabled="disabled"' : '' ; ?> class="btn btn-success" style="margin-top:10px;">Sửa</a>
                            <input type="submit" value="Cập nhật" <?php echo isset($_GET['edit_a']) ? '' : 'disabled="disabled"' ; ?> class="btn btn-primary" style="margin-top:10px;">
                            <a href="index.php?ctrl=products/Info&act=info&id=<?php echo $dataOne['id'] ?>&#a_san_p" <?php echo isset($_GET['edit_a']) ? '' : 'disabled="disabled"' ; ?> class="btn btn-warning" style="margin-top:10px;">Hủy</a>  
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- thông số -->
    <div class="col-xs-6" id="ts_san_p">
        <div class="panel panel-primary">
            <div class="panel-heading">Thông số sản phẩm</div>
            <div class="panel-body">
                <form action="index.php?ctrl=products/Info&act=do_edit&tb=tssp&id=<?php echo $dataOne['id'] ?>" method="post">
                    <?php for ($i=0; $i < 8; $i++) { ?>
                        <span>Thông số <?php echo $i ?></span>
                        <input type="text" name="Thong_So[]" value="<?php echo $dataTS["Thong_So".$i] ?>"  <?php echo isset($_GET['edit_ts']) ? '' : 'disabled="disabled"' ; ?> minlength="3" require class="form-control">
                    <?php } ?>

                    <div class="row">
                        <div class="col-xs-6">
                            <a href="index.php?ctrl=products/Info&act=info&id=<?php echo $dataOne['id'] ?>&edit_ts&#ts_san_p" <?php echo isset($_GET['edit_ts'])  ? 'disabled="disabled"' : '' ; ?> class="btn btn-success" style="margin-top:10px;">Sửa</a>
                            <input type="submit" value="Cập nhật" <?php echo isset($_GET['edit_ts']) ? '' : 'disabled="disabled"' ; ?> class="btn btn-primary" style="margin-top:10px;">
                            <a href="index.php?ctrl=products/Info&act=info&id=<?php echo $dataOne['id'] ?>&#ts_san_p" <?php echo isset($_GET['edit_ts']) ? '' : 'disabled="disabled"' ; ?> class="btn btn-warning" style="margin-top:10px;">Hủy</a>  
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
<?php } ?>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };   

        var loadFile0 = function(event) {
            var output0 = document.getElementById('output0');
            output0.src = URL.createObjectURL(event.target.files[0]);
        }; 

        var loadFile1 = function(event) {
            var output1 = document.getElementById('output1');
            output1.src = URL.createObjectURL(event.target.files[0]);
        }; 

        var loadFile2 = function(event) {

            var output2 = document.getElementById('output2');
            output2.src = URL.createObjectURL(event.target.files[0]);
        }; 

        var loadFile3 = function(event) {
            var output3 = document.getElementById('output3');
            output3.src = URL.createObjectURL(event.target.files[0]);
        }; 

        var loadFile4 = function(event) {
            var output4 = document.getElementById('output4');
            output4.src = URL.createObjectURL(event.target.files[0]);
        }; 
        
        function myFunction() {
            for(var i = 0; i < document.getElementById("nb_mau").value; i++){

                var a = document.createElement("SPAN");
                var t = document.createTextNode("Màu "+ i);
                a.appendChild(t);
                document.getElementById("form").appendChild(a);

                var x = document.createElement("INPUT");
                x.setAttribute("type", "text");
                x.setAttribute("placeholder", "Mã màu");
                x.setAttribute("name","Ma_Mau[]");
                x.setAttribute("class","form-control");
                document.getElementById("form").appendChild(x); 

                var y = document.createElement("INPUT");
                y.setAttribute("type", "text");
                y.setAttribute("placeholder", "Tên Màu");
                y.setAttribute("name","Ten_Mau[]");
                y.setAttribute("class","form-control");
                document.getElementById("form").appendChild(y); 
            }
        }
    </script>
</div>