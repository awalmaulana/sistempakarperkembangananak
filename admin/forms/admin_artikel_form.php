<fieldset>
    <div class="form-group">
        <label for="judul">Judul *</label>
          <input type="text" name="judul" value="<?php echo htmlspecialchars($edit ? $artikel['judul'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Judul" class="form-control" required="required" id = "judul" >
    </div> 

       <div class="form-group">
        <label for="isi">Isi Artikel</label>
          <textarea name="isi" placeholder="Isi Artikel" class="form-control" id="isi"><?php echo htmlspecialchars(($edit) ? $artikel['isi'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>
    
    <div class="form-group">
        <label>Tanggal</label>
        <input name="tgl" value="<?php echo htmlspecialchars($edit ? $artikel['tgl'] : '', ENT_QUOTES, 'UTF-8'); ?>"  placeholder="Birth date" class="form-control"  type="date">
    </div>

     <div class="form-group">
        <label for="penerbit">Penerbit*</label>
        <input type="text" name="penerbit" value="<?php echo htmlspecialchars($edit ? $artikel['penerbit'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Tanggal" class="form-control" required="required" id="penerbit">
    </div>  
    
    <div class="form-group">
        <label for="foto">Foto*</label>
        <input type="file" name="foto" value="<?php echo htmlspecialchars($edit ? $artikel['foto'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Tanggal" class="form-control" required="required" id="foto">
    </div>  
    

    

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
