<?=form_open("");?>
  <fieldset>
    <legend class="h2">Login Page</legend>
    
    <div class="form-group">
        <label for="txtEmail" class="form-label mt-4">Email</label>
        <input type="email" class="form-control" name="email" id="txtEmail" aria-describedby="emailHelp" placeholder="Email" >
		<small id="emailtHelp" class="form-text text-muted">Masukkan Email.</small>
    </div>
    <div class="form-group">
        <label for="txtPassword" class="form-label mt-4">Nama</label>
        <input type="text" class="form-control" name="password" id="txtNama" aria-describedby="namaHelp" placeholder="Nama Pelanggan" >
        <small id="namaHelp" class="form-text text-muted">Masukkan Password.</small>
    </div>

    <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
  <?=form_close();?>

