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
                  <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(78,78,78,1);">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>
                  <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(78,78,78,1);"> A maecenas quisque scelerisque dis. Laoreet faucibus, eros vestibulum nisl inceptos cum risus arcu ac sollicitudin tortor. Eleifend. Metus at felis ut sagittis duis dis sociosqu dui aptent Dictumst risus diam augue hymenaeos ut congue quisque. Feugiat luctus ultricies cras tempus. </span></p>
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
                  <p><span style="font-family:'Lemon','Arial';font-size:2.571em;color:rgba(255,255,255,1);">Perkembangan</span></p>
                  <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(255,255,255,1);">Aliquam pulvinar pellentesque purus, nec condimentum nibh. Aenean dapibus iaculis odio id vestibulum. Nam at justo ante. Aenean hendrerit gravida ligula, id lacinia sapien tristique eget. Aenean hendrerit gravida ligula, id lacinia sapien tristique eget</span></p>
                  <p style="margin:2.14em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-size:1.429em;color:rgba(255,255,255,1);">1. Vestibulum Pulvinarsed</span></p>
                  <p style="margin:0em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(255,255,255,1);"> Maecenas eros mi, lacinia eu ultricies vel, elementum et justo. Ut at tortor a odio vestibulum suscipit non sit amet dolor. </span></p>
                  <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-size:1.429em;color:rgba(255,255,255,1);">2. Curabitur lacinia tristique </span></p>
                  <p style="margin:0em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(255,255,255,1);">Nam pretium id risus vitae fermentum. Aenean eu euismod justo. Aliquam sodales tortor elit, non luctus felis tristique sit amet. </span></p>
                  <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-size:1.429em;color:rgba(255,255,255,1);">3. Pellentesque ornare </span></p>
                  <p style="margin:0em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(255,255,255,1);">Amet purus malesuada blandit. Quisque scelerisque a lectus vel ornare. Etiam pellentesque justo ipsum, et pretium felis vulputate ac..</span></p>
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
                  <p><span style="font-family:'Lemon','Arial';font-size:2.571em;color:rgba(255,255,255,1);">Sering Di Alami</span></p>
                  <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(255,255,255,1);">Aliquam pulvinar pellentesque purus, nec condimentum nibh. Aenean dapibus iaculis odio id vestibulum. Nam at justo ante. Aenean hendrerit gravida ligula, id lacinia sapien tristique eget. Aenean hendrerit gravida ligula, id lacinia sapien tristique eget</span></p>
                  <p style="margin:2.14em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-size:1.429em;color:rgba(255,255,255,1);">1. Vestibulum Pulvinarsed</span></p>
                  <p style="margin:0em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(255,255,255,1);"> Maecenas eros mi, lacinia eu ultricies vel, elementum et justo. Ut at tortor a odio vestibulum suscipit non sit amet dolor. </span></p>
                  <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-size:1.429em;color:rgba(255,255,255,1);">2. Curabitur lacinia tristique </span></p>
                  <p style="margin:0em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(255,255,255,1);">Nam pretium id risus vitae fermentum. Aenean eu euismod justo. Aliquam sodales tortor elit, non luctus felis tristique sit amet. </span></p>
                  <p style="margin:1.43em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-size:1.429em;color:rgba(255,255,255,1);">3. Pellentesque ornare </span></p>
                  <p style="margin:0em 0em 0.36em 0em;line-height:1.69014084507042;"><span style="font-family:'Roboto','Arial';font-weight:300;font-size:1.143em;color:rgba(255,255,255,1);">Amet purus malesuada blandit. Quisque scelerisque a lectus vel ornare. Etiam pellentesque justo ipsum, et pretium felis vulputate ac..</span></p>
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