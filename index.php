<?php
    session_start();
    include("koneksi.php");             

    //$result= mysqli_query("SELECT * FROM `templog` ORDER BY `timeStamp` DESC",$link);

    //jika belum login, diarahkan untuk login
    if (!isset($_SESSION["pelanggan"])){
        echo "<script>location='login.php';</script>";
    }
?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IPS - Interface Panel Surya</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script type="text/javascript" src="js/demo/chart.js"></script>
    <script type="text/JavaScript">
        function timeRefresh(timeoutPeriod)
        {
            setTimeout("location.reload(true);",timeoutPeriod);
        }
    </script>

</head>

<body id="page-top" onLoad="JavaScript:timeRefresh(30000);">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="img/logoips.png" style="width:50%;">
                </div>
                <div class="sidebar-brand-text mx-3"></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Beranda -->
            <li class="nav-item active">
                <a class="nav-link" href="?page=home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>    
            <!-- Nav Item - Riwayat Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="?page=riwayat">
                    <i class="fas fa-book"></i>
                    <span>Riwayat</span></a> 
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                    	<li> Interface Panel Surya </li>
                    	<div class="topbar-divider d-none d-sm-block"></div>
                    	<li> 
                    		<span id="tanggalwaktu"></span>
                    	</li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li> 
                            <a href="logout.php" class="btn btn-primary btn-user btn-block" name="masuk">Logout</a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <?php 
                	if (isset($_GET['page'])) {
                        $page = $_GET['page'];

                        switch ($page) {
                            case 'home':
                                include "page/home.php";
                                break;
                            case 'riwayat':
                                include "page/riwayat.php";
                                break;
                            default:
                                echo "<h6>Maaf tidak ada grafik</h3>";
                                break;
                        }
                    }else {
                        include "page/home.php";
                    }

                 ?>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; IPS, Informatika 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Tambahan -->
    <script src="vendor/datatables/tambahan/jquery.min.js"></script>
    <script src="vendor/datatables/tambahan/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/tambahan/dataTables.buttons.min.js"></script>
    <script src="vendor/datatables/tambahan/buttons.flash.min.js"></script>
    <script src="vendor/datatables/tambahan/jszip.min.js"></script>
    <script src="vendor/datatables/tambahan/pdfmake.min.js"></script>
    <script src="vendor/datatables/tambahan/vfs_fonts.js"></script>
    <script src="vendor/datatables/tambahan/buttons.html5.min.js"></script>
    <script src="vendor/datatables/tambahan/buttons.print.min.js"></script>
    <script src="js/waktujam.js"></script>



    

    <script type="text/javascript"> 
    $(document).ready(function () {
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
    </script> 



    <!-- Page level custom scripts -->

</body>

</html>