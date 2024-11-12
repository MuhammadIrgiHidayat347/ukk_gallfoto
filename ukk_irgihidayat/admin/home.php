<?php
session_start();
$userid = $_SESSION['userid'];
if ($_SESSION['status'] != 'login') { 
    echo "<script>
    alert('Anda belum Login!');
    location.href='../index.php';
    </script>";
}

$mysql = mysqli_connect("localhost", "root", "", "ukk_galerifoto");

if (!$mysql) {
    die("Connection failed: " . mysqli_connect_error());
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

    <style>
        /* Background and General Body Style */
        body {
            background-image: url('../assets/img/background.jpg');
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
        }

        /* Navbar Styles */
        .navbar {
            background-color: rgba(255, 255, 255, 0.8);
            border-bottom: 2px solid #ddd;
        }

        .navbar-brand {
            font-weight: bold;
            color: #2c3e50 !important;
        }

        .navbar-nav .btn {
            font-weight: 500;
        }

        .navbar-nav .btn:hover {
            background-color: #007bff;
            color: white;
        }

        /* Card Styling with Hover Effects */
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border: none;
            margin-bottom: 15px;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card img {
            border-radius: 15px;
            transition: transform 0.3s ease;
            object-fit: cover;
        }

        .card img:hover {
            transform: scale(1.1);
        }

        /* Button Category Styling */
        .btn-outline-primary {
            font-weight: bold;
            color: #007bff;
            border-color: #007bff;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
            border-color: #0056b3;
        }

        .btn-outline-primary.active {
            background-color: #0056b3;
            color: white;
        }

        /* Footer Styling */
        footer {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px 0;
            font-size: 14px;
            text-align: center;
            box-shadow: 0 -3px 5px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
            color: #555;
        }

        /* Container for Grid of Photos */
        .container {
            margin-top: 50px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-md-3 {
            padding: 10px;
        }

        /* Responsive Styles for Small Screens */
        @media (max-width: 767px) {
            .navbar {
                font-size: 14px;
            }

            .card {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <img src="../assets/img/selfijpg.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            <!-- <a class="navbar-brand" href="#"><strong>THE GALLERY</strong></a> -->
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

    <div class="container mt-3">
        <!-- Kategori Section -->
        <div>
            <strong>KATEGORI :</strong> 
            <?php 
            $kategori = mysqli_query($mysql, "SELECT * FROM album WHERE userid='$userid'");
            if (mysqli_num_rows($kategori) > 0) {
                while($row = mysqli_fetch_array($kategori)) { ?>
                    <a href="home.php?albumid=<?php echo $row['albumid'] ?>" class="btn btn-outline-primary m-2">
                        <?php echo $row['namaalbum'] ?>
                    </a>
                <?php }
            } else {
                echo "<p class='text-danger'>Kategori ini belum terisi!</p>";
            }
            ?>
        </div>

        <div class="row">
            <!-- Display Photos Based on Category -->
            <?php 
            if (isset($_GET['albumid'])) {
                $albumid = $_GET['albumid'];
                $query = mysqli_query($mysql, "SELECT * FROM foto WHERE userid='$userid' AND albumid='$albumid'");
                while($data = mysqli_fetch_array($query)) { ?>

                <div class="col-md-3 mt-4">
                    <div class="card">
                        <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>" style="height: 12rem;">
                    </div>
                </div>

                <?php } 
            } else { 
                $query = mysqli_query($mysql, "SELECT * FROM foto WHERE userid='$userid'");
                while($data = mysqli_fetch_array($query)) { ?>

                <div class="col-md-3 mt-4">
                    <div class="card">
                        <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>" style="height: 12rem;">
                    </div>
                </div>

                <?php } 
            }
            ?>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2024 The Galleries | Created by IRGI HIDAYAT</p>
    </footer>

    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
