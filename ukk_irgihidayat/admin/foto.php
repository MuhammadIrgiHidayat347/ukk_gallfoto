<?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') { // jika session yang didapatkan statusnya tidak sama dengan login
    echo "<script>
    alert('Anda belum Login!');
    location.href='../index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"> <!-- Link bootstrap dari assets -->
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <style>
        /* Background untuk body seluruh halaman */
        body {
            background-image: url('../assets/img/240009683-alam.jpg'); /* Gambar latar belakang */
            background-size: cover; /* Agar gambar menutupi seluruh layar */
            background-position: center; /* Posisi gambar di tengah */
            background-attachment: fixed; /* Agar gambar tetap saat scroll */
            margin: 0;
            padding: 0;
            color: #fff; /* Warna teks agar kontras dengan background */
        }

        /* Transparent Navbar */
        .navbar {
            background-color: rgba(0, 0, 0, 0.7) !important;
            backdrop-filter: blur(5px);
            color: white; /* Teks navbar tetap putih */
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: white !important;
            font-weight: bold;
        }

        .navbar .navbar-toggler-icon {
            background-color: #fff;
        }

        .navbar:hover {
            background-color: rgba(0, 0, 0, 0.9);
        }

        /* Card Styling */
        .card {
            background-color: rgba(0, 0, 0, 0.6); /* Transparansi pada card */
            border-radius: 10px; /* Membuat sudut card lebih halus */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05); /* Efek zoom pada card */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            font-weight: bold;
            text-align: center;
        }

        /* Tabel */
        table {
            color: white;
            border-collapse: collapse;
        }

        th, td {
            text-align: center;
            padding: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        th {
            background-color: rgba(0, 0, 0, 0.7);
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Form Styling */
        .form-label {
            font-weight: bold;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.2) !important;
            color: white;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #007bff;
            background-color: rgba(255, 255, 255, 0.3);
        }

        /* Animasi pada tombol */
        .btn {
            border-radius: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background-color: #007bff;
            color: white;
            transform: scale(1.05);
        }

        .btn-outline-dark {
            color: #fff;
            border-color: #fff;
        }

        .btn-outline-dark:hover {
            background-color: #fff;
            color: #000;
        }

        .btn-outline-danger {
            color: #fff;
            border-color: #dc3545;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }

        /* Modal Styling */
        .modal-content {
            background-color: rgba(0, 0, 0, 0.85);
            border-radius: 10px;
            color: white;
        }

        .modal-dialog {
            max-width: 500px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .card {
                margin-bottom: 15px;
            }

            .col-md-8, .col-md-4 {
                width: 100% !important;
                margin-bottom: 20px;
            }
        }

        /* Footer Styling */
        footer {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- <a class="navbar-brand" href=""><strong>THE GALLERIES</strong></a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                    <a href="index.php" class="btn btn-outline-dark m-1">Like & Komentar</a>
                    <a href="home.php" class="btn btn-outline-dark m-1">Kategori</a>
                    <a href="album.php" class="btn btn-outline-dark m-1">Album</a>
                    <a href="foto.php" class="btn btn-outline-dark m-1">Photo</a>
                </div>
                <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1"><strong>Exit</strong></a>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <div class="container mt-4">
        <div class="row">
            <!-- Data Galeri Foto (Left Side) -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white"><strong>Data Galeri Foto</strong></div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><strong>Nomer</strong></th>
                                    <th><strong>Deskripsi</strong></th>
                                    <th><strong>Judul Foto</strong></th>
                                    <th><strong>Foto</strong></th>
                                    <th><strong>Tanggal</strong></th>
                                    <th><strong>Aksi</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100" alt="Foto"></td>
                                        <td><?php echo $data['deskripsifoto'] ?></td>
                                        <td><?php echo $data['judulfoto'] ?></td>
                                        <td><?php echo $data['tanggalunggah'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['fotoid'] ?>">Edit</button>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="edit<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Foto</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">

                                                                <!-- <label class="form-label">Judul Foto</label>
                                                                <input type="text" name="judulfoto" value="<?php echo $data['judulfoto'] ?>" class="form-control" required> -->

                                                                <label class="form-label">Deskripsi</label>
                                                                <textarea class="form-control" name="deskripsifoto" required><?php echo $data['deskripsifoto']; ?></textarea>

                                                                <label class="form-label">Judul Foto</label>
                                                                <input type="text" name="judulfoto" value="<?php echo $data['judulfoto'] ?>" class="form-control" required>

                                                                <label class="form-label">Album</label>
                                                                <select class="form-control" name="albumid">
                                                                    <?php
                                                                    $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                                                    while ($data_album = mysqli_fetch_array($sql_album)) {
                                                                    ?>
                                                                    <option <?php if ($data_album['albumid'] == $data['albumid']) { ?> selected="selected" <?php } ?> value="<?php echo $data_album['albumid'] ?>"><?php echo $data_album['namaalbum'] ?></option>
                                                                    <?php } ?>
                                                                </select>

                                                                <label class="form-label">Foto</label>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="file" class="form-control" name="lokasifile">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['fotoid'] ?>">Hapus</button>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapus<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered"> <!-- Menambahkan modal-dialog-centered untuk tengah layar -->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/aksi_foto.php" method="POST">
                                                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                                Apakah anda yakin akan menghapus data <strong> <?php echo $data['judulfoto'] ?> </strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="hapus" class="btn btn-danger">Hapus Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Form Input Foto (Right Side) -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white"><strong>Tambah Data Foto</strong></div>
                    <div class="card-body">
                        <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                            <label class="form-label text-white">Judul Foto</label>
                            <input type="text" name="judulfoto" class="form-control" required>

                            <label class="form-label text-white">Deskripsi</label>
                            <textarea class="form-control" name="deskripsifoto" required></textarea>

                            <label class="form-label text-white">Album</label>
                            <select class="form-control" name="albumid" required>
                                <?php
                                $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                while ($data_album = mysqli_fetch_array($sql_album)) {
                                ?>
                                <option value="<?php echo $data_album['albumid'] ?>"><?php echo $data_album['namaalbum'] ?></option>
                                <?php } ?>
                            </select>

                            <label class="form-label">File</label>
                            <input type="file" class="form-control" name="lokasifile" required>

                            <button type="submit" class="btn btn-success mt-2" name="tambah">Unggah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script> <!-- Gunakan bootstrap.bundle.min.js yang sudah termasuk Popper.js -->
</body>

</html>
