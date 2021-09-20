<div class="h2" style="margin-bottom: 10px;"><?=$title; ?></div>
	<hr>
		<div class="card bg-light mb-3" style="max-width: 30rem;">
			<div class="card-header h3">
				
				<span class="text-center"><?=$users->nama ?></span>
			</div>
			<div class="card-body">
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex justify-content-between"><em>Kode Pos:</em><span><strong><?=$users->zipcode ?></strong></span></li>
					<li class="list-group-item d-flex justify-content-between"><em>Email:</em><span><?=$users->email ?></span></li>
					<li class="list-group-item d-flex justify-content-between"><em>Username:</em><span><?=$users->username ?></span></li>
					<li class="list-group-item d-flex justify-content-between"><em>Register Date:</em><span><?=$users->register_date ?></span></li>
				</ul>
			</div>
			<!-- <div class="card-footer d-flex justify-content-between">

				<a href="<?=site_url("/users/");?>" class="btn btn-dark ">&lt;</a>	
				<a href="<?=site_url("/users/edit/" . $users->id);?>" class="btn btn-success btn-block">Edit</a>
				<a href="<?=site_url("/users/delete/" . $users->id);?>" class="btn btn-danger btn-block">Delete</a>
			</div> -->
		</div>
