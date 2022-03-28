
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Người dùng
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i> Người dùng/Thêm người dùng
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    
        <div class="panel panel-primary">
            <div class="panel-heading">Thông tin</div>
            <Div class="panel-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="file" name="image" class="img" accept="image/*" onchange="loadFile(event)">

                            
                            
                            <!-- disabled="disabled" -->
                            <script>
                                var loadFile = function(event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                };                               
                            </script>
                            
                        </div>
                        <div class="col-md-5" style="width: 41.66666667%;float: right;margin-right: 20px;border: 1px solid;text-align: center;height: 300px;width: 300px;">
                        <img id="output" class="output" width="100%" >
                        </div>
                    </div>

                    <select name="a" class="form-control">
                        <option value="2">1</option>
                        <option value="3" selected>2</option>
                        <option value="4">3</option>
                    </select>
                </form>
                
            </Div>
        </div>
    
