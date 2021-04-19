<?php
session_start();
include("koneksi.php");             
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IPS - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">IPS - Interface Panel Surya</h1>
                            </div>
                            <hr>
                            <p> IPS atau INTERFACE PANEL SURYA adalah aplikasi berbasis web untuk
                                memonitoring tegangan, kuat arus, dan daya dari suatu panel surya
                                secara realtime dan tersimpan di database.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="inputNama"placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="inputTlpn"placeholder="Nomor Telepon" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="inputMac"placeholder="Mac Address (pastikan sesuai diperangkat)" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="inputEmail"
                                        placeholder="Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            name="inputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="RepeatPassword" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block" name="daftar">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <<?php
    //jika tombol register ditekan
    if (isset($_POST["daftar"])) 
    {
        //mengambil isian nama, tlpn, mac, email, pass, confirpass
        $nama = $_POST["inputNama"];
        $telepon = $_POST["inputTlpn"];
        $mac = $_POST["inputMac"];
        $email = $_POST["inputEmail"];
        $password = $_POST["inputPassword"];
        $confirpass = $_POST["RepeatPassword"];

        //cek email dan mac
        $ambilEM = $links->query("SELECT * FROM pelanggan WHERE email_pel='$email' OR mac_address='$mac'");
        $ambilEM1 = $links->query("SELECT * FROM pelanggan WHERE email_pel='$email' AND mac_address='$mac'");
        $yangcocok = $ambilEM->num_rows;
        $yangcocok1 = $ambilEM1->num_rows;
        if ($yangcocok==1 || $yangcocok1==1) {
            echo "<script>alert('Pendaftaran gagal, email atau MAC Address sudah digunakan');</script>";
            echo "<script>location='register.php'</script>";
        }
        else {

            //cek password 6 digit
            if(strlen($password) <= 5){
                echo "<script>alert('Password kurang dari 6 digit');history.go(-1)</script>";
            }else{
                // cek konfirmasi password sama atau tidak
                if($password != $confirpass){
                    echo "<script>alert('Password yang anda masukkan tidak sama'); history.go(-1)</script>";
                }
                else
                {
                    //query insert ke tabel pelanggan
                    $links->query("INSERT INTO pelanggan (email_pel, password_pel, mac_address, nama_pel, nomor_hp) VALUES ('$email','$password','$mac','$nama','$telepon')");
                    echo "<script>alert('Pendaftaran berhasil, silakan Login.');</script>";
                    echo "<script>location='login.php'</script>";
                }
            }
        }

    } 
     ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>