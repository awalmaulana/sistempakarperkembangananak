<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
// $username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password']; 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user where email='$email' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['email'] = $email;
	$_SESSION['status'] = "login";
	
	$check = mysqli_num_rows(
                      mysqli_query($koneksi,"select * from user where  status = '0'"));
	if ($check > 0) {
		header("location:daftaranak.php");
	}else{
		header("location:../index.php");
	}
	
}else{
	header("location:login.php?pesan=gagal");
}
?>