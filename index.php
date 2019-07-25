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
   <body class="Media">
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
      <div class="ttr_Media_html_row0 row">
         <div class="post_column col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ttr_Media_html_column00">
               <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
               <div class="html_content">
                  <?php
                     include"login/koneksi.php";
                     $no = 1;
                     $usr  = $_SESSION['email']; 
                     $data = mysqli_query ($koneksi, " select * from tb_anak where user='$usr'");
                     $mnt  = mysqli_fetch_array ($data);
                     $tgl  = $mnt['tanggal_lahir'];
                     ?>
                  <p>
                     <span class="ttr_image" style="float:Left;overflow:hidden;margin:0em 1.43em 0.71em 0em;"><span><img class="ttr_uniform" src="assets/images/211.jpg" style="max-width:299px;max-height:200px;" /></span></span><span style="font-family:'Lemon','Arial';font-size:2em;color:rgba(6,158,237,1);">
                     Nama Bayi : <?php echo $mnt['nama']; ?>
                     </span>
                     </br>
                     <span style="font-family:'Lemon','Arial';font-size:2em;color:rgba(6,158,237,1);">
                     Tanggal Lahir: <?php echo date('d F Y', strtotime($tgl)) ?>                                    
                     </span>
                     </br>
                     <span style="font-family:'Lemon','Arial';font-size:2em;color:rgba(235,101,160,1);">
                     Usia : 
                     <?php
                     // Tanggal Lahir
                        $birthday = $tgl;
                        // Convert Ke Date Time
                        $biday = new DateTime($birthday);
                        $today = new DateTime();
                        $diff = $today->diff($biday);
                        // Display
                      if ($diff->y < 1) {
                        echo $diff->m.'&#160; Bulan';echo "&#160;&#160;";  echo $diff->d.'&#160; Hari<br />';
                      }else{
                        echo $diff->y.'&#160;Tahun'; echo "</br>";echo $diff->m.'&#160;Bulan';echo "&#160;&#160;";echo $diff->d.'&#160;Hari<br />';
                      }
                        
                         
                        ?>
                     </span>
                  </p>
                  <!-- logika untuk memanggil data perkembangan sesuai dengan usia -->
                  <?php 
                        $usiasaatini = $diff->m ;
                     $data = mysqli_query ($koneksi, " select * from perkembangan where usia='$usiasaatini'");
                     $pkm  = mysqli_fetch_array ($data);
                     // $tgl  = $pkm['tanggal_lahir'];



                  ?>
                  <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;">
                  <span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(78,78,78,1);">
                     <?php echo $pkm['t_kembang']; ?>
                     
                  </span>
                  </p>
                  
               </div>
               <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
               <div style="clear:both;"></div>
            </div>
         </div>
         <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block"></div>
      </div>
      <div class="ttr_Media_html_row1 row">
         <div class="post_column col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="ttr_Media_html_column10">
               <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
               <div class="html_content">
                  <p><span style="font-family:'Lemon','Arial';font-size:2.571em;color:rgba(255,255,255,1);">Perkembangan sensori</span></p>
                  <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(255,255,255,1);">
                  <?php echo $pkm['t_sensori']; ?>   
                  </span>
                  </p>

                  <p><span style="font-family:'Lemon','Arial';font-size:2.571em;color:rgba(255,255,255,1);">Perkembangan Kognitif</span></p>
                  <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(255,255,255,1);">
                  <?php echo $pkm['t_kognitif']; ?>   
                  </span>
                  </p>

                  <p><span style="font-family:'Lemon','Arial';font-size:2.571em;color:rgba(255,255,255,1);">Perkembangan emosional dan sosial</span></p>
                  <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(255,255,255,1);">
                  <?php echo $pkm['t_emosi_sosial']; ?>   
                  </span>
                  </p>
                  

                  


               </div>
               <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
               <div style="clear:both;"></div>
            </div>
         </div>
         <div class="clearfix visible-sm-block visible-md-block visible-xs-block"></div>
         <div class="post_column col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="ttr_Media_html_column11">
               <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
               <div class="html_content">
                  <p><span class="ttr_image" style="float:Left;overflow:hidden;margin:0em 0em 0em 0em;"><span><img class="ttr_uniform" src="assets/images/212.jpg" style="max-width:799px;max-height:700px;" /></span></span></p>
               </div>
               <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
               <div style="clear:both;"></div>
            </div>
         </div>
         <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block"></div>
      </div>
      <!-- section -->
      <div class="ttr_Media_html_row11 row">
         <div class="post_column col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="ttr_Media_html_column10">
               <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
               <div class="html_content">
                  <p><span style="font-family:'Lemon','Arial';font-size:2.571em;color:rgba(255,255,255,1);">Perkembangan Kemapuan</span></p>
                  <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(255,255,255,1);">
                  <?php echo $pkm['t_kemampuan']; ?>   
                  </span>
                  </p>

                  <p><span style="font-family:'Lemon','Arial';font-size:2.571em;color:rgba(255,255,255,1);">Perkembangan apa yang sering terjadi</span></p>
                  <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(255,255,255,1);">
                  <?php echo $pkm['t_terjadi']; ?>   
                  </span>
                  </p>
               </div>
               <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
               <div style="clear:both;"></div>
            </div>
         </div>
         <div class="clearfix visible-sm-block visible-md-block visible-xs-block"></div>
         <div class="post_column col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="ttr_Media_html_column11">
               <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
               <div class="html_content">
                  <p><span class="ttr_image" style="float:Left;overflow:hidden;margin:0em 0em 0em 0em;"><span><img class="ttr_uniform" src="assets/images/235.jpg" style="max-width:799px;max-height:700px;" /></span></span></p>
               </div>
               <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
               <div style="clear:both;"></div>
            </div>
         </div>
         <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block"></div>
         </div
         <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-bottom-collapse: separate;"></div>
      </div>
   </body>
</html>