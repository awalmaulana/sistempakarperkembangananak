
<?php 
   session_start();
   if($_SESSION['status']!="login"){
      header("location:login/login.php?pesan=belum_login");
   }
   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  <div class="main">
    <div class="item">
      <div class="content">
         <form  class="form-horizontal" action="daftaranak.php" method="post" enctype="multipart/form-data">
          <div class="logo"><img src="./images/user1.png"></div>
          <center><h2 style="color:rgba(235,101,160,1);">Biodata Anak</h2></center>
          <hr>
          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" name="namabayi" class="form-control" placeholder="Nama Bayi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Bayi'">
          </div>
        <hr>
          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            <input type="date" name="tgllahir" class="form-control" >
          </div> 
          <hr>
          <div class="input-group lg">
            <div style="margin-left: 35px;">
            <input type="radio" name="gender" value="Perempuan" > Perempuan 
              </br>
            <input type="radio" name="gender" value="Laki-laki" > Laki- Laki
          
            
            </div>
          </div> 

          <div class="form-group in">
          <input type="submit" name="submit" class="btn btn-info btn-block" value="Ok">
          </div>
        </form>
      </div>
    </div>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
   <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['submit'])) {
        // session_start();
        include"koneksi.php";

        $namabayi    = $_POST['namabayi'];
        $tgllahir    = $_POST['tgllahir'];
        $gender      = $_POST['gender'];
        $usr         = $_SESSION['email']; 
        
        $query = "insert INTO tb_anak SET
                nama = '$namabayi',
                tanggal_lahir = '$tgllahir',
                gender = '$gender',
                BB = '',
                TB = '',
                asi = '',
                user = '$usr'
                ";
        
         
        // mysqli_query($koneksi, "update user set status='1' where email='$usr'")

        mysqli_query($koneksi, "update user set status='1' where email='$usr'");
        mysqli_query($koneksi, $query);
        // $_SESSION['pesan'] = 'Anda Berhasil Terdaftar';
        echo "<script>alert('Selamat Datang Di Aplikasi Perkembangan Anak');window.location='../index.php'</script>";
        

        
      
    }
    ?>
   
</html>
