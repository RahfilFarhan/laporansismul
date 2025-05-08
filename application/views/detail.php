<div class="row">
	<div class="col s12">
		<div class="row center">
			<h1><?= htmlspecialchars($post->judul); ?></h1>
		</div>
		<div class="row">
			<?php if ($this->session->userdata('logged_in')): ?>
				<div class="center col s6">
					<a href="<?= site_url('controller/delete/' . $post->id); ?>" class="red-text">Delete</a>
				</div>
				<div class="center col s6">
					<a href="<?= site_url('controller/update/' . $post->id); ?>" class="blue-text">Update</a>
				</div>
			<?php endif; ?>
		</div>
		<div class="row center">
			<img src="<?= !empty($post->filename) ? site_url('upload/post/' . $post->filename) : site_url('asset/img/noimg.png'); ?>" alt="Post's Image" class="circle job-image">
		</div>
		<div class="row detail-text">
			<p style="font-size: 16px; line-height: 1.6; margin-bottom: 10px;"><?= htmlspecialchars($post->deskripsi); ?></p>

			<p style="margin: 4px 0;"><strong>Perusahaan:</strong> <?= htmlspecialchars($post->perusahaan); ?></p>
			<p style="margin: 4px 0;"><strong>Lokasi:</strong> <?= htmlspecialchars($post->kota); ?></p>
			<p style="margin: 4px 0;"><strong>Gaji:</strong> Rp <?= htmlspecialchars($post->gaji); ?></p>
			<p style="margin: 4px 0;"><strong>Tanggal Dibuka:</strong> <?= htmlspecialchars($post->tanggal_mulai); ?></p>
			<p style="margin: 4px 0;"><strong>Tanggal Berakhir:</strong> <?= htmlspecialchars($post->tanggal_selesai); ?></p>
		</div>
	</div>
</div>