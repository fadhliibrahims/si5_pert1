<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
    $praktikans = query("SELECT * FROM praktikan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/admin.css">
    <title>Halaman Admin</title>
</head>
<body>
    <div class="main">
        <h1>Daftar Praktikan</h1>
        <a href="index.php">Beranda</a>
        <br>
        <a href="tambah.php">Tambah Data Praktikan</a>
        <br><br>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($praktikans as $praktikan) : ?>
            <tr>
                <td><?php echo $i; $i++; ?></td>
                <td><?php echo $praktikan["nim"]; ?></td>
                <td><?php echo $praktikan["nama"]; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $praktikan["id"]; ?>">Ubah</a>
                    <a href="hapus.php?id=<?= $praktikan["id"]; ?>" onclick="return confirm('Hapus?');">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>