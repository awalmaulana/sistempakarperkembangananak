
<!DOCTYPE html>
<html>
   <?php 
      include 'assets/page/head.php';
         // untuk memanggil file
      include 'Crud.php';
      // untuk mendeklarasikan class menjadi variabel
      $crud = new Crud();
      $arrayName = $crud->readGejala();
      ?>
   <body class="Artikel">
      <div class="totopshow">
         <a href="#" class="back-to-top"><img alt="Back to Top" src="assets/images/gototop0.png" /></a>
      </div>
      <div id="ttr_page" class="container">
      <?php 
         include 'assets/page/nav.php';
         ?>
      <div id="ttr_content_and_sidebar_container">
         <div id="ttr_content">
            <div id="ttr_content_margin" class="container-fluid">
               <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
               <!-- ini awal content -->
               <div class="container">
                  <div class="row">
                     <div class="col-lg-12">
                        <h1 style="text-align: center;">Gejala Yang Dirasakan Bayi Adalah </h1>
                     </div>
                    
                   <div class="col-lg-12">
                       <div style="text-align: center;">
                      <?php
                  if (isset($_POST['button']))
                  {
                    // group kemungkinan terdapat penyakit
                    $groupKemungkinanPenyakit = $crud->getGroupPengetahuan(implode(",", $_POST['gejala']));

                    // menampilkan kode gejala yang di pilih
                    $sql = $_POST['gejala'];

                    if (isset($sql)) {
                      // mencari data penyakit kemungkinan dari gejala
                      for ($h=0; $h < count($sql); $h++) {
                        $kemungkinanPenyakit[] = $crud->getKemungkinanPenyakit($sql[$h]);
                        for ($x=0; $x < count($kemungkinanPenyakit[$h]); $x++) {
                          for ($i=0; $i < count($groupKemungkinanPenyakit); $i++) {
                            $namaPenyakit = $groupKemungkinanPenyakit[$i]['nama_penyakit'];
                            if ($kemungkinanPenyakit[$h][$x]['nama_penyakit'] == $namaPenyakit) {
                              // list di kemungkinan dari gejala
                              $listIdKemungkinan[$namaPenyakit][] = $kemungkinanPenyakit[$h][$x]['id_pengetahuan'];
                            }
                          }
                        }
                      }

                      $id_penyakit_terbesar = '';
                      $nama_penyakit_terbesar = '';
                      // list penyakit kemungkinan
                      for ($h=0; $h < count($groupKemungkinanPenyakit); $h++) { 
                        $namaPenyakit = $groupKemungkinanPenyakit[$h]['nama_penyakit'];
                        // echo "<br/>Proses Penyakit ".$h.".".$namaPenyakit."<br/>==============<br/>";
                        
                        // list penyakit kemungkinan dari gejala
                        for ($x=0; $x < count($listIdKemungkinan[$namaPenyakit]); $x++) { 
                          $daftarKemungkinanPenyakit = $crud->getListPenyakit($listIdKemungkinan[$namaPenyakit][$x]);
                          
                          // echo "<br/>proses ".$x."<br/>------------------------------------<br/>";
                                  
                          for ($i=0; $i < count($daftarKemungkinanPenyakit); $i++) {
                              
                              if (count($listIdKemungkinan) == 1) {
                                echo "Jumlah Gejala = ".
                                  count($listIdKemungkinan[$namaPenyakit])."<br/>";
                                    
                                // bila list kemungkinan terdapat 1
                                $mb = $daftarKemungkinanPenyakit[$i]['mb'];
                                $md = $daftarKemungkinanPenyakit[$i]['md'];
                                $cf = $mb - $md;
                                $daftar_cf[$namaPenyakit][] = $cf;

                                // echo "<br/>proses 1<br/>------------------------<br/>";
                                // echo "mb = ".$mb."<br/>";
                                // echo "md = ".$md."<br/>";
                                // echo "cf = mb - md = ".$mb." - ".$md." = ".$cf."<br/><br/><br/>";
                                // end bila list kemungkinan terdapat 1
                              } else {
                                // list kemungkinanan lebih dari satu
                                if ($x == 0)
                                {
                                  // echo "Jumlah Gejala = ".
                                  count($listIdKemungkinan[$namaPenyakit])."<br/>";
                                  // record md dan mb sebelumnya
                                  $mblama = $daftarKemungkinanPenyakit[$i]['mb'];
                                  $mdlama = $daftarKemungkinanPenyakit[$i]['md'];
                                  // md yang di esekusi
                                  $mb = $daftarKemungkinanPenyakit[$i]['mb'];
                                  $md = $daftarKemungkinanPenyakit[$i]['md'];
                                  // echo "<br/>";
                                  // echo "mbbaru = ".$mb."<br/>";
                                  // echo "mdbaru = ".$md."<br/>";
                                  $cf = $mb - $md;
                                  // echo "cf = mb - md = ".$mb." - ".$md." = ".$cf."<br/><br/><br/>";

                                  $daftar_cf[$namaPenyakit][] = $cf;
                                } 
                                else
                                {
                                  $mbbaru = $daftarKemungkinanPenyakit[$i]['mb'];
                                  $mdbaru = $daftarKemungkinanPenyakit[$i]['md'];
                                  // echo "mbbaru = ".$mbbaru."<br/>";
                                  // echo "mdbaru = ".$mdbaru."<br/>";
                                  $mbsementara = $mblama + ($mbbaru * (1 - $mblama));
                                  $mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
                                  // echo "mbsementara = mblama + (mbbaru * (1 - mblama)) = $mblama + ($mbbaru * (1 - $mblama)) = ".$mbsementara."<br/>";
                                  // echo "mdsementara = mdlama + (mdbaru * (1 - mdlama)) = $mdlama + ($mdbaru * (1 - $mdlama)) = ".$mdsementara."<br/>";

                                  $mb = $mbsementara;
                                  $md = $mdsementara;
                                  $cf = $mb - $md;
                                  // echo "cf = mblama - mdlama = ".$mb." - ".$md." = ".$cf."<br/><br/><br/>";
                                  $daftar_cf[$namaPenyakit][] = $cf;;
                                }
                                // end list kemungkinanan lebih dari satu
                              }
                            }
                          }  
                        }
                      }
                ?>
                 <?php 

                    echo "<br/>======================================<br/>";
                    $crud->hasilCFTertinggi($daftar_cf,$groupKemungkinanPenyakit);
                    $crud->hasilAkhir($daftar_cf,$groupKemungkinanPenyakit);
                    echo "<br/>======================================<br/>";
                  }

                 ?>  
                <!-- <input type="submit" name="button" value="Proses" > -->
                <a href="konsultasi.php" class="btn btn-md btn-default">Kembali</a>
                     </div>
                   </div>
                  </div>
               </div>
            </div>
            <div style="clear:both"></div>
         </div>
      </div>
     
   </body>
    <script type="text/javascript">
         WebFontConfig = {
         google: { families: [ 'Lemon'] }
         };
         (function() {
         var wf = document.createElement('script');
         wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1.0.31/webfont.js';
         wf.type = 'text/javascript';
         wf.async = 'true';
         var s = document.getElementsByTagName('script')[0];
         s.parentNode.insertBefore(wf, s);
         })();
      </script>
</html>