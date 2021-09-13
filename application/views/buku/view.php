		<div class="h2" style="margin-bottom: 10px;"><?=$title; ?></div>
        
		<div class="card bg-light mb-3" style="max-width: 30rem;">
			<div class="card-header h3">
				
				<span class="text-center"><?=$buku->judul ?></span>
			</div>
			<div class="card-body">
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex justify-content-between"><em>Pengarang:</em>          <span><strong><?=$buku->pengarang ?></strong></span></li>
					<li class="list-group-item d-flex justify-content-between"><em>Penerbit:</em>           <span><?=$buku->penerbit ?></span></li>
					<li class="list-group-item d-flex justify-content-between"><em>Tanggal Terbit:</em>     <span><?=$buku->tglterbit ?></span></li>
					<li class="list-group-item d-flex justify-content-between"><em>ISBN:</em>               <span><?=$buku->isbn ?></span></li>
				</ul>
			</div>
			<div class="card-footer d-flex justify-content-between">
				<!-- menggunakan form -->
				<!-- <?=form_open(site_url("/buku/delete/$buku->id"), 'style="width:100%" method="delete"'); ?>
					<a href="<?=site_url("/buku/");?>" class="btn btn-dark">&lt;</a>
					<a href="<?=site_url("/buku/edit/" . $buku->id);?>" class="btn btn-success btn-block">Edit</a>
					<input type="submit" value="delete" class="btn btn-danger btn-block">
					<?=form_close();?> -->
					
				<!-- tanpa menggunakan form -->
				<a href="<?=site_url("/buku/");?>" class="btn btn-dark ">&lt;</a>	
				<a href="<?=site_url("/buku/edit/" . $buku->id);?>" class="btn btn-success btn-block">Edit</a>
				<a href="<?=site_url("/buku/delete/" . $buku->id);?>" class="btn btn-danger btn-block">Delete</a>
			</div>
		</div>
