<?php
    $conn = mysqli_connect("localhost", "root", "", "silablima");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    function tambah($data) {
        global $conn;
        $nim = $_POST["nim"];
        $nama = $_POST["nama"];
        $query = "INSERT INTO praktikan VALUES ('', '$nim', '$nama')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function hapus($id) {
        global $conn;
        $query = "DELETE FROM praktikan WHERE id=$id";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function ubah($data, $id) {
        global $conn;
        $nim = $_POST["nim"];
        $nama = $_POST["nama"];
        $query = "UPDATE praktikan SET nim='$nim', nama='$nama' WHERE id=$id";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
?>