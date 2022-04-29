<!-- Page Heading -->
<div class="row">
    <div class="col-lg">
        <h1 class="page-header">
            Sản Phẩm
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-ellipsis-h"></i> Sản Phẩm/Thêm
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xs">
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm sản phẩm</div>
            <div class="panel-body">
                <form action="index.php?ctrl=products/Add&act=add"  method="post" enctype="multipart/form-data">
                    <div class="col-xs-4" >
                        <img src="" alt="ảnh" id="output" class="img-responsive img-thumbnail" width="350px">
                    </div>
                    <div class="col-xs-8" id="form">
                        <p class="alert alert-warning">Có dấu (*) là bắt buộc phải điền!</p>
                        <input type="file" name="Image" accept="image/*" onchange="loadFile(event)">
                        <input type="text" name="Ma_SP" minlength="3" placeholder="Mã sản phẩm*" require class="form-control" style="margin-top:10px;">
                        <input type="text" name="Ten_SP" minlength="3" placeholder="Tên sản phâm*" require class="form-control" style="margin-top:10px;">
                        <span>Danh mục*</span>
                        <select name="Danh_Muc" class="form-control">
                            <option value=""></option>
                            <?php foreach($data_dm as $values) { ?>
                                <option value="<?php echo $values['Ma_DM'] ?>"> <?php echo $values['Ten_DM'] ?> </option>
                            <?php } ?>
                        </select>
                        <span>Thương hiệu*</span>
                        <select name="Thuong_Hieu" class="form-control">
                            <option value=""></option>
                            <?php foreach($data_th as $val){ ?>
                                <option value="<?php echo $val['Ma_TH'] ?>"> <?php echo $val['Ten_TH'] ?> </option>
                            <?php } ?>
                        </select>
                        <input type="text" name="Loai" placeholder="Loại" require class="form-control" style="margin-top:10px;">
                        <textarea name="Mo_Ta" require class="form-control" style="width:100%; margin:10px 0; height:100px;" placeholder="Mô tả"></textarea>
                        <input type="number" name="Gia" minlength="3" placeholder="Giá sản phẩm*" require class="form-control" style="margin-top:10px;">

                        <div class="input-group" style="margin-top:10px;">
                            <input type="number" class="form-control" id="nb_mau" placeholder="Số màu">
                            <div class="input-group-btn">
                            <a class="btn btn-default" onclick="myFunction()">
                                <i class="fa fa-repeat"></i>
                            </a>
                            </div>
                        </div>

                        
                    </div>
                    <div class="row-6">
                        <input type="submit" value="Thêm" class="btn btn-primary form-control" style="margin-top:10px;">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
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