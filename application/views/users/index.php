<div class="h2"  style="margin-bottom: 10px;"><?= $title; ?></div>
	<hr>
		<!-- <a style="margin-bottom: 10px;" href="<?=site_url("/users/add")?>" class="btn btn-success btn-block">Add Pelanggan</a> -->
		<?php foreach($users as $item) : ?>
		<div class="card bg-light mb-3" style="max-width: 30rem;">
			<div class="card-header h4 d-flex justify-content-between">
				<a href="<?=site_url('users/view/' . $item->id)?>"><?=$item->name ?></a>
			</div>
			<div class="card-body">
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex justify-content-between">
						<em>Email  :</em> <span><?=$item->email ?></span>
					</li>
                    <li class="list-group-item d-flex justify-content-between">
						<em>Username:</em> <span><?=$item->username ?></span>
					</li>
				</ul>
			</div>
		</div>
		<?php endforeach ?>