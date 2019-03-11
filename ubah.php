<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
    $id = $_GET["id"];
    $praktikan = query("SELECT * FROM praktikan WHERE id=$id")[0];
    if( isset($_POST["ubah"]) ) {
        if( ubah($_POST, $id) > 0 ) {
            echo "
                <script>
                    alert('Ubah Data Berhasil');
                    document.location.href = admin.php;
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Ubah Data Gagal');
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
    <title>Ubah Data Praktikan</title>
</head>
<body>
    <div class="main">
        <h1>Form Ubah Data Praktikan</h1>
        <form method="post">
            <div class="form-group">
                <label for="nim">NIM : </label>
                <input type="text" class="form-control" id="nim" required value="<?= $praktikan["nim"]; ?>" name="nim">
            </div>
            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" id="nama" required value="<?= $praktikan["nama"]; ?>" name="nama">
            </div>
            <button type="submit" class="btn" name="ubah">Ubah</button>
        </form>
        <br>
        <a href="admin.php">Kembali ke Daftar Praktikan</a>
    </div>
</body>
</html>