	<div class="h2"  style="margin-bottom: 10px;"><?= $title; ?></div>
	<!-- <a style="margin-bottom: 10px;" href="<?=site_url("/pelanggan/add")?>" class="btn btn-success btn-block">Add Pelanggan</a> -->
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
