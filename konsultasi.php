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
                        <h1 style="text-align: center;">Gejala Yang Dirasakan </h1>
                     </div>
                     <form name="form1" method="post" action="output.php">
                        <br>
                        <table align="center" width="600" border="1" cellspacing="0" cellpadding="5">
                           <tr>
                              <td id="ignore" bgcolor="#DBEAF5" width="300">
                                 <div align="center">
                                    <strong>
                                       <font size="2" face="Arial, Helvetica, sans-serif">
                                          <h4>G e j a l a</h4>
                                       </font>
                                    </strong>
                                 </div>
                              </td>
                              <?php
                                 foreach ($arrayName as $r)
                                 {
                                 ?>
                           <tr>
                              <td width="600">
                                 <input id="gejala<?php echo $r['id_gejala']; ?>" name="gejala[]" type="checkbox" value="<?php echo $r['id_gejala']; ?>">
                                 <?php echo $r['nama_gejala']; ?>
                                 <br/>
                              </td>
                           </tr>
                           <?php
                              }
                              ?>
                           <tr>
                              <td>
                                 <center>
                                    <input type="submit" name="button" value="Proses" class="btn btn-md btn-default">
                                 </center>
                              </td>
                           </tr>
                        </table>
                        <br>
                     </form>
                  </div>
               </div>
            </div>
            <div style="clear:both"></div>
         </div>
      </div>
   </body>
</html>