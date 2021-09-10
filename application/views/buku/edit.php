<?=form_open("buku/edit/$buku->id");?>
  <fieldset>
    <legend class="h2"><?= $title; ?></legend>
    
    <?=form_hidden("id", $buku->id);?>
    <?=form_hidden("userId", $buku->userid);?>

    <div class="form-group">
        <label for="txtJudul" class="form-label mt-4">Judul</label>
        <input type="text" class="form-control" name="judul" id="txtJudul" aria-describedby="judulHelp" placeholder="Judul" value="<?=$buku->judul; ?>">
        <small id="judulHelp" class="form-text text-muted">Masukkan Judul Buku.</small>
    </div>
    <div class="form-group">
        <label for="txtPengarang" class="form-label mt-4">Pengarang</label>
        <input type="text" class="form-control" name="pengarang" id="txtPengarang" aria-describedby="pengarangHelp" placeholder="Nama Pengarang" value="<?=$buku->pengarang; ?>">
        <small id="pengarangHelp" class="form-text text-muted">Masukkan Nama Pengarang.</small>
    </div>
    <div class="form-group">
        <label for="txtPenerbit" class="form-label mt-4">Penerbit</label>
        <input type="text" class="form-control" name="penerbit" id="txtPenerbit" aria-describedby="penerbitHelp" placeholder="Penerbit" value="<?=$buku->penerbit; ?>">
        <small id="penerbitHelp" class="form-text text-muted">Masukkan Nama Penerbit.</small>
    </div>
    <div class="form-group">
        <label for="dateTglTerbit" class="form-label mt-4">Tanggal Terbit</label>
        <input type="date" class="form-control" name="tglTerbit" id="dateTglTerbit" aria-describedby="tglTerbitHelp" placeholder="Tanggal Terbit" value="<?=$buku->tglterbit; ?>">
        <small id="tglTerbitHelp" class="form-text text-muted">Masukkan Tanggal Terbit.</small>
    </div>
    <div class="form-group">
        <label for="txtIsbn" class="form-label mt-4">ISBN</label>
        <input type="text" class="form-control" name="isbn" id="txtIsbn" aria-describedby="isbnHelp" placeholder="Penerbit" value="<?=$buku->isbn; ?>">
        <small id="isbnHelp" class="form-text text-muted">ISBN.</small>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
  <?=form_close();?>

