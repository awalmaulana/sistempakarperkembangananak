<?php
// include 'auth.php';

 session_start();
if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
      echo "<script>alert('Login gagal! username dan password salah!');window.location='login.php'</script>";
    }else if($_GET['pesan'] == "logout"){
      echo "Anda telah berhasil logout";
    }else if($_GET['pesan'] == "belum_login"){
      // echo "Anda harus login terlebih dahulu";
    }
  }



  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
  </head>
  </head>
  <body>
  <div class="main">

    <div class="item">
      <div class="content">
        <form  class="form-horizontal" method="post"  action="cek-login.php">
          <div class="logo"><img src="./images/user1.png"></div>
          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" name="email" class="form-control" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required>
          </div>

          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
          </div>  
 
          <div class="form-group in">
          <input type="submit" class="btn btn-info btn-block" value="LOGIN"><br>
          <button type="button" name="signup" class="btn btn-success btn-block" id="back" style="background-color: #f911f2"><a href="register.php">SIGN UP</a></button>
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
</html>


