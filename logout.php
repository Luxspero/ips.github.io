<<?php 
session_start();

//menghancurkan $_SESSION["pelanggan"]
session_destroy();
echo "<script>alert('Anda telah logout') ;</script>";
        echo "<script>location='login.php';</script>";
 ?>