<h2>Salam...<?=$nama?> dari <?=$alamat?></h2>
<p>Selamat datang, di CodeIgniter 3 Index Page!</p>
<p>Daftar Pendidikan:</p>
<ul>
    <?php foreach($daftarPendidikan as $sekolah) : ?>
    <li><?=$sekolah?></li>
    <?php endforeach ?>
</ul>
