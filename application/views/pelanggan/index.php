	<div class="h2 d-flex justify-content-between"  style="margin-bottom: 10px;"><?= $title; ?>
	<?php if($this->session->userdata('role')=='Admin' || $this->session->userdata('role')=='Write') : ?>
		<a  href="<?=site_url("/pelanggan/add")?>" class="btn btn-success btn-block">Add Pelanggan</a>
	<?php endif ?>
</div>
	<hr>
	
	<?php foreach($pelanggan as $item) : ?>
		<div class="card bg-light mb-3" style="max-width: 30rem;">
			<div class="card-header h4 d-flex justify-content-between">
				<a href="<?=site_url('pelanggan/view/' . $item->id)?>"><?=$item->nama ?></a>
				<small><?=$item->jk ?></small>
			</div>
			<div class="card-body">
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex justify-content-between">
						<em>Kode Pelanggan:</em> <span><?=$item->kodepel ?></span>
					</li>
				</ul>
			</div>
		</div>
	<?php endforeach ?>
