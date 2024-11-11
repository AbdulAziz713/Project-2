<?php
    $host = "LocalHost";
    $username = "root";
    $password = "";
    $database = "wedding_organizer";
    $koneksi = mysqli_connect($host,$username,$password,$database);

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>