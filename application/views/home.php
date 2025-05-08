<div class="button-container">
  <?php if ($this->session->userdata('logged_in')): ?>
    <button class="delete-all-btn" onclick="if(confirm('Yakin hapus semua data?')) window.location.href='<?= site_url('controller/deleteAll'); ?>'">Delete All</button>
  <?php endif; ?>
</div>

<div class="job-listing">
  <?php if (empty($home_post)): ?>
    <div style="text-align: center; padding: 40px;">
      <p style="font-size: 20px;">😔 Maaf, saat ini belum ada lowongan pekerjaan</p>
    </div>
  <?php else: ?>
    <?php foreach ($home_post as $post): ?>
      <div class="job-item">

        <div class="job-icon">
          <img src="<?= base_url(!empty($post['filename']) ? 'upload/post/' . $post['filename'] : 'asset/img/noimg.png'); ?>" alt="Logo">
        </div>

        <div class="job-details">
          <h2><?= htmlspecialchars($post['judul']); ?></h2>
          <p><?= htmlspecialchars($post['perusahaan']); ?></p>
          <p><?= htmlspecialchars($post['kota']); ?></p>
          <p><?= htmlspecialchars($post['tanggal_mulai']); ?> - <?= htmlspecialchars($post['tanggal_selesai']); ?></p>
          <p>Gaji: <?= htmlspecialchars($post['gaji']); ?></p>
        </div>

        <div class="job-actions">
          <a href="<?= site_url('controller/index/' . $post['id']); ?>" class="icon-button" title="Lihat Detail">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path fill="currentColor" d="M12 5c-7 0-10 7-10 7s3 7 10 7 10-7 10-7-3-7-10-7zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10z" />
              <circle cx="12" cy="12" r="2.5" fill="currentColor" />
            </svg>
          </a>

          <a href="<?= site_url('controller/delete/' . $post['id']); ?>" class="icon-button" title="Hapus" onclick="return confirm('Yakin hapus data ini?')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
            </svg>
          </a>
        </div>

      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>