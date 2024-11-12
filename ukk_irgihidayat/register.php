<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"> <!-- Link bootstrap dari assets -->

    <style>
        /* Mengatur margin dan padding untuk memastikan halaman memenuhi layar */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow-x: hidden; /* Menyembunyikan horizontal scrollbar */
        }

        /* Background untuk navbar, body, dan footer */
        .login-background {
            background-image: url('assets/img/240009683-alam.jpg'); /* Path gambar background */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        /* Navbar dengan gambar latar belakang */
        .navbar {
            background-image: url('assets/img/240009683-alam.jpg'); /* Gambar background navbar */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            z-index: 1;
        }

        .navbar .navbar-nav .nav-link {
            color: white; /* Warna teks navbar */
        }

        .navbar-nav .nav-link:hover {
            color: #ffb74d; /* Warna hover link navbar */
        }

        /* Styling untuk card dan form register */
        .card {
            border-radius: 15px;
            display: flex;
            flex-wrap: wrap;
            overflow: hidden; /* Agar gambar tidak keluar dari card */
        }

        .card-body {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Memberikan background putih transparan agar form lebih jelas */
            border-radius: 15px;
        }

        /* Styling untuk form login dan register agar tetap rapi */
        .form-control {
            border-radius: 20px;
        }

        .btn {
            border-radius: 10px;
        }

        /* Styling tombol DAFTAR */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* Styling untuk judul */
        .text-center h5 {
            color: #333;
            margin-bottom: 20px; /* Memberikan jarak lebih antara judul dan form */
        }

        /* Styling untuk teks */
        p {
            color: #333;
        }

        a {
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Menambahkan margin-top pada form register agar tidak terlalu dekat dengan navbar */
        .form-register-container {
            margin-top: 80px; /* Menambah jarak antara form dan navbar */
        }

        /* Responsif untuk form di layar kecil */
        @media (max-width: 768px) {
            .card-body {
                padding: 15px;
            }
        }

    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- <a class="navbar-brand text-white" href=""><strong>THE GALLERIES</strong></a> -->
            <a href="about.php" class="btn btn-outline-primary m-1"><strong>Tentang Kami</strong></a>
      <!-- <img src="assets/img/selfijpg.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
      <strong class="text-white">THE GALLERIES</strong>
    </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto"></div>
                <a href="index.php" class="btn btn-outline-primary m-1"><strong>Home</strong></a>
                <a href="syarat.php" class="btn btn-outline-primary m-2"><strong>Syarat & Ketentuan</strong></a>
                <a href="about.php" class="btn btn-outline-primary m-1"><strong>Tentang Kami</strong></a>
                <a href="register.php" class="btn btn-outline-primary m-1"><strong>Daftar</strong></a>
                <a href="login.php" class="btn btn-outline-dark m-2"><strong>Masuk</strong></a>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- FORM REGISTER -->
    <div class="login-background form-register-container">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <h5><strong>Daftar Akun Baru</strong></h5>
                            </div>
                            <form action="config/aksi_register.php" method="POST">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required>

                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>

                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>

                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="namalengkap" class="form-control" required>

                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" required>

                                <div class="d-grid mt-2">
                                    <button class="btn btn-primary" type="submit" name="kirim">DAFTAR</button>
                                </div>
                            </form>
                            <p><strong>Klik (Login Disini!) Jika Belum Daftar</strong> <a href="login.php"><strong>Login Disini!</strong></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FORM REGISTER END -->

    <!-- FOOTER -->
    <footer class="bg-light text-center p-3">
        <p>&copy; 2024 THE GALLERIES | Hak Cipta</p>
    </footer>
    <!-- FOOTER END -->

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script> <!-- Link javascript dari assets -->
</body>
</html>
