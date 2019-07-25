<?php 
   session_start();
   if($_SESSION['status']!="login"){
      header("location:login/login.php?pesan=belum_login");
   }
   ?>
<!DOCTYPE html>
<html>
    <?php 
    include 'assets/page/head.php';
 ?>
   <body class="Artikel">
      <div class="totopshow">
         <a href="#" class="back-to-top"><img alt="Back to Top" src="assets/images/gototop0.png"/></a>
      </div>
      <div id="ttr_page" class="container">
        <?php 
            include 'assets/page/nav.php';
         ?>
         <div id="ttr_content_and_sidebar_container">
            <div id="ttr_content">
               <div id="ttr_content_margin"class="container-fluid">
                  <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                  <?php 
                     include"login/koneksi.php";
                     $id = $_GET['id'];
                     $data = mysqli_query ($koneksi, "select * from artikel where id_artikel='$id'");
                     while ($art=mysqli_fetch_array ($data)) {
                     ?>
                  <!-- ini awal content -->
                  <div class="ttr_Artikel_html_row0 row">
                     <div class="post_column col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ttr_Artikel_html_column00">
                           <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                           <div class="html_content">
                            <p>
                              <center><span style="font-family:'Lemon','Arial';font-size:2.571em;color:rgba(235,101,160,1);"><?php echo $art['judul']; ?></span></center>
                            </p>
                            
                              <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;">
                                 <center><img class="ttr_uniform" src="assets/images/<?php echo $art['foto']; ?>" style="width:458px;height:305px;" /></center> <br><br>
                                 <span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(78,78,78,1);">
                                 <?php echo $art['content'];  ?>
                              </span></p>
                              <br>
                              <span>Tanggal Terbit :<?php echo $art['tanggal'];  ?></span>
                            <br>
                            <span>Penulis : <?php echo $art['penulis'];  ?></span><br>
                            <span>Sumber: <?php echo $art['sumber'];  ?></span>
                              


                           </div>
                           <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                           <div style="clear:both;"></div>
                        </div>
                     </div>
                  
                     <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block"></div>
                  </div>
               <!-- ini akhir content -->
                  <?php } ?>
            </div>
            <div style="clear:both"></div>
         </div>
      </div>
   </body>
</html>