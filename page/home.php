<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Beranda</h1>

</div>
<!-- /.container-fluid -->

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">GRAFIK DAYA LISTRIK</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Pilih Grafik:</div>
                        <a class="dropdown-item" href="?pageG=gsekarang">Saat ini</a>
                        <a class="dropdown-item" href="?pageG=gharian">Harian</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href=""></a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">

                <?php
                    if (isset($_GET['pageG'])) {
                        $page = $_GET['pageG'];

                        switch ($page) {
                            case 'gsekarang':
                                include "grafik/sekarang.php";
                                break;
                            case 'gharian':
                                include "grafik/harian.php";
                                break;
                            default:
                                echo "<h6>Maaf tidak ada grafik</h3>";
                                break;
                        }
                    }else {
                        include "grafik/sekarang.php";
                    }

                ?>
                
            </div>
        </div>
    </div>
     <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h6 class="m-0 font-weight-bold text-primary">STATUS</h6>
                        </div>
                        <div class="col-auto">
                            Time Upload :
                            <?php
                                $ambildata1 = mysqli_query($links,"SELECT waktu FROM `logdata` WHERE mac_address='$_SESSION[mac_address]' ORDER BY id DESC LIMIT 0,1");
                                    while ($tampil1= mysqli_fetch_array($ambildata1)) {
                                ?>
                                <?php echo $tampil1['waktu'] ?>
                                <?php
                                    }
                                ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Daya</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $ambildata1 = mysqli_query($links,"SELECT daya FROM `logdata` WHERE mac_address='$_SESSION[mac_address]' ORDER BY id DESC LIMIT 0,1");
                                            while ($tampil1= mysqli_fetch_array($ambildata1)) {
                                            ?>
                                                <?php echo $tampil1['daya'] ?>
                                            <?php
                                        }
                                    ?>
                                    W
                                    <p> </p>
                                </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-bolt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kuat Arus</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $ambildata2 = mysqli_query($links,"SELECT arus FROM `logdata` WHERE mac_address='$_SESSION[mac_address]' ORDER BY id DESC LIMIT 0,1");
                                            while ($tampil2= mysqli_fetch_array($ambildata2)) {
                                            ?>
                                                <?php echo $tampil2['arus'] ?>
                                            <?php
                                        }
                                    ?>
                                    A
                                    <p> </p>
                                </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-bolt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tegangan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $ambildata3 = mysqli_query($links,"SELECT tegangan FROM `logdata` WHERE mac_address='$_SESSION[mac_address]' ORDER BY id DESC LIMIT 0,1");
                                            while ($tampil3= mysqli_fetch_array($ambildata3)) {
                                            ?>
                                                <?php echo $tampil3['tegangan'] ?>
                                            <?php
                                        }
                                    ?>
                                    V
                                    <p> </p>
                                </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-bolt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div> <!-- end content row -->

    <!-- Page level plugins -->
 <script src="vendor/chart.js/Chart.min.js"></script>
 <script src="js/demo/chart-pie-demo.js"></script>
 <script src="js/demo/chart-area-demo.js"></script>