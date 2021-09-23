<div class="h2" style="margin-bottom: 10px;"><?=$title; ?></div>
	<hr>
		<div class="card bg-light mb-3" style="max-width: 30rem;">
			<div class="card-header h3">
				<span class="text-center">ID Sewa : <?=$sewa->id ?></span>
			</div>
			<div class="card-body">
				<ul class="list-group list-group-flush">
                       
					<li class="list-group-item d-flex justify-content-between"><em>ISBN:</em><span><?=$sewa->isbn ?></span></li>
					<li class="list-group-item d-flex justify-content-between"><em>Buku:</em><span><?=$sewa->judul ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Pengarang:</em><span><?=$sewa->pengarang ?></span></li>

                    <li class="list-group-item d-flex justify-content-between"><em>Kode Pelanggan:</em><span><?=$sewa->kodepel ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Nama Pelanggan:</em><span><?=$sewa->nama ?></span></li>
					<li class="list-group-item d-flex justify-content-between"><em>Email Peminjam:</em><span><?=$sewa->email ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Telp Peminjam:</em><span><?=$sewa->telp ?></span></li>

                    <li class="list-group-item d-flex justify-content-between"><em>Lama Sewa:</em><span><?=$sewa->lamasewa ?></span></li>
					<li class="list-group-item d-flex justify-content-between"><em>Tanggal Sewa:</em><span><?=$sewa->tglsewa ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Keterangan:</em><span><?=$sewa->keterangan ?></span></li>
				</ul>
			</div>
			<div class="card-footer d-flex justify-content-between">
				<a href="<?=site_url("/sewa/");?>" class="btn btn-dark ">&lt;</a>
				<?php if($this->session->userdata('role')=='Admin' || $this->session->userdata('role')=='Write') : ?>		
					<a href="<?=site_url("/sewa/edit/" . $sewa->id);?>" class="btn btn-success btn-block">Edit</a>
					<a href="<?=site_url("/sewa/delete/" . $sewa->id);?>" class="btn btn-danger btn-block">Delete</a>
				<?php endif ?>
			</div>
		</div>
