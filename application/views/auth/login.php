<div class="login-container">
    <div class="login-card">
        <div class="login-icon">
            <img src="<?= base_url('asset/img/noimg.png'); ?>" alt="User Icon" class="circle job-image">
        </div>
        <h2 style="padding-top: 10px;">LOKER.ID</h2>
        <?php if ($this->session->flashdata('error')): ?>
            <div style="color: red; margin-bottom: 10px;"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <form action="<?= site_url('controller/process_login'); ?>" method="post">
            <input type="text" name="username" placeholder="Username" required style="margin-right: 10px;">
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</div>