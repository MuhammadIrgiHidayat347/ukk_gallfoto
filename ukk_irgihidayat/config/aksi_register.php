<?php
include'koneksi.php';

$username = $_POST['username']; //menampung persyaratan register/daftar disini, agar ketika user daftar, data diri user ada di admin, mulai dari username, password, namalengkap, email, alamat dan lainnya
$password = md5($_POST['password']); //ini juga. md5 (enkripsi = mengamankan data), aktivitas mengubah bentuk data yang awalnya mudah dipahami menjadi kode yang sulit dipahami, maka hasil password di database MySql/PhpMyAdminnya akan seperti ini (21232f297a57a5a743894a0e4a801fc)
$email = $_POST['email']; //juga
$namalengkap = $_POST['namalengkap']; //juga
$alamat = $_POST['alamat']; //dan juga 

$sql = mysqli_query($koneksi, "INSERT INTO user VALUES ('','$username','$password','$email','$namalengkap','$alamat')"); //Variabel SQL, ini isian yang pertama memanggil koneksi dari koneksi.php, kemudian diatas tambahkan include'koneksi.php';

if ($sql) {
    echo "<script>
    alert('Pendaftaran akun berhasil')
    location.href='../login.php';
    </script>";
}

?>