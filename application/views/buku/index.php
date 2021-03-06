	<div class="h2 d-flex justify-content-between"  style="margin-bottom: 10px;"><?= $title; ?>
	<?php if($this->session->userdata('role')=='Admin' || $this->session->userdata('role')=='Write') : ?>
	<a href="<?=site_url("/buku/add")?>" class="btn btn-success btn-block">Add Buku</a>
	<?php endif ?>
	</div>
	<hr>
	
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
