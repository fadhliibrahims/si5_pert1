<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
    if( isset($_POST["tambah"]) ) {
        if( tambah($_POST) > 0 ) {
            echo "
                <script>
                    alert('Tambah Data Berhasil');
                    document.location.href = admin.php;
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Tambah Data Gagal');
                    document.location.href = admin.php;
                </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Praktikan</title>
</head>
<body>
    <div class="main">
        <h1>Form Tambah Data Praktikan</h1>
        <form method="post">
            <div class="form-group">
                <label for="nim">NIM : </label>
                <input type="text" class="form-control" id="nim" placeholder="Masukkan NIM" name="nim">
            </div>
            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama">
            </div>
            <button type="submit" class="btn" name="tambah">Tambah</button>
        </form>
        <br>
        <a href="admin.php">Kembali ke Daftar Praktikan</a>
    </div>
</body>
</html>