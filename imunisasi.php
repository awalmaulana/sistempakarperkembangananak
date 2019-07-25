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
   <link rel="stylesheet" href="grafik/New folder/style.css">
   <style type="text/css">
      input[type=text], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      }
      input[type=submit] {
      width: 100%;
      background-color: #eb65a0;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      }
      input[type=submit]:hover {
      background-color: #d86497;
      }
      #chart {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
      /*height: 500px;*/
      width: 100%;
      float: left;
      /*margin-top: 20px;*/
      /*margin-left: 50px;*/
      }
      #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      #customers td, #customers th {
        border: 1px solid #eb65a06b;
        padding: 8px;
      }

      #customers tr:nth-child(even){background-color: #f2f2f2;}

      #customers tr:hover {background-color: #ddd;}

      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #069eed;
        color: white;
        text-align: center;
      }


   </style>
    <?php
    include"login/koneksi.php";
    $no = 1;
    $usr  = $_SESSION['email']; 
    $data = mysqli_query ($koneksi, " select * from tb_anak where user='$usr'");
    $mnt  = mysqli_fetch_array ($data);
    $tgl  = $mnt['tanggal_lahir'];
    $bb   = $mnt['BB'];
    $tb   = $mnt['TB'];
    $asi  = $mnt['asi'];
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
                  <!-- ini awal content -->
                  <div class="ttr_Artikel_html_row0 row">
                     <div class="post_column col-lg-7 col-md-12 col-sm-12 col-xs-12">
                        <div class="ttr_Artikel_html_column00">
                           <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                           <div class="html_content">
                            <div id="chart" >
                                <?php 
                                    $berat = 464;
                                    $usia  = 45;

                                    $hitungberat = $bb*25;
                                    $newberat = $berat - $hitungberat;
                                    // echo $newberat;

                                    $birthday = $tgl;
                                    // Convert Ke Date Time
                                     $biday = new DateTime($birthday);
                                     $today = new DateTime();
                                     $us = $today->diff($biday);
                                     $newus = $us->m;
                                     // echo 

                                     $hitungusia = $newus*21;
                                     $newusia= $usia + $hitungusia;
                                     echo $newusia;
                                ?>
                             <svg version="1.2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="graph" aria-labelledby="title" role="img">
                                 <g class="grid x-grid" id="xGrid">
                                    <line x1="20" x2="20" y1="5" y2="466"></line>
                                 </g>
                                 <g class="grid y-grid" id="yGrid">
                                    <line x1="20" x2="505" y1="465" y2="465"></line>
                                 </g>
                                 <g class="labels x-labels">
                                    <!--  <text x="100" y="400">2008</text>
                                       <text x="246" y="400">2009</text>
                                       <text x="392" y="400">2010</text>
                                       <text x="538" y="400">2011</text>
                                       <text x="684" y="400">2012</text>
                                       <text x="400" y="440" class="label-title">Year</text> -->
                                 </g>
                                 <g class="labels y-labels">
                                    <!--   <text x="80" y="15">15</text>
                                       <text x="80" y="131">10</text>
                                       <text x="80" y="440" style="font-size: 9px;">2</text>
                                       <text x="80" y="455" style="font-size: 9px;">1</text>
                                       <text x="50" y="200" class="label-title">Price</text> -->
                                 </g>
                                 <g class="data" data-setname="Our first data set">
                                    <circle cx="<?php echo $newusia ?>" cy="<?php echo $newberat ?>" data-value="" r="4"></circle>
                                    <!-- selisih antara cx adalah 21 -->
                                    <!-- selisih antara cy adalah 24,25,26,27 -->
                                 </g>
                              </svg>
                          </div>
                           </div>
                           <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                           <div style="clear:both;"></div>
                        </div>
                     </div>
                     <div class="clearfix visible-sm-block visible-md-block visible-xs-block"></div>
                     <div class="post_column col-lg-5 col-md-12 col-sm-12 col-xs-12">
                        <div class="ttr_Artikel_html_column01">
                           <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                           <div class="html_content">
                             
                                   <h1><center>Data Bayi</center></h1>
                                <hr>
                            </br>
                                 <p>
                                    <span style="font-family:'Lemon','Arial';font-size:1.5em;color:rgba(6,158,237,1);">
                                     Nama Bayi &#160;&#160;&#160;&#160;&#160;: <?php echo $mnt['nama']; ?>
                                     </span>
                                     </br>
                                     <span style="font-family:'Lemon','Arial';font-size:1.5em;color:rgba(6,158,237,1);">
                                     Tanggal Lahir &#160;: <?php echo date('d F Y', strtotime($tgl)) ?>                                    
                                     </span>
                                     </br>
                                     <span style="font-family:'Lemon','Arial';font-size:1.5em;color:rgba(6,158,237,1);">
                                     Jenis Kelamin&#160;: <?php echo $mnt['gender']; ?>                                    
                                     </span>
                                     </br>
                                     <span style="font-family:'Lemon','Arial';font-size:1.5em;color:rgba(235,101,160,1);">
                                     Usia &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;: 
                                     <?php
                                     // Tanggal Lahir
                                        $birthday = $tgl;
                                        // Convert Ke Date Time
                                        $biday = new DateTime($birthday);
                                        $today = new DateTime();
                                        $diff = $today->diff($biday);
                                        // Display
                                      if ($diff->y < 1) {
                                        echo $diff->m.'&#160; Bulan';echo "&#160;&#160;";  echo $diff->d.'&#160; Hari';
                                      }else{
                                        echo $diff->y.'&#160;Tahun';echo "&#160;&#160;"; echo $diff->m.'&#160;Bulan';echo "&#160;&#160;";echo $diff->d.'&#160;Hari<br />';
                                      }
                                        
                                         
                                        ?>
                                     </span>
                                 </br>
                                  </p>
                                  <hr>
                                  <br>
                            <form action="#" method="post">
                                <label>Berat Badan</label>
                                 <input type="text"  name="bb" placeholder="Berat Badan Bayi" <?php if ($bb != null): ?>
                                   value="<?php echo $mnt['BB']; ?>"                                      
                                 <?php endif ?>>
                                 <label>Berat Badan</label>
                                 <input type="text"  name="tb" placeholder="Tinggi Badan Bayi" <?php if ($tb != null): ?>
                                   value="<?php echo $mnt['TB']; ?>"                                      
                                 <?php endif ?>>
                                  
                                 <input type="checkbox"  name="asi" placeholder="ASI Exclusive" <?php if ($asi != null): ?>
                                   value="<?php echo $mnt['asi']; ?>" checked                                      
                                 <?php endif ?> unchecked>  <label>Asi Eksklusif</label>
                               
                                 <input type="submit" name="submit" value="Submit">
                              </form>
                           </div>
                           <?php
                            // Check If form submitted, insert form data into users table.
                            if(isset($_POST['submit'])) {
                                include"koneksi.php";

                                $bb    = $_POST['bb'];
                                $tb    = $_POST['tb'];
                                $asi   = $_POST['asi'];
                                $usr   = $_SESSION['email']; 
                                
                                $query = "update tb_anak SET BB = '$bb',TB = '$tb', asi = '$asi' where user = '$usr'";                                 
                                mysqli_query($koneksi, $query);
                                echo "<script>alert('Selamat Datang Di Aplikasi Perkembangan Anak');window.location='imunisasi.php'</script>";
                              
                            }
                            ?>

                           <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                           <div style="clear:both;"></div>
                        </div>
                     </div>
                     <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block"></div>
                  </div>
                    <!-- ini akhir content -->
                         <div class="ttr_Artikel_html_row0 row">
                     <div class="post_column col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ttr_Artikel_html_column00">
                           <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                           <div class="ttr_Artikel_html_column01">
                           <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                           <center><h2>Jadwal Imunisasi Bayi</h2></center>
                           <div class="html_content">
                            <table id="customers" >
                                  <tr >
                                    <th >UMUR (Bulan)</th>
                                    <th>0</th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>6</th>
                                    <th>7</th>
                                    <th>8</th>
                                    <th>9</th>
                                    <th>10</th>
                                    <th>11</th>
                                    <th>12</th>
                                    <th>18</th>
                                    <th>24</th>
                                  </tr>
                                 
                                  <tr>
                                    <td>Vaksin</td>
                                    <td colspan="15"><center>Tanggal Pemberian Imunisasi</center></td>
                                  </tr>
                                  <tr>
                                    <td>HB-0(0-7hari)</td>
                                    <td style="text-align: center; background-color: #eb65a073;">
                                    <?php
                                    $tgl1 = date('d F Y', strtotime('+6 days', strtotime($tgl))); echo $tgl1; 
                                    ?>                                        
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td>BCG</td>
                                    <td></td>
                                   <td style="text-align: center; background-color: #eb65a073; " rowspan="2">
                                    <?php
                                    $tgl2 = date('d F Y', strtotime('+30 days', strtotime($tgl))); echo $tgl2; 
                                    ?>                                        
                                    </td>
                                    <!-- <td></td> -->
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                  </tr>
                                  <tr>
                                    <td>*Polio</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td>DPT-HB-Hib 1</td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td style="text-align: center;background-color: #eb65a073;" rowspan="2">
                                    <?php
                                    $tgl4 = date('d F Y', strtotime('+30 days', strtotime($tgl2))); echo $tgl4; 
                                    ?>                                        
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td>*Polio 2</td>
                                   
                                    <td></td>
                                    <td></td>                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td>DPT-HB-Hib 2</td>
                                    <td></td>
                                    <td></td>                                    
                                    <td></td>
                                    <td></td>                                    
                                    <td style="text-align: center; background-color: #eb65a073;" rowspan="2">
                                    <?php
                                    $tgl5 = date('d F Y', strtotime('+30 days', strtotime($tgl4))); echo $tgl5; 
                                    ?>                                        
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td>*Polio 3</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                  </tr>
                                  <tr>
                                    <td>DPT-HB-Hib 3</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                     <td style="text-align: center; background-color: #eb65a073;" rowspan="3">
                                    <?php
                                    $tgl6 = date('d F Y', strtotime('+30 days', strtotime($tgl5))); echo $tgl6; 
                                    ?>                                        
                                    </td>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                   <tr>
                                    <td>*Polio 4</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                  </tr>
                                   <tr>
                                    <td>*IPV</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                  </tr>
                                   <tr>
                                    <td>Campak</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                   <td style="text-align: center; background-color: #eb65a073;" >
                                    <?php
                                    $tgl7 = date('d F Y', strtotime('+30 days', strtotime($tgl6))); echo $tgl7; 
                                    ?>                                        
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td>***DPT-HB-HIb Lanjutan</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                   <td style="text-align: center; background-color: #eb65a073;" >
                                    <?php
                                    $tgl8 = date('d F Y', strtotime('+6 month', strtotime($tgl7))); echo $tgl8; 
                                    ?>                                        
                                    </td>
                                   
                                    
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td>***Campak Lanjutan</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                   <td style="text-align: center; background-color: #eb65a073;" >
                                    <?php
                                    $tgl9 = date('d F Y', strtotime('+6 month', strtotime($tgl8))); echo $tgl9; 
                                    ?>                                        
                                    </td>
                                    
                                  </tr>

                            </table>

                           </div>
                           <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                           <div style="clear:both;"></div>
                        </div>
                          
                           <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                           <div style="clear:both;"></div>
                        </div>
                     </div>
                     
                     <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block"></div>
                  </div>

                  <!-- end -->
            </div>
            <div style="clear:both"></div>
         </div>
  </div>
   </body>
</html>