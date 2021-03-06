﻿<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="styles/bootstrap3.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="styles/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="container">
              <div class="row">
                <?php
                    require_once("lib/connection.php");
                        if(isset($_POST["save"])){
                            if (isset($_GET['TenTK'])) {
                                $TenTK = $_GET['TenTK'];
                                var_dump($TenTK);
                                $sql = "UPDATE tai_khoan set MatKhau = '".md5($_POST['MatKhau'])."'  where TenTK = '$TenTK'";
                                var_dump($TenTK);
                                var_dump(md5($_POST['MatKhau']));
                                mysqli_query($conn, $sql);
                                var_dump($sql);
                            }  
                        }
                        if(isset($_POST["del"])){
                            if (isset($_GET['TenTK'])) {
                                $TenTK = $_GET['TenTK'];
                                var_dump($TenTK);
                                $sql = "UPDATE tai_khoan set STT = 0  where TenTK = '$TenTK'";
                                var_dump($TenTK);
                                var_dump(md5($_POST['MatKhau']));
                                mysqli_query($conn, $sql);
                                var_dump($sql);
                            }  
                        }
                    //if (isset($_GET["TenTK"])) {
                        //thực hiện việc lấy thông tin user
                        //$TenTK = $_GET["TenTK"];
                        //var_dump($TenTK);
                        //$sql = "select * from users where TenTK = $TenTK";
                        //$query = mysqli_query($conn, $sql);
                        //while ( $data = mysqli_fetch_array($query) ) {
                            //$TenTK = $data["TenTK"];
                            //$MatKhau = $data["MatKhau"];
                        //}
                    //}
                ?>
                <h3> Thông tin thành viên</h3>
                <form method="POST" name="fr_update">
                    <table class="table">
                      <caption>Danh sách thành viên đã đăng ký</caption>
                        <!--<input type="hidden" name="TenTK" value="<?php echo $TenTK; ?>">-->
                        <tr><td>Họ tên : </td><td><input type="text" name="TenTK" value="<?php echo $TenTK; ?>" /></td></tr>
                        <tr><td>Mật khẩu : </td><td><input type="text" name="MatKhau" value=""/></td></tr>
                        <tr><td colspan="2"><input type="submit" name="save" value="Lưu thông tin"></td></tr>
                        <tr><td colspan="2"><input type="submit" name="del" value="Xóa tài khoản"></td></tr>
                    </table>
                </form>
              </div>
         
            </div><!-- /.container -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap3.min.js"></script>
    
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
