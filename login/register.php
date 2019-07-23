<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registration</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  <div class="main">
    <div style="height:55px;">
         <?php 
          if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
          echo '<div id="pesan" class="alert alert-success" style="display:none;">'.$_SESSION['pesan'].'</div>';
          }
          $_SESSION['pesan'] = '';
        ?>
      </div>
    <div class="item">
      <div class="content">
        <form  class="form-horizontal" action="register.php" method="post" enctype="multipart/form-data">

          <div class="logo"><img src="./images/user1.png"></div>
          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" name="username" class="form-control" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required>
          </div>
        
          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            <input type="email" name="email" class="form-control" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required>
            <input type="text" name="status" value="0" hidden>
          </div> 

          

          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
          </div>  

          <div class="form-group in">
          <input type="submit" name="submit" class="btn btn-info btn-block" value="OK" ><br>
          <button type="button"  class="btn btn-danger btn-block" id="back"><a href="index.php">BACK TO LOGIN</a></button>

          </div>
        </form>
       
      </div>
    </div>
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['submit'])) {
        // session_start();
        include"koneksi.php";

        $username = $_POST['username'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $status   = $_POST['status'];

        $user_check = mysqli_num_rows(
                      mysqli_query($koneksi,"select * from user where username='$username' AND email = '$email'"));

        if($user_check > 0 ){
          echo "<script>alert('username dan Email Telah digunakan');window.location='register.php'</script>";
        }else {
         $query = "insert INTO user SET
                username = '$username',
                email = '$email',
                password = '$password',
                status = '$status'
                ";

        mysqli_query($koneksi, $query)
          or die ("Gagal Perintah SQL".mysql_error());
        // $_SESSION['pesan'] = 'Anda Berhasil Terdaftar';
        echo "<script>alert('Selamat .. Pendaftaran account Berhasil');window.location='login.php'</script>";
        }

        
      
    }
    ?>
</html>
