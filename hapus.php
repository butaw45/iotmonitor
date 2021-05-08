<?php
    //?Koneksi ke database relay
    $konek = mysqli_connect("localhost","root","","dbiotmonitor");
    $id = $_GET['id'];
    //TODO: Hapus data
    mysqli_query($konek,"DELETE FROM jam WHERE id='$id'");

    //kembali ke halaman utama
    echo "<script>location.replace('indexjam.php');</script>";

?>