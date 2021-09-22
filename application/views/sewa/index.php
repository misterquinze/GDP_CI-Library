<div class="h2"  style="margin-bottom: 10px;"><?= $title; ?></div>
	<a style="margin-bottom: 10px;" href="<?=site_url("/sewa/add")?>" class="btn btn-success btn-block">Add Sewa</a>
		<?php foreach($sewa as $item) : ?>
		<div class="card bg-light mb-3" style="max-width: 30rem;">
			<div class="card-header h4 d-flex justify-content-between">
				<a href="<?=site_url('sewa/view/' . $item->id)?>">ID Sewa : <?=$item->id ?></a>
				<!-- <small><?=$item->pelangganid ?></small> -->
			</div>
			<div class="card-body">
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex justify-content-between">
						<em>ISBN:</em> <span><?=$item->isbn ?></span>
						<em>Pelanggan Id:</em> <span><?=$item->pelangganid ?></span>
					</li>
				</ul>
			</div>
		</div>
		<?php endforeach ?>
