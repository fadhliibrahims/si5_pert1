<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'functions.php';

    $id = $_GET["id"];

    if( hapus($id) > 0 ) {
        echo "
                <script>
                    alert('Hapus Data Berhasil');
                    document.location.href = admin.php;
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Hapus Data Gagal');
                    document.location.href = admin.php;
                </script>
            ";
    }
    header('Location: admin.php');
?>