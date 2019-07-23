<?php 
   session_start();
   if($_SESSION['status']!="login"){
      header("location:login.php");
   }else if($_SESSION['status']=="login"){
   	 header("location:../index.php");
   }
   ?>