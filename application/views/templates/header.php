<html>
    <head>
		<title>CI-Library</title>
        <link rel="stylesheet" href="https://bootswatch.com/5/united/bootstrap.min.css">
	
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?=site_url();?>">CI Library</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor" aria-controls="navbarColor" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>                    

                <div class="collapse navbar-collapse" id="navbarColor">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link" href="<?=site_url();?>">Home</a></li>
						<?php if( $this->session->userdata('username') ) : ?>
							<li class="nav-item"><a class="nav-link" href="<?=site_url();?>Buku">Buku</a></li>
							<li class="nav-item"><a class="nav-link" href="<?=site_url();?>Pelanggan">Pelanggan</a></li>
							<li class="nav-item"><a class="nav-link" href="<?=site_url();?>Sewa">Sewa</a></li>
						<?php endif ?>
						<?php if($this->session->userdata('role')=='admin'): ?>
							<li class="nav-item"><a class="nav-link" href="<?=site_url();?>Users">User</a></li>
						<?php endif ?>
                    </ul>
					<div class="d-flex align-items-center">
						<?php if($this->session->userdata('username')) : ?>
							<div style="margin-right: 10px;" class="text-white"><?=$this->session->userdata('email')?></div>
							<a class="nav-link btn btn-success" style="color: white;" href="<?=site_url();?>Login/logout">Logout</a>
						<?php else : ?>
							<a class="nav-link btn btn-success" style="color: white;" href="<?=site_url();?>login">Login</a>	
						<?php endif ?>		
					</div>
					
                </div>
            </div>
        </nav>
    <!-- Bagian Header -->
    <div class="container" style="padding: 20px;">

	<div id="flash_nessages">
		<?php if($this->session->flashdata('success')) : ?>
		<div class="alert alert-dismissible alert-success">
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		<?=$this->session->flashdata('success') ?>
		</div>
		<?php endif ?>

		<?php if($this->session->flashdata('error')) : ?>
		<div class="alert alert-dismissible alert-danger">
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		<?=$this->session->flashdata('error') ?>
		</div>
		<?php endif ?>

		<?php if($this->session->flashdata('warning')) : ?>
		<div class="alert alert-dismissible alert-warning">
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		<?=$this->session->flashdata('warning') ?>
		</div>
		<?php endif ?>

		<?php if($this->session->flashdata('info')) : ?>
		<div class="alert alert-dismissible alert-info">
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		<?=$this->session->flashdata('info') ?>
		</div>
		<?php endif ?>
	</div>
	<?php if(!empty(validation_errors())) : ?>
		<div class="alert alert-dismissible alert-warning">
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		<?=validation_errors() ?>
		</div>
	<?php endif ?>
