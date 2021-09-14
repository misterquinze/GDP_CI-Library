	<div class="h2"  style="margin-bottom: 10px;"><?= $title; ?></div>
	<a style="margin-bottom: 10px;" href="<?=site_url("/buku/add")?>" class="btn btn-success btn-block">Add Buku</a>
		<?php foreach($buku as $item) : ?>
		<div class="card bg-light mb-3" style="max-width: 30rem;">
			<div class="card-header h4 d-flex justify-content-between">
				<a href="<?=site_url('buku/view/' . $item->id)?>"><?=$item->judul ?></a>
				<small><?=$item->pengarang ?></small>
			</div>
			<div class="card-body">
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex justify-content-between">
						<em>ISBN:</em> <span><?=$item->isbn ?></span>
					</li>
				</ul>
			</div>
		</div>
		<?php endforeach ?>
