<?php
// koneksi database
$server = "localhost";
$user = "root";
$password = "";
$database = "simpelbang";

// buat koneksi
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

// ...
if (isset($_POST['bsimpan'])) {
    $nama_file = $_FILES['file_panduan']['name'];
    $ukuran_file = $_FILES['file_panduan']['size'];
    $tipe_file = $_FILES['file_panduan']['type'];
    $tmp_file = $_FILES['file_panduan']['tmp_name'];

    // tentukan lokasi penyimpanan file
    $lokasi = "assets/storage/$nama_file"; // ganti dengan lokasi yang diinginkan

    // periksa tipe file yang diizinkan
    $tipe_diperbolehkan = array('pdf');
    $ekstensi = explode('.', $nama_file);
    $ekstensi = strtolower(end($ekstensi));

    if (in_array($ekstensi, $tipe_diperbolehkan) === true) {
        if ($ukuran_file < 50000000) { // batasan ukuran file
            if (move_uploaded_file($tmp_file, $lokasi)) {
                // Simpan data ke database
                $simpan = mysqli_query($koneksi, "INSERT INTO panduan (file_panduan) VALUES ('$nama_file')");

                if ($simpan) {
                    echo "<script>alert('Berhasil Menyimpan Panduan'); document.location='crud_panduan.php';</script>";
                } else {
                    echo "<script>alert('Gagal Menyimpan Panduan'); document.location='crud_panduan.php';</script>";
                }
            } else {
                echo "<script>alert('Gagal Upload File'); document.location='crud_panduan.php';</script>";
            }
        } else {
            echo "<script>alert('Ukuran file terlalu besar'); document.location='crud_panduan.php';</script>";
        }
    } else {
        echo "<script>alert('Tipe file tidak diizinkan'); document.location='crud_panduan.php';</script>";
    }
}
// hapus
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "hapus") {
        $hapus = mysqli_query($koneksi, "DELETE FROM panduan WHERE id = '$_GET[id]' ");

        if ($hapus) {
            echo "<script> alert('Berhasil Menghapus Panduan');
            document.location='crud_panduan.php';
            </script> ";
        } else {
            echo "<script> alert('Gagal Menghapus Panduan');
            document.location='crud_panduan.php';
            </script> ";
        }
    }
}

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

    <title> Simpelbang | Penyimpanan Panduan</title>
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="row mt-4">
            <div class="col-md-15">
                <div class="card card-primary">
                    <div class="card-header text-center" style="border-radius:10px 10px 0px 0px; background-color: #1C3F94;">
                        <h3 class="card-title text-white">Panduan Penggunaan Aplikasi</h3>
                    </div>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="name">Panduan</label>
                                <p class="text-primary">Format panduan harus : pdf</p>
                                <?php
                                // Check apakah ada data dalam tabel
                                $result = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM panduan");
                                $row = mysqli_fetch_assoc($result);
                                $total_data = $row['total'];

                                if ($total_data == 0) {
                                ?>
                                    <input type="file" class="form-control" id="file_panduan" name="file_panduan" value="" placeholder="enter">

                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="card-footer" style="border-radius:0px 0px 10px 10px; background-color: #1C3F94;">
                            <?php
                            // Check apakah ada data dalam tabel
                            $result = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM panduan");
                            $row = mysqli_fetch_assoc($result);
                            $total_data = $row['total'];

                            if ($total_data == 0) {
                            ?>
                                <button type="submit" name="bsimpan" class="btn btn-primary btn-footer">Add</button>
                            <?php
                            }
                            ?>
                            <a href="landing.php#home" class="btn btn-light btn-footer">Home Page</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <div class="d-flex justify-content-center">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="text-light" style="background-color: #1C3F94;">
                        <th>
                            <center>Nama File Panduan</center>
                        </th>
                        <th>
                            <center>File Panduan</center>
                        </th>
                        <th>
                            <center>Action</center>
                        </th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM panduan order by id asc");
                    $total_rows = mysqli_num_rows($tampil);

                    if ($total_rows === 0) {
                        echo '<tr><td colspan="3"><center>Tidak ada File Panduan</center></td></tr>';
                    } else {
                        while ($data = mysqli_fetch_array($tampil)) :
                    ?>
                            <tr>
                                <td><?= $data['file_panduan'] ?></td>
                                <td>
                                    <?php
                                    $lokasi_file = "assets/storage/" . $data['file_panduan'];
                                    ?>
                                    <a href="<?= $lokasi_file ?>" class="btn btn-primary f-12" target="_blank">
                                        <i class="fa-regular fa-eye"></i>
                                        Baca Panduan
                                    </a>
                                </td>
                                <td>
                                    <a href="crud_panduan.php?hal=hapus&id=<?= $data['id'] ?>" class="btn btn-danger f-12" onclick="return confirm('Apakah Anda yakin ingin menghapus? ')">
                                        <i class="far fa-trash-alt"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                    <?php
                        endwhile;
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>
</body>

</html>