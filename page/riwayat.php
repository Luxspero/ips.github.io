<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Riwayat</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Arus, Tegangan, dan Daya Listrik </h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
           <!-- <script>
                 setTimeout('location.href="riwayat.php"' ,30000);
            </script> -->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    	<th>No</th>
                        <th>Kuat Arus(A)</th>
                        <th>Tegangan(V)</th>
                        <th>Daya(W)</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    	<th>No</th>
                        <th>Kuat Arus (A)</th>
                        <th>Tegangan (V)</th>
                        <th>Daya (W)</th>
                        <th>Waktu</th>
                    </tr>
                </tfoot>
                <?php

                  

                    $no=1;
                    $ambildata = mysqli_query($links,"select arus, tegangan, daya, waktu from logdata WHERE mac_address='$_SESSION[mac_address]'");
                    while ($tampil= mysqli_fetch_array($ambildata)) {
                       ?>
                       <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $tampil['arus'] ?></td>
                          <td><?php echo $tampil['tegangan'] ?></td>
                          <td><?php echo $tampil['daya'] ?></td>
                          <td><?php echo $tampil['waktu'] ?></td>
                       </tr>
                    <?php
                    }
                ?>

            </table>
        </div>
    </div>
</div>

</div>

 <!-- Tambahan 
    <script src="vendor/datatables/tambahan/jquery.min.js"></script>
    <script src="vendor/datatables/tambahan/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/tambahan/dataTables.buttons.min.js"></script>
    <script src="vendor/datatables/tambahan/buttons.flash.min.js"></script>
    <script src="vendor/datatables/tambahan/jszip.min.js"></script>
    <script src="vendor/datatables/tambahan/pdfmake.min.js"></script>
    <script src="vendor/datatables/tambahan/vfs_fonts.js"></script>
    <script src="vendor/datatables/tambahan/buttons.html5.min.js"></script>
    <script src="vendor/datatables/tambahan/buttons.print.min.js"></script>

    <script type="text/javascript"> 
    $(document).ready(function () {
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
    </script> -->