<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto</title>

    <!-- Link CSS Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        /* Fullscreen background */
        body {
            background: url('assets/img/shooting-star-2024127_640.webp') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Roboto', sans-serif;
            color: #fff;
            height: 100vh;
            margin: 0;
        }

        /* Navbar Custom */
        .navbar {
            background-color: rgba(0, 0, 0, 0) !important; /* Navbar transparan */
            box-shadow: none; /* Hilangkan bayangan navbar */
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff !important; /* Warna teks putih */
            font-weight: bold;
        }

        .navbar-brand:hover,
        .navbar-nav .nav-link:hover {
            color: # !important; /* Efek hover warna */
        }

        .btn-outline-primary:hover {
            background-color: #;
            color: #fff;
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .card-img-top {
            object-fit: cover;
            height: 200px;
            transition: transform 0.3s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        .card-footer {
            background-color: rgba(0, 0, 0, 0.2);
            color: #fff;
        }

        /* Footer Custom */
        footer {
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 15px 0;
        }

        footer p {
            margin: 0;
            text-align: center;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .card-img-top {
                height: 150px;
            }
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <!-- <img src="assets/img/12-05-54-62_512.webp" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
                <strong>THE GALLERIES</strong>
            </a>
            <div class="d-flex">
                <a href="syarat.php" class="btn btn-outline-primary m-2"><strong>Syarat & Ketentuan</strong></a>
                <a href="about.php" class="btn btn-outline-primary m-2"><strong>Tentang Kami</strong></a>
                <a href="register.php" class="btn btn-outline-primary m-2"><strong>Daftar</strong></a>
                <a href="login.php" class="btn btn-outline-primary m-2"><strong>Masuk</strong></a>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- CARD SECTION -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/img/12-05-54-62_512.webp" class="card-img-top" alt="Foto 1">
                    <!-- <div class="card-footer text-center">
                        <a href="#" class="text-white">10 Suka</a> | <a href="#" class="text-white">3 Komentar</a>
                    </div> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/img/12-05-54-62_512.webp" class="card-img-top" alt="Foto 2">
                    <!-- <div class="card-footer text-center">
                        <a href="#" class="text-white">15 Suka</a> | <a href="#" class="text-white">5 Komentar</a>
                    </div> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/img/12-05-54-62_512.webp" class="card-img-top" alt="Foto 3">
                    <!-- <div class="card-footer text-center">
                        <a href="#" class="text-white">20 Suka</a> | <a href="#" class="text-white">7 Komentar</a>
                    </div> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/img/12-05-54-62_512.webp" class="card-img-top" alt="Foto 3">
                    <!-- <div class="card-footer text-center">
                        <a href="#" class="text-white">20 Suka</a> | <a href="#" class="text-white">7 Komentar</a>
                    </div> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/img/12-05-54-62_512.webp" class="card-img-top" alt="Foto 3">
                    <!-- <div class="card-footer text-center">
                        <a href="#" class="text-white">20 Suka</a> | <a href="#" class="text-white">7 Komentar</a>
                    </div> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/img/12-05-54-62_512.webp" class="card-img-top" alt="Foto 3">
                    <!-- <div class="card-footer text-center">
                        <a href="#" class="text-white">20 Suka</a> | <a href="#" class="text-white">7 Komentar</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- CARD SECTION END -->

    <!-- FOOTER -->
    <!-- <footer>
        <p>&copy; 2024 UKK PPLG | WEBSITE GALERI FOTO | IRGI HIDAYAT</p>
    </footer> -->
    <!-- FOOTER END -->

    <!-- JS Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script> <!-- Use the bundled version for Bootstrap JS -->
</body>

</html>



<!-- tolong percantik lagi perkerenlagi 
 tambahkan fitur/apa saja yang menarik (modifikasi),
  dan ingat jangan merusak fungsi utama ( jangan merusak bagian bagian yang penting yang masi aktif),
   jangan sampai rusak          -->