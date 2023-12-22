<?php
// koneksi database
$server = "localhost";
$user = "root";
$password = "";
$database = "simpelbang";

// buat koneksi
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- {{-- Font Awesome --}} -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- {{-- Font Montserrat --}} -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;800&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Simpelbang</title>
</head>

<body>
    <header>
        <?php
        include "partials/navbar.php";
        ?>
        <div class="hero" id="home">
            <div class="containers">
                <div class="box-hero">
                    <div class="box">
                        <h1>Selamat Datang di Aplikasi</h1>
                        <h1>SIMPELBANG Kota Cirebon</h1>
                        <p class="mt-3">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, in? Eum vel numquam sapiente quas.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                        </p>
                    </div>
                    <div class="box">
                        <img src="assets/img/logope.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <hr class="custom mb-5">
        <div class="step" id="step">
            <div class="box-step">
                <div class="containers">
                    <div class="logo">
                        <img src="assets/img/bbook.png" alt="" class="logo">
                        <h1><b>Panduan Penggunaan Aplikasi</b></h1>
                        <img src="assets/img/bbook.png" alt="" class="logo">
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="panduan-card">
                            <div class="d-flex justify-content-center">
                                <img src="assets/img/panduan.png" class="mt-2" alt="...">
                            </div>
                            <?php
                            $tampil = mysqli_query($koneksi, "SELECT * FROM panduan order by id asc limit 1");
                            while ($data = mysqli_fetch_array($tampil)) :
                            ?>
                                <div class="d-flex justify-content-center card-body">
                                    <?php
                                    // Lokasi penyimpanan file
                                    $lokasi_file = "assets/storage/" . $data['file_panduan']; // Sesuaikan dengan lokasi penyimpanan Anda
                                    ?>
                                    <a href="<?= $lokasi_file; ?>" class="btn btn-primary btn-outline-light border-2 rounded rounded-pill">Baca Panduan Disini</a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="linking" id="linking">
        <div class="box-linking">
            <div class="containers">
                <div class="title">
                    <h1>SIMPEL</h1>
                    <h1>BANG</h1>
                </div>
                <div class="box-card-linking mt-5 mb-5">
                    <div class="d-flex justify-content-center row gap-4">
                        <div class="col-md-3 mb-4">
                            <a href="#">
                                <div class="card">
                                    <div class="linking-card">
                                        <div class="d-flex justify-content-center">
                                            <img src="assets/img/logope.png" class="mt-2" alt="...">
                                        </div>
                                        <div class="d-flex justify-content-center card-body">
                                            <a href="#" class="card-text text-dark">Website</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-4">
                            <a href="#">
                                <div class="card">
                                    <div class="linking-card">
                                        <div class="d-flex justify-content-center">
                                            <img src="assets/img/logope.png" class="mt-2" alt="...">
                                        </div>
                                        <div class="d-flex justify-content-center card-body">
                                            <a href="#" class="card-text text-dark">Website</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-4">
                            <a href="#">
                                <div class="card">
                                    <div class="linking-card">
                                        <div class="d-flex justify-content-center">
                                            <img src="assets/img/logope.png" class="mt-2" alt="...">
                                        </div>
                                        <div class="d-flex justify-content-center card-body">
                                            <a href="#" class="card-text text-dark">Website</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-4">
                            <a href="#">
                                <div class="card">
                                    <div class="linking-card">
                                        <div class="d-flex justify-content-center">
                                            <img src="assets/img/logope.png" class="mt-2" alt="...">
                                        </div>
                                        <div class="d-flex justify-content-center card-body">
                                            <a href="#" class="card-text text-dark">Website</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-4">
                            <a href="#">
                                <div class="card">
                                    <div class="linking-card">
                                        <div class="d-flex justify-content-center">
                                            <img src="assets/img/logope.png" class="mt-2" alt="...">
                                        </div>
                                        <div class="d-flex justify-content-center card-body">
                                            <a href="#" class="card-text text-dark">Website</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-4">
                            <a href="#">
                                <div class="card">
                                    <div class="linking-card">
                                        <div class="d-flex justify-content-center">
                                            <img src="assets/img/logope.png" class="mt-2" alt="...">
                                        </div>
                                        <div class="d-flex justify-content-center card-body">
                                            <a href="#" class="card-text text-dark">Website</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "partials/footer.php";
    ?>

    <script src="assets/js/script.js"></script>
</body>

</html>