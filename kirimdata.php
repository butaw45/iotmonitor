<?php
    //?koneksi ke database sensor
    $konek = mysqli_connect("localhost","root","","dbiotmonitor");

    //!baca data yang dikirim data esp8266
    $suhu = $_GET['suhu'];
    $humidity = $_GET['humidity'];
    $soil = $_GET['soil'];

    //TODO: Simpan ke Tabel tb_sensor

    //!auto increment = 1 / mengembalikan ID menjadi 1 apabila dikosongkan 
    mysqli_query($konek,"ALTER TABLE tb_sensor AUTO_INCREMENT=1");

    //TODO: Simpa data sensor ke tabel tb_sensor
    $simpan = mysqli_query($konek,"INSERT INTO tb_sensor(suhu,humidity,soil)VALUES('$suhu', '$humidity', '$soil')");
    //* Uji simpan untuk memberikan respon
    if($simpan)
        echo "Berhasil dikirim";
    else
        echo "Gagal Terkirim";
?>