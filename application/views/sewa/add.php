<?=form_open("sewa/add");?>
  <fieldset>
    <legend class="h2">Menambah Sewa</legend>
    
    <div class="form-group">
        <label for="txtIsbn" class="form-label mt-4">ISBN</label>
        <!-- <input type="text" class="form-control" name="isbn" id="txtISBN" aria-describedby="isbnHelp" placeholder="ISBN Buku" >
        <small id="isbnHelp" class="form-text text-muted">Masukkan ISBN Buku</small> -->
        <select class="form-select" name="isbn" id="txtIsbn" class="txtIsbn">
            <?php foreach($buku as $item) : ?>
                <option value="<?=$item->isbn?>"><?=$item->isbn?> - <?=$item->judul ?></option>
            <?php endforeach ?>
        </select>
        <small id="isbnHelp" class="form-text text-muted">Pilih Buku</small>          
    </div>
    <div class="form-group">
        <label for="txtPelangganId" class="form-label mt-4">ID Pelanggan</label>
        <!-- <input type="text" class="form-control" name="pelangganid" id="txtPelangganId" aria-describedby="pelangganidHelp" placeholder="ID Pelanggan" >
        <small id="pelangganidHelp" class="form-text text-muted">Masukkan ID Pelanggan.</small> -->
        <select class="form-select" name="pelanggan" id="txtPelangganId">
            <?php foreach($pelanggan as $item) : ?>
                <option value="<?=$item->id?>"><?=$item->kodepel?> - <?=$item->nama ?></option>
            <?php endforeach ?>
        </select>
        <small id="pelangganidHelp" class="form-text text-muted">Pilih Pelanggan.</small>
    </div>
	<div class="form-group">
        <label for="txtLamaSewa" class="form-label mt-4">Lama Sewa</label>
		<input type="number" class="form-control" name="lamasewa" id="txtLamaSewa" aria-describedby="lamsewaHelp" placeholder="Lama Sewa" >
        <small id="lamsewaHelp" class="form-text text-muted">Masukkan berupa angka berapa lama sewa </small>
    </div>
    <div class="form-group">
        <label for="txtKeterangan" class="form-label mt-4">Keterangan</label>
        <input type="text" class="form-control" name="keterangan" id="txtKeterangan" aria-describedby="keteranganHelp" placeholder="Keterangan" >
        <small id="keteranganHelp" class="form-text text-muted">Masukkan Keterangan Sewa</small>
    </div>
    <div class="form-group">
        <label for="tglSewa" class="form-label mt-4">Tanggal Sewa</label>
        <input type="date" class="form-control" name="tglsewa" id="tglSewa" aria-describedby="tglSewaHelp" placeholder="Tanggal Sewa" >
        <small id="tglSewaHelp" class="form-text text-muted">Masukkan Tanggal Penyewaan.</small>
    </div>
    <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
  <?=form_close();?>

