<?=form_open("sewa/edit/$sewa->id");?>
  <fieldset>
    <legend class="h2">Mengedit Sewa</legend>
    <?=form_hidden("id", $sewa->id);?>
    
    <div class="form-group">
        <label for="txtJkodepel" class="form-label mt-4">ISBN</label>
        <!-- <input type="text" class="form-control" id="txtISBN" name="isbn" aria-describedby="isbnHelp"  placeholder="ISBN Buku" value="<?=$sewa->isbn; ?>">
        <small id="isbnHelp" class="form-text text-muted">Masukkan ISBN Buku</small> -->
        <select class="form-select" name="isbn" id="txtIsbn" class="txtIsbn">
            <?php foreach($buku as $item) : ?>
            <option value="<?=$sewa->isbn?>"><?=$item->isbn?> - <?=$item->judul ?></option>
            <?php endforeach ?>
        </select>
        <small id="isbnHelp" class="form-text text-muted">Pilih Buku</small>      
    </div>
    <div class="form-group">
    <label for="txtPelangganId" class="form-label mt-4">ID Pelanggan</label>
        <!-- <input type="text" class="form-control" id="txtPelangganId"  name="pelangganid" aria-describedby="pelangganidHelp" placeholder="ID Pelanggan" value="<?=$sewa->pelangganid; ?>">
        <small id="pelangganidHelp" class="form-text text-muted">Masukkan ID Pelanggan.</small> -->
        <select class="form-select" name="pelanggan" id="txtPelangganId">
            <?php foreach($pelanggan as $item) : ?>
                <option value="<?=$sewa->pelangganid?>"><?=$item->kodepel?> - <?=$item->nama ?></option>
            <?php endforeach ?>
        </select>
        <small id="pelangganidHelp" class="form-text text-muted">Pilih Pelanggan.</small>
    </div>
	<div class="form-group">
        <label for="txtLamaSewa" class="form-label mt-4">Lama Sewa</label>
		<input type="number" class="form-control" id="txtLamaSewa" name="lamasewa" aria-describedby="lamsewaHelp" placeholder="Lama Sewa" value="<?=$sewa->lamasewa; ?>">
        <small id="lamsewaHelp" class="form-text text-muted">Masukkan berupa angka berapa lama sewa </small>
    </div>
    <div class="form-group">
    <label for="txtKeterangan" class="form-label mt-4">Keterangan</label>
        <input type="text" class="form-control" id="txtKeterangan" name="keterangan" aria-describedby="keteranganHelp"  placeholder="Alamat" value="<?=$sewa->keterangan; ?>">
        <small id="keteranganHelp" class="form-text text-muted">Masukkan Keterangan Sewa</small>
    </div>
    <div class="form-group">
    <label for="tglSewa" class="form-label mt-4">Tanggal Sewa</label>
        <input type="date" class="form-control" id="tglSewa" name="tglsewa" aria-describedby="tglSewaHelp"  value="<?=$sewa->tglsewa; ?>" placeholder="Tanggal Sewa" >
        <small id="tglSewaHelp" class="form-text text-muted">Masukkan Tanggal Penyewaan.</small>
    </div>
	

    <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
  <?=form_close();?>

