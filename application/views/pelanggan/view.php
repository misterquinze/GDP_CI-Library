	<div class="h2" style="margin-bottom: 10px;"><?=$title; ?></div>
        
		<div class="card bg-light mb-3" style="max-width: 30rem;">
			<div class="card-header h3">
				
				<span class="text-center"><?=$pelanggan->nama ?></span>
			</div>
			<div class="card-body">
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex justify-content-between"><em>Kode Pelanggan:</em><span><strong><?=$pelanggan->kodepel ?></strong></span></li>
					<li class="list-group-item d-flex justify-content-between"><em>Alamat:</em><span><?=$pelanggan->alamat ?></span></li>
					<li class="list-group-item d-flex justify-content-between"><em>Telepon:</em><span><?=$pelanggan->telp ?></span></li>
					<li class="list-group-item d-flex justify-content-between"><em>Email:</em><span><?=$pelanggan->email ?></span></li>
					<li class="list-group-item d-flex justify-content-between"><em>Jenis Kelamin:</em><span><?=$pelanggan->jk ?></span></li>
				</ul>
			</div>
			<div class="card-footer d-flex justify-content-between">

				<a href="<?=site_url("/pelanggan/");?>" class="btn btn-dark ">&lt;</a>	
				<a href="<?=site_url("/pelanggan/edit/" . $pelanggan->id);?>" class="btn btn-success btn-block">Edit</a>
				<a href="<?=site_url("/pelanggan/delete/" . $pelanggan->id);?>" class="btn btn-danger btn-block">Delete</a>
			</div>
		</div>
