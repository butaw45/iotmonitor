<?php

        //TODO: Buat Koneksi ke database sensor
         $konek = mysqli_connect("localhost","root","","dbiotmonitor");

        //! baca data tabel tb_sensor
         $sql = mysqli_query($konek,"SELECT * FROM tb_sensor ORDER BY id DESC");  //!data terakhir ada berada diatas
        //  $result = mysqli_query($konek,$sql);

        //!baca data paling atas
         $data = mysqli_fetch_array($sql);
         $humidity = $data['humidity'];

        //? uji , apabila nilai humidity belum ada ; maka anggap humidity = 0
        if( $humidity == "" ) $humidity = 0;
       
       //* Cetak nilai humidity
        echo $humidity;
?>
