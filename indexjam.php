<?php
    //Koneksi kedatabase relay
    $konek = mysqli_connect("localhost","root","","dbiotmonitor");


    //uji apakah tombol simpan diklik
    if (isset($_POST['btnSimpan'])) {
      $jam = $_POST['jam'];
      $status = 0;

      //simpan kedalam database
      //supaya id selalu dimulai awal
      mysqli_query($konek,"ALTER TABLE jam AUTO_INCREMENT=1");
      mysqli_query($konek,"INSERT INTO jam(jam,status)values('$jam','$status')");
    }
    
?>

<!doctype html>
<html lang="en">

<head>
  <title>IoT</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
  <link rel="stylesheet" type="text/css" href="assets/css/css.css">
  <link rel="stylesheet" type="text/css" href="assets/css/material-dashboard.css?v=2.1.2">
  <script type="text/javascript" src="jquery/jquery.min.js"></script>
  <script type="text/javascript" src="js/js.js"></script>

  <style type="text/css">
  .tengah{
    display: flex;
    flex-direction: column;
    justify-content:center ;
    align-items: center;
    text-align: center;
  }
  </style>
  
  <script type="text/javascript">
    $(document).ready(function(){
      setInterval(function(){
        $("#datajam").load('cekjam.php');
      },1000);
    });
  </script>
</head> 

<body>

<!-- //!Navbar atas -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container"> <!-- container-fluid -->
  
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="indexjam.php">jam</a>
        </li>
        
       
      </ul>
    </div>
  </div>
</nav>
<!-- //!end Navbar -->


  <div class="content">
    <div class="container-fluid tengah" >
      <div><h3 style="text-align: center;">Setting Waktu Pemupukan <br>Secara Real Time</h3></div>
      <div style="width: 500px;">
        <div class="card card-chart" style="height: auto;"> 
          <div class="card-header card-header-success">
            <i class="fas fa-bell" style="font-size: 36px;"></i>
            <br>
            Pengaturan pupuk
          </div>

        <div class="card-body">
            Jam Sekarang:
            <h2 style="font-weight: bold;">
              <div id="datajam"></div>
            </h2>
            <br>
            <div class="form-group">
              <form method="POST">
                <div>
                  <input type="text" name="jam" id="jam" class="form-control" placeholder="Jam  :  Menit  :  Detik" required style="text-align: center;">
                
                <button type="submit" name="btnSimpan" id="btnSimpan" class="btn btn-primary btn-sm">Tambah Data</button>
                </div>
              </form>
            </div>

            <!-- //!Data jam Tersimpan -->
            <table class="table table-bordered" style="text-align: center;">
            <tr style="background-color: grey; color: whitesmoke;">
              <th>List jam</th>
              <th style="width: 10px;">Aksi</th>
            
            </tr>

            <?php
            //TODO:Baca isi tabel jam
            $sql = mysqli_query($konek, "SELECT * FROM jam order by id asc");

            while($data = mysqli_fetch_array($sql)){

            
            ?>
            <tr>
              <td> <?php echo $data['jam'];?></td>
              <td> <a href="hapus.php?id=<?php echo $data['id']; ?>">
                  <i class="fa fa-trash"></i>
                  </a>
              </td>
            </tr>
            <?php
            }
            ?>
            </table>

        </div>


        </div>
      </div>
    </div>
  </div>

</body>
</html>