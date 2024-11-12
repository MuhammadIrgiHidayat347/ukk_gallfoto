<?php
session_start();
$userid = $_SESSION['userid'];
if ($_SESSION['status'] != 'login') { 
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>

    <!-- Custom CSS for Background and Design Improvements -->
    <style>
        body {
            background-image: url('../assets/img/background.jpg');
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
        }

        .navbar, footer {
            background-color: rgba(255, 255, 255, 0.9); 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            color: #2c3e50 !important;
        }

        .navbar-nav .btn {
            font-weight: bold;
        }

        .navbar-nav .btn:hover {
            background-color: #007bff;
            color: white;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .card-footer {
            background-color: rgba(255, 255, 255, 0.8);
            border-top: none;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 -3px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-outline-dark {
            color: #333;
            border-color: #333;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-outline-dark:hover {
            background-color: #333;
            color: white;
        }

        .modal-content {
            border-radius: 10px;
            animation: modalFadeIn 0.5s ease-out;
        }

        .modal-header {
            border-bottom: none;
        }

        .sticky-bottom {
            position: sticky;
            bottom: 0;
            background-color: #fff;
            padding: 15px;
            border-top: 1px solid #ccc;
        }

        .input-group input {
            border-radius: 20px 0 0 20px;
        }

        .input-group-prepend button {
            border-radius: 0 20px 20px 0;
        }

        .card-footer .fa-thumbs-up, .card-footer .fa-comments {
            margin: 0 10px;
            font-size: 22px;
            cursor: pointer;
        }

        .card-footer .fa-thumbs-up:hover, .card-footer .fa-comments:hover {
            color: #007bff;
        }

        .sticky-top {
            position: sticky;
            top: 0;
            background-color: #fff;
            z-index: 2;
        }

        /* Scrollable Comment Section */
        .comment-section {
            max-height: 400px;
            overflow-y: auto;
            padding: 10px;
        }

        .comment-section p {
            font-size: 14px;
        }

        .comment-section .user-comment {
            margin-bottom: 10px;
        }

        .comment-section .user-comment strong {
            font-weight: bold;
        }

        /* Emoji Style */
        .emoji-btn {
            font-size: 1.5rem;
            cursor: pointer;
        }

        .emoji-btn:hover {
            color: #007bff;
        }

        /* Modal Fade-in Animation */
        @keyframes modalFadeIn {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Footer Styling */
        footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #555;
            font-size: 14px;
        }

    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <img src="../assets/img/selfijpg.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            <a class="navbar-brand" href=""><strong></strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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

    <div class="container mt-4">
        <div class="row">
            <?php
            $hostname = 'localhost';
            $userdb = 'root';
            $passdb = '';
            $namedb = 'ukk_galerifoto';
            $koneksi = mysqli_connect($hostname, $userdb, $passdb, $namedb);

            $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.userid=user.userid INNER JOIN album ON foto.albumid=album.albumid");
            while($data = mysqli_fetch_array($query)){ 
            ?>
                <div class="col-md-3 mt-4">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid']?>">
                        <div class="card">
                            <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>" style="height: 15rem; object-fit: cover;">
                            <div class="card-footer text-center">
                                <?php 
                                $fotoid = $data['fotoid'];
                                $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                                if (mysqli_num_rows($ceksuka) == 1) { ?>
                                    <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid']?>" class="text-success"><i class="fa fa-thumbs-up"></i></a>
                                <?php } else { ?>
                                    <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid']?>" class="text-muted"><i class="fa-regular fa-thumbs-up"></i></a>
                                <?php }
                                $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                echo mysqli_num_rows($like). ' Suka';
                                ?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid']?>" class="ms-3"><i class="fa-regular fa-comments"></i></a>
                                <?php 
                                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                                echo mysqli_num_rows($jmlkomen).' komentar';
                                ?>
                            </div>
                        </div>
                    </a>

                    <!-- Modal for Comments -->
                    <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="m-2">
                                                <div class="overflow-auto">
                                                    <div class="sticky-top">
                                                        <strong><?php echo $data['judulfoto'] ?></strong><br>
                                                        <span class="badge bg-secondary"><?php echo $data['namalengkap'] ?></span>
                                                        <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>
                                                        <span class="badge bg-primary"><?php echo $data['namaalbum'] ?></span>
                                                    </div>
                                                    <hr>
                                                    <p><?php echo $data['deskripsifoto'] ?></p>
                                                    <hr>
                                                    <div class="comment-section">
                                                        <?php 
                                                        $fotoid = $data['fotoid'];
                                                        $komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                                                        while($row = mysqli_fetch_array($komentar)){
                                                        ?>
                                                        <div class="user-comment">
                                                            <strong><?php echo $row['namalengkap'] ?></strong><br>
                                                            <?php echo $row['isikomentar'] ?>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                    <hr>
                                                    <div class="sticky-bottom">
                                                        <form action="../config/proses_komentar.php" method="POST">
                                                            <div class="input-group">
                                                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                                <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar">
                                                                <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">Kirim</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 The Galleries | Created by IRGI HIDAYAT</p>
    </footer>

    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
