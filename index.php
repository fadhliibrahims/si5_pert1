<?php
    session_start();
    require 'functions.php';
    $praktikans = query("SELECT * FROM praktikan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Halaman Awal</title>
</head>
<body>
    <nav>
        <?php if(!isset($_SESSION["login"])) : ?>
            <a href="login.php">Login</a>    
        <?php endif; ?>
        <?php if(isset($_SESSION["login"])) : ?>
            <a href="admin.php">Halaman Admin</a>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
    </nav>
    <h1>Sistem Informasi Laboratorium SI5</h1>
    <div class="main">
        <h3>Daftar Praktikan</h3>
        <br><br>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($praktikans as $praktikan) : ?>
            <tr>
                <td><?php echo $i; $i++; ?></td>
                <td><?php echo $praktikan["nim"]; ?></td>
                <td><?php echo $praktikan["nama"]; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>