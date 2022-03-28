
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../public/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../public/admin/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../public/admin/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../public/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Dành cho quản trị viên</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">                             
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                        <?php echo isset($_SESSION['account']) ? $_SESSION['name'] : "Admin" ?> 
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">                       
                        <li>
                            <a href="index.php?act=logout"><i class="fa fa-fw fa-power-off"></i>Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-home"></i></i>Trang chủ</a>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i>Thông số</a>
                    </li>
                    <li>
                        <a href="javascript:0;" data-toggle="collapse" data-target="#dm"><i class="fa fa-bookmark"></i> Danh mục <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="dm" class="collapse">
                            <li>
                                <a href="index.php?ctrl=categorys/category">Danh mục</a>
                            </li>
                            <li>
                                <a href="index.php?ctrl=categorys/trademark">Thương hiệu</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:0;" data-toggle="collapse" data-target="#sp"><i class="fa fa-ellipsis-h"></i> Sản phẩm <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="sp" class="collapse">
                            <li>
                                <a href="#">Thêm sản phẩm</a>
                            </li>
                            <li>
                                <a href="#">Danh sách</a>
                            </li>
                            <li>
                                <a href="#">Kho</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:0;" data-toggle="collapse" data-target="#cart"><i class="fa fa-shopping-cart"></i> Giỏ hàng <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="cart" class="collapse">
                            <li>
                                <a href="#">Danh sách đơn hàng</a>
                            </li>
                            <li>
                                <a href="#">Đơn hàng chưa thanh toán</a>
                            </li>
                            <li>
                                <a href="#">Đơn hàng bị trả lại</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:0;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-user"></i> Tài khoản <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="user" class="collapse">
                            <li>
                                <a href="index.php?ctrl=users/Position">Chức vụ</a>
                            </li>
                            <li>
                                <a href="index.php?ctrl=users/Add">Thêm</a>
                            </li>
                            <li>
                                <a href="index.php?ctrl=users/Account">Danh sách</a>
                            </li>
                            <li>
                                <a href="index.php?ctrl=users/Info">Thông tin tài khoản</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-phone"></i>Liên hệ</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <?php if (file_exists($ctrl)){
                    include $ctrl;
                }
                
                ?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>

    <!-- jQuery -->
    <script src="../public/admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../public/admin/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../public/admin/js/plugins/morris/raphael.min.js"></script>
    <script src="../public/admin/js/plugins/morris/morris.min.js"></script>
    <script src="../public/admin/js/plugins/morris/morris-data.js"></script>

</body>

</html>
