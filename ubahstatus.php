<?php
    //koneksi ke database relay
    $koneks = mysqli_connect("localhost","root","","dbiotmonitor");
    //update status semua jam menjadi 0
    mysqli_query($koneks,"UPDATE jam set status=0");
?>