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
    <div class="col-md-8">
    
        <div class="panel panel-primary">
            <div class="panel-heading">Danh sách tài khoản</div>
            <Div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td width="40px">STT</td>
                        <td width="150px">Tên tài khoản</td>
                        <td>Mật khẩu</td>
                        <td>Level</td>
                        <td width="90px"></td>
                        <td width="110px"></td>
                    </tr>
                    <?php
                        $stt=0;
                        foreach ($data as $value) { 
                            $stt++;
                    ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $stt ?></td>
                        <td><?php echo $value['UserName'] ?></td>
                        <td><?php echo $value['Password'] ?></td>
                        <td><?php echo $value['id_positon'] ?></td>
                        <td>
                            <a href="index.php?ctrl=users/Info&act=info&id=<?php echo $value['id'] ?>" class="btn btn-sm btn-primary">Thông tin</a>
                        </td>
                        <td>
                            <a href="index.php?ctrl=users/Account&act=edit&id=<?php echo $value['id'] ?>" class="btn btn-success btn-sm">Sửa</a>
                            <a href="index.php?ctrl=users/Account&act=delete&id=<?php echo $value['id'] ?>" class="btn btn-sm btn-warning">Xoá</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </Div>
        </div>
        
        
    </div>
    
    <!-- add Account -->
    <div class="col-md-4">

        <?php if (isset($_GET['act']) && $_GET['act']=="edit") { ?>
            <div class="panel panel-primary">
                <div class="panel-heading">Sửa tài khoản</div>
                <div class="panel-body">
                    <form action="index.php?ctrl=users/Account&act=do_edit&id=<?php echo $record['id'] ?>" method="post">
                        <input type="text" minlength="6" name="UserName" value="<?php echo $record['UserName'] ?>" require pattern="[a-z]{5-15}]" class="form-control">
                        <input type="text" minlength="6" name="Password" value="<?php echo $record['Password'] ?>" require pattern="[a-z]{5-15}]" class="form-control" style="margin-top:10px;">
                        <select name="id_positon" class="form-control" style="margin-top:10px;">
                            <?php foreach ($user_position as  $val) { ?>
                                <option value="<?php echo $val['id'] ?>" <?php echo $val['id'] == $record['id_positon'] ? ' selected="selected"': '' ?> ><?php echo $val['Ghi_Chu'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="submit" value="Sửa" class="btn btn-primary" style="margin-top:10px;">                        
                        <a  href="index.php?ctrl=users/Account"  class="btn btn-primary" style="margin-top:10px;">Thoát</a>
                    </form>
                </div>
            </div>    
        <?php } ?>
       
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm tài khoản</div>
            <div class="panel-body">
                <form action="index.php?ctrl=users/Account&act=add" onchange="onFormUpdate()" method="post">
                    <?php if (isset($thong_bao)) {?>
                        <Span style="color:red;"><?php echo($thong_bao); ?></Span> 
                    <?php } ?>
                    <input type="text" minlength="6" name="UserName" placeholder="Tên tài khoản" require pattern="[a-z]{5-15}" id="UserName" class="form-control">
                    <input type="password" minlength="6" name="Password" placeholder="Mật khẩu" require pattern="[a-z]{5-15}" id="Password" class="form-control" style="margin-top:10px;">
                    <input type="password" minlength="6" name="re_Password" placeholder="Nhập lại mật khẩu" require pattern="[a-z]{5-15}" id="re_Password" class="form-control" style="margin-top:10px;">
                    <select name="id_positon" class="form-control" style="margin-top:10px;">
                        <?php foreach ($user_position as  $vall) { ?>
                            <option value="<?php echo $vall['id'] ?>"><?php echo $vall['Ghi_Chu'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" id="Them" value="Thêm" disabled class="btn btn-primary" style="margin-top:10px;">
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(() => {
            $("input[type=text]").keyup(onFormUpdate);
            $("input[type=password]").keyup(onFormUpdate);
            $("input[type=password]").change(onFormUpdate);
        })

        function onFormUpdate() {
            const registerUsername = $("#UserName").val();
            const registerPassword = $("#Password").val();
            const acceptedTnC = $("#re_Password").val();

            if (registerUsername && registerPassword && acceptedTnC) {
                $("#Them").removeAttr("disabled");
            } else {
                $("#Them").attr("disabled", "disabled");
            }
        }

    </script>
</div>