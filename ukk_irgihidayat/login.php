<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"> <!-- Link bootstrap dari assets -->

    <style>
        /* Memastikan background gambar mengisi seluruh layar */
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
}

/* Background untuk halaman login yang mencakup seluruh halaman */
.login-background {
    background-image: url('assets/img/240009683-alam.jpg'); /* Path gambar */
    background-size: cover; /* Membuat gambar memenuhi layar */
    background-position: center; /* Menempatkan gambar di tengah */
    background-attachment: fixed; /* Agar latar belakang tetap saat scroll */
    height: 100%; /* Memastikan gambar mengisi seluruh tinggi layar */
    width: 100%; /* Memastikan gambar mengisi seluruh lebar layar */
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden; /* Menyembunyikan scroll */
    position: absolute;
    top: 0;
    left: 0;
}

/* Memastikan navbar memiliki latar belakang yang mengisi seluruh lebar */
.navbar {
    background-image: url('assets/img/240009683-alam.jpg'); /* Path gambar */
    background-size: cover; /* Membuat gambar memenuhi navbar */
    background-position: center; /* Menempatkan gambar di tengah navbar */
    background-attachment: fixed; /* Agar latar belakang tetap saat scroll */
    position: relative;
    z-index: 1;
}

/* Memastikan navbar tetap di atas form */
.navbar .navbar-toggler-icon,
.navbar .navbar-nav .nav-link {
    color: white; /* Warna teks pada navbar */
}

/* Navbar link hover efek */
.navbar-nav .nav-link:hover {
    color: #ffb74d; /* Warna hover untuk link navbar */
}

/* Styling untuk card body agar bisa menampilkan foto di sebelah kiri */
.card-body {
    display: flex;
    align-items: center;
    padding: 20px;
    border-radius: 15px;
}

/* Gaya untuk foto di sebelah kiri form */
.card-body .image-container {
    flex: 1;
    padding-right: 20px; /* Spasi antara gambar dan form */
}

.card-body img {
    width: 100%;
    height: auto;
    border-radius: 15px; /* Membulatkan sudut gambar agar serasi dengan card */
}

/* Styling untuk form control/input */
.form-control {
    background-color: transparent !important; /* Menghilangkan warna latar belakang input */
    border: 2px solid rgba(0, 0, 0, 0.1); /* Membuat border transparan yang sangat ringan */
    border-radius: 5px; /* Membulatkan sudut input */
    padding: 10px; /* Menambahkan padding agar input lebih enak dilihat */
    transition: border-color 0.3s ease, box-shadow 0.3s ease; /* Transisi pada perubahan border dan shadow */
}

/* Ketika input mendapat fokus */
.form-control:focus {
    outline: none; /* Menghilangkan outline default */
    border-color: rgba(0, 200, 0, 0.5) !important; /* Ganti warna border saat fokus dengan transparansi */
    box-shadow: 0 0 5px rgba(0, 200, 0, 0.3); /* Efek glow pada border saat fokus */
}

/* Styling tombol login */
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    border-radius: 5px;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

/* Styling judul */
.text-center h5 {
    color: #333; /* Ganti warna teks judul */
}

/* Styling teks */
p {
    color: #333;
}

a {
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}

    </style>

</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container"> <!-- -fluid -->
            <!-- <a class="navbar-brand text-white" href=""><strong>THE GALLERIES</strong></a> -->
            <a href="about.php" class="btn btn-outline-primary m-1"><strong>Tentang Kami</strong></a>
      <!-- <img src="assets/img/selfijpg.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
      <strong class="text-white">THE GALLERIES</strong>
    </a>
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                </div>
                <a href="index.php" class="btn btn-outline-primary m-1"><strong>Home</strong></a>
                <a href="syarat.php" class="btn btn-outline-primary m-2"><strong>Syarat & Ketentuan</strong></a>
                <a href="about.php" class="btn btn-outline-primary m-1"><strong>Tentang Kami</strong></a>
                <a href="register.php" class="btn btn-outline-primary m-1"><strong>Daftar</strong></a>
                <a href="login.php" class="btn btn-outline-dark m-2"><strong>Masuk</strong></a>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- FORM LOGIN -->
    <div class="login-background">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-12 login-card-wrapper"> <!-- Perbesar kolom agar foto lebih terlihat -->
                    <div class="card">
                        <div class="card-body no-background">
                            <div class="row w-100">
                                <!-- Bagian kiri gambar -->
                                <div class="col-md-6 image-container">
                                    <img src="assets/img/03-23-14-985_512.webp" alt="Login Image">
                                </div>

                                <!-- Bagian kanan form -->
                                <div class="col-md-7"><br><br>
                                    <div class="text-center">
                                        <h5><strong>Login Aplikasi</strong></h5>
                                    </div>
                                    <form action="config/aksi_login.php" method="POST">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control custom-border" required>
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control custom-border" required>
                                        <div class="d-grid mt-2">
                                            <button class="btn btn-primary" type="submit" name="kirim">MASUK</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <p><strong>Klik (Daftar Disini!) Jika Belum Daftar</strong> <a href="register.php"><strong>Daftar Disini!</strong></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FORM LOGIN END -->

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script> <!-- Link javascript dari assets -->
</body>
</html>
