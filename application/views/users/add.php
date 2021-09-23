<?=form_open("users/add");?>
  <fieldset>
    <legend class="h2">Menambah User</legend>
    
    <div class="form-group">
        <label for="txtNama" class="form-label mt-4">Nama</label>
        <input type="text" class="form-control" name="name" id="txtNama" aria-describedby="namaHelp" placeholder="Nama Pelanggan" >
        <small id="namaHelp" class="form-text text-muted">Masukkan Nama User.</small>
    </div>
    <div class="form-group">
        <label for="txtEmail" class="form-label mt-4">Email</label>
        <input type="email" class="form-control" name="email" id="txtEmail" aria-describedby="emailHelp" placeholder="Email" >
		<small id="emailtHelp" class="form-text text-muted">Masukkan Email User.</small>
    </div>
    
    <div class="form-group">
        <label for="txtUsername" class="form-label mt-4">Username</label>
        <input type="text" class="form-control" name="username" id="txtUsername" aria-describedby="usernamelHelp" placeholder="Username" >
        <small id="usernameHelp" class="form-text text-muted">Masukkan Username User</small>
    </div>
	<div class="form-group">
        <label for="txtZipcode" class="form-label mt-4">Zipcode</label>
        <input type="text" class="form-control" name="zipcode" id="txtZipcode" aria-describedby="zipcodeHelp" placeholder="Zipcode" >
        <small id="zipcodeHelp" class="form-text text-muted">Masukkan Zipcode User</small>
    </div>
    <div class="form-group">
        <label for="txtPassword" class="form-label mt-4">Password</label>
        <input type="text" class="form-control" name="password" id="txtPassword" aria-describedby="penerbitHelp" placeholder="Alamat" >
        <small id="passwordHelp" class="form-text text-muted">Masukkan Password Untuk User.</small>
    </div>
    <div class="form-group">
        <label for="txtAktif" class="form-label mt-4">Status Akun</label>
        <select class="form-select" name="aktif" id="txtAktif">
            <?php foreach($users as $item) : ?>
                <option value="<?=$item->aktif?>">
                    <?=$item->aktif?>
                </option>
            <?php endforeach ?>
        </select>
        <small id="pelangganidHelp" class="form-text text-muted">Pilih Status.</small>
    </div>
    <div class="form-group">
        <label for="txtRole" class="form-label mt-4">Role Akun</label>
        <select class="form-select" name="role" id="txtRole">
            <?php foreach($role as $item) : ?>
                <option value="<?=$item->id?>">
                    <?=$item->role?> -  <?=$item->keterangan?>
                </option>
            <?php endforeach ?>
        </select>
        <small id="roleHelp" class="form-text text-muted">Pilih Role Akun.</small>
    </div>
	
	

    <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
  <?=form_close();?>

