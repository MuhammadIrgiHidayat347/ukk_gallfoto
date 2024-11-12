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
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <style>
        body {
            background-image: url('../assets/img/240009683-alam.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            color: #fff;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: white;
        }

        .navbar-nav .nav-link:hover {
            color: #ffb74d;
        }

        .container {
            background-color: transparent;
            padding: 20px;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #000;
            color: white;
            font-weight: bold;
            border-top-left-radius: 50%;
            border-top-right-radius: 50%;
            padding: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .btn {
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-primary, .btn-success, .btn-danger {
            margin: 5px;
        }

        .btn-primary:hover, .btn-success:hover, .btn-danger:hover {
            transform: translateY(-2px);
        }

        .form-control, textarea.form-control {
            border-radius: 8px;
            color: white;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            border-radius: 10px;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
        }

        .modal-footer {
            background-color: rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .col-md-8, .col-md-4 {
                width: 100%;
            }
        }
    </style>

</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                    <a href="index.php" class="btn btn-outline-dark m-1">Like & Komentar</a>
                    <a href="home.php" class="btn btn-outline-dark m-1">Kategori</a>
                    <a href="album.php" class="btn btn-outline-dark m-1">Album</a>
                    <a href="foto.php" class="btn btn-outline-dark m-1">Photo</a>
                </div>
                <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1"><strong>EXIT</strong></a>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- CARD -->
    <div class="container">
        <div class="row">
            <!-- CARD 2 (Data Album) -->
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header"><strong>Data Album</strong></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><strong>No</strong></th>
                                    <th><strong>Nama Album</strong></th>
                                    <th><strong>Deskripsi</strong></th>
                                    <th><strong>Tanggal</strong></th>
                                    <th><strong>Aksi</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['namaalbum'] ?></td>
                                        <td><?php echo $data['deskripsi'] ?></td>
                                        <td><?php echo $data['tanggalbuat'] ?></td>
                                        <td>
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#edit<?php echo $data['albumid'] ?>">Edit</button>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?php echo $data['albumid'] ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/aksi_album.php" method="POST">
                                                                <input type="hidden" name="albumid"
                                                                    value="<?php echo $data['albumid'] ?>">
                                                                <label class="form-label">Nama Album</label>
                                                                <input type="text" name="namaalbum" value="<?php echo $data['namaalbum'] ?>" class="form-control" required>
                                                                <label class="form-label">Deskripsi</label>
                                                                <textarea class="form-control" name="deskripsi" required><?php echo $data['deskripsi']; ?></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hapus Button -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapus<?php echo $data['albumid'] ?>">Hapus</button>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapus<?php echo $data['albumid'] ?>" tabindex="-1"
                                                aria-labelledby="hapusLabel<?php echo $data['albumid'] ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="hapusLabel<?php echo $data['albumid'] ?>">Konfirmasi Penghapusan</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah Anda yakin ingin menghapus album <strong><?php echo $data['namaalbum']; ?></strong>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!-- Form penghapusan album -->
                                                            <form action="../config/aksi_album.php" method="POST">
                                                                <input type="hidden" name="albumid" value="<?php echo $data['albumid']; ?>">
                                                                <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
            <!-- CARD 2 END -->

            <!-- CARD 1 (Tambah Data Album) -->
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header"><strong>Tambah Data Album</strong></div>
                    <div class="card-body">
                        <form action="../config/aksi_album.php" method="POST">
                            <label class="form-label text-white">Nama Album</label>
                            <input type="text" name="namaalbum" class="form-control" required>

                            <label class="form-label text-white">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" required></textarea>

                            <button type="submit" class="btn btn-success mt-2" name="tambah">Tambah Album</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- CARD 1 END -->
        </div>
    </div>
    <!-- CARD END -->

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
