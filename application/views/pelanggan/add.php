<?=form_open("pelanggan/add");?>
  <fieldset>
    <legend class="h2">Menambah Pelanggan</legend>
    
    <div class="form-group">
        <label for="txtJkodepel" class="form-label mt-4">Kodepel</label>
        <input type="text" class="form-control" name="kodepel" id="txtKodepel" aria-describedby="kodepelHelp" placeholder="Kodepel" >
        <small id="kodepellHelp" class="form-text text-muted">Masukkan Kode Pelanggan</small>
    </div>
    <div class="form-group">
        <label for="txtNama" class="form-label mt-4">Nama</label>
        <input type="text" class="form-control" name="nama" id="txtNama" aria-describedby="namaHelp" placeholder="Nama Pelanggan" >
        <small id="namaHelp" class="form-text text-muted">Masukkan Nama Pelanggan.</small>
    </div>
	<div class="form-group">
        <label for="txtJk" class="form-label mt-4">Jenis Kelamin</label>
		<select class="form-select" id="txtJK" name="jk">
			<option value="L">Laki-Laki</option>
			<option value="P">Perempuan</option>
      	</select>
		<small id="jktHelp" class="form-text text-muted">Pilih Jenis Kelamin Pelanggan.</small>
    </div>
    <div class="form-group">
        <label for="txtAlamat" class="form-label mt-4">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="txtAlamat" aria-describedby="penerbitHelp" placeholder="Alamat" >
        <small id="alamatHelp" class="form-text text-muted">Masukkan Alamat Pelanggan.</small>
    </div>
    <div class="form-group">
        <label for="telepon" class="form-label mt-4">Telepon</label>
        <input type="tel" class="form-control" name="telp" id="telepon" aria-describedby="telepon" placeholder="Telepon" >
        <small id="telepontHelp" class="form-text text-muted">Masukkan Nomor Telepon Pelanggan.</small>
    </div>
	<div class="form-group">
        <label for="txtEmail" class="form-label mt-4">Email</label>
        <input type="email" class="form-control" name="email" id="txtEmail" aria-describedby="emailHelp" placeholder="Email" >
		<small id="emailtHelp" class="form-text text-muted">Masukkan Email Pelanggan.</small>
    </div>
    
	

    <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
  <?=form_close();?>

